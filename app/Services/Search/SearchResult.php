<?php

namespace App\Services\Search;

class SearchResult
{
    public function __construct(
        public string $title,
        public string $url,
        public ?string $excerpt = null,
        public ?string $date = null
    ) {}
}
