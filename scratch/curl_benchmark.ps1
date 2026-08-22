$routes = @(
    "/",
    "/tentang",
    "/akademik/program",
    "/akademik/guru",
    "/akademik/fasilitas",
    "/berita",
    "/prestasi",
    "/mitra-industri",
    "/alumni",
    "/galeri",
    "/pkl",
    "/lowongan",
    "/unduhan"
)

$results = @()
$baseUrl = "http://127.0.0.1:8000"

# Clear Cache
php artisan cache:clear | Out-Null
php artisan view:clear | Out-Null

foreach ($route in $routes) {
    $url = "$baseUrl$route"
    
    # COLD RUN
    $coldStart = Get-Date
    try {
        $response = Invoke-WebRequest -Uri $url -UseBasicParsing
        $status = $response.StatusCode
    } catch {
        $status = $_.Exception.Response.StatusCode.value__
    }
    $coldEnd = Get-Date
    $coldTime = [math]::Round(($coldEnd - $coldStart).TotalMilliseconds, 2)
    
    # WARM RUN
    $warmStart = Get-Date
    try {
        $response = Invoke-WebRequest -Uri $url -UseBasicParsing
        $status = $response.StatusCode
    } catch {
        $status = $_.Exception.Response.StatusCode.value__
    }
    $warmEnd = Get-Date
    $warmTime = [math]::Round(($warmEnd - $warmStart).TotalMilliseconds, 2)
    
    $results += [PSCustomObject]@{
        Route = $route
        Cold_ms = $coldTime
        Warm_ms = $warmTime
        Status = $status
    }
}

$results | ConvertTo-Json | Out-File -FilePath "docs/p1-before-performance.json" -Encoding utf8

$md = "# P1 BEFORE PERFORMANCE`n`n"
$md += "| Route | Cold ms | Warm ms | Status |`n"
$md += "|---|---:|---:|---:|`n"

foreach ($res in $results) {
    $md += "| $($res.Route) | $($res.Cold_ms) | $($res.Warm_ms) | $($res.Status) |`n"
}

$md | Out-File -FilePath "docs/p1-before-performance.md" -Encoding utf8

Write-Host "Benchmark completed."
