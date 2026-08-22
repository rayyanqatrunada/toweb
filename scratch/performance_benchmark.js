const puppeteer = require('puppeteer');
const fs = require('fs');

const routes = [
    '/',
    '/tentang',
    '/akademik/program',
    '/akademik/guru',
    '/akademik/fasilitas',
    '/berita',
    '/prestasi',
    '/mitra-industri',
    '/alumni',
    '/galeri',
    '/pkl',
    '/lowongan',
    '/unduhan'
];

const baseUrl = 'http://127.0.0.1:8000';

async function runBenchmark() {
    console.log("Starting Browser Benchmark...");
    const browser = await puppeteer.launch({ headless: 'new', executablePath: 'C:/Program Files/Google/Chrome/Application/chrome.exe' });
    const results = [];

    for (const route of routes) {
        console.log(`Benchmarking: ${route}`);
        const page = await browser.newPage();
        
        let requests = 0;
        let transferSize = 0;

        page.on('response', async (response) => {
            requests++;
            try {
                const buffer = await response.buffer();
                transferSize += buffer.length;
            } catch (e) {
                // Ignore failed buffers
            }
        });

        // Set up PerformanceObserver inside the page context for Web Vitals
        await page.evaluateOnNewDocument(() => {
            window.perfData = { fcp: 0, lcp: 0, ttfb: 0, domReady: 0, load: 0 };
            
            new PerformanceObserver((entryList) => {
                for (const entry of entryList.getEntries()) {
                    if (entry.name === 'first-contentful-paint') {
                        window.perfData.fcp = entry.startTime;
                    }
                }
            }).observe({ type: 'paint', buffered: true });

            new PerformanceObserver((entryList) => {
                const entries = entryList.getEntries();
                if (entries.length > 0) {
                    window.perfData.lcp = entries[entries.length - 1].startTime;
                }
            }).observe({ type: 'largest-contentful-paint', buffered: true });
        });

        try {
            await page.goto(`${baseUrl}${route}`, { waitUntil: 'load', timeout: 60000 });
            
            const metrics = await page.evaluate(() => {
                const navEntry = performance.getEntriesByType('navigation')[0];
                if (navEntry) {
                    window.perfData.ttfb = navEntry.responseStart;
                    window.perfData.domReady = navEntry.domContentLoadedEventEnd;
                    window.perfData.load = navEntry.loadEventEnd;
                }
                return window.perfData;
            });

            results.push({
                route: route,
                ttfb: Math.round(metrics.ttfb),
                fcp: Math.round(metrics.fcp),
                lcp: Math.round(metrics.lcp),
                domReady: Math.round(metrics.domReady),
                load: Math.round(metrics.load),
                requests: requests,
                transferKB: Math.round(transferSize / 1024)
            });

        } catch (e) {
            console.error(`Failed to benchmark ${route}: ${e.message}`);
        }
        await page.close();
    }

    await browser.close();

    fs.writeFileSync('performance-browser-baseline.json', JSON.stringify(results, null, 2));
    console.log("Benchmark complete. Data saved to performance-browser-baseline.json");
    
    // Generate Markdown
    let md = '| Route | TTFB ms | FCP ms | LCP ms | DOM Ready ms | Load ms | Requests | Transfer KB |\n';
    md += '|---|---:|---:|---:|---:|---:|---:|---:|\n';
    for (const r of results) {
        md += `| ${r.route} | ${r.ttfb} | ${r.fcp} | ${r.lcp} | ${r.domReady} | ${r.load} | ${r.requests} | ${r.transferKB} |\n`;
    }
    fs.writeFileSync('performance-browser-baseline.md', md);
}

runBenchmark();
