@props(['content' => ''])

{!! \App\Support\HtmlSanitizer::clean($content) !!}
