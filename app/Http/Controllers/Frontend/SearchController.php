<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Search\GlobalSearchService;

class SearchController extends Controller
{
    public function __construct(
        protected GlobalSearchService $searchService
    ) {}

    public function index(Request $request)
    {
        $q = trim($request->input('q'));
        if (strlen($q) > 100) {
            $q = substr($q, 0, 100);
        }

        $results = $this->searchService->search($q);
        
        $totalResults = collect($results)->sum(fn($group) => count($group));

        return view('frontend.search', compact('q', 'results', 'totalResults'));
    }
}
