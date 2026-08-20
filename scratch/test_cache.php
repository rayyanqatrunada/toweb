<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$res = \Illuminate\Support\Facades\Cache::remember('homepage:agendas_test2', now()->addMinutes(15), fn() => \App\Models\Announcement::active()->latest()->take(3)->get());

echo "TYPE: " . get_class($res) . "\n";
