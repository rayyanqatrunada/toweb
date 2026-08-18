<?php

namespace Tests\Unit\Support;

use PHPUnit\Framework\TestCase;
use App\Support\HtmlSanitizer;

class HtmlSanitizerTest extends TestCase
{
    public function test_it_allows_safe_tags()
    {
        $html = '<p>Hello <strong>World</strong></p><ul><li>Item</li></ul><a href="https://example.com">Link</a>';
        $cleaned = HtmlSanitizer::clean($html);
        
        $this->assertEquals($html, $cleaned);
    }

    public function test_it_removes_script_tags()
    {
        $html = '<p>Safe</p><script>alert("xss")</script>';
        $cleaned = HtmlSanitizer::clean($html);
        
        $this->assertEquals('<p>Safe</p>', $cleaned);
    }

    public function test_it_removes_event_handlers()
    {
        $html = '<a href="#" onclick="alert(1)">Click</a><img src="x" onerror="alert(1)">';
        $cleaned = HtmlSanitizer::clean($html);
        
        $this->assertEquals('<a href="#">Click</a><img src="x">', $cleaned);
    }

    public function test_it_removes_javascript_pseudo_protocol()
    {
        $html = '<a href="javascript:alert(1)">Click</a><a href=" javascript: alert(1)">Click2</a>';
        $cleaned = HtmlSanitizer::clean($html);
        
        $this->assertEquals('<a>Click</a><a>Click2</a>', $cleaned);
    }

    public function test_it_removes_iframes_and_objects()
    {
        $html = '<div><iframe src="http://evil.com"></iframe><object data="evil.swf"></object></div>';
        $cleaned = HtmlSanitizer::clean($html);
        
        $this->assertEquals('<div></div>', $cleaned);
    }

    public function test_it_allows_safe_attributes()
    {
        $html = '<a href="https://test.com" target="_blank" class="link" style="color:red" rel="noopener">Link</a>';
        $cleaned = HtmlSanitizer::clean($html);
        
        $this->assertEquals($html, $cleaned);
    }

    public function test_it_preserves_formatting()
    {
        $html = '<h2>Title</h2><p>Text</p><br><hr>';
        $cleaned = HtmlSanitizer::clean($html);
        
        $this->assertEquals($html, $cleaned);
    }
}
