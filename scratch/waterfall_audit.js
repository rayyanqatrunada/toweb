const puppeteer = require('puppeteer');
const fs = require('fs');

async function auditWaterfall() {
    console.log("Starting Waterfall Audit...");
    const browser = await puppeteer.launch({ headless: 'new', executablePath: 'C:/Program Files/Google/Chrome/Application/chrome.exe' });
    const page = await browser.newPage();
    
    // Enable request interception to monitor details
    await page.setRequestInterception(true);

    const requests = [];

    page.on('request', (req) => {
        requests.push({
            url: req.url(),
            resourceType: req.resourceType(),
            startTime: Date.now()
        });
        req.continue();
    });

    page.on('response', (res) => {
        const reqData = requests.find(r => r.url === res.url() && !r.endTime);
        if (reqData) {
            reqData.endTime = Date.now();
            reqData.duration = reqData.endTime - reqData.startTime;
            reqData.status = res.status();
        }
    });

    console.log("Navigating to homepage...");
    await page.goto('http://127.0.0.1:8000/alumni', { waitUntil: 'load', timeout: 60000 });
    
    fs.writeFileSync('waterfall_audit.json', JSON.stringify(requests, null, 2));
    
    let analysis = "# Network Waterfall Analysis (/)\n\n";
    analysis += "| URL | Type | Status | Duration (ms) |\n";
    analysis += "|---|---|---|---|\n";
    
    for (const r of requests) {
        if (r.duration !== undefined) {
             // simplify URL to path if it's localhost
             let displayUrl = r.url;
             if (displayUrl.startsWith('http://127.0.0.1:8000')) {
                 displayUrl = displayUrl.replace('http://127.0.0.1:8000', '');
             }
             if (displayUrl.length > 50) {
                 displayUrl = displayUrl.substring(0, 47) + '...';
             }
             analysis += `| ${displayUrl} | ${r.resourceType} | ${r.status} | ${r.duration} |\n`;
        }
    }
    
    fs.writeFileSync('waterfall_audit.md', analysis);
    console.log("Waterfall audit complete.");
    await browser.close();
}

auditWaterfall();
