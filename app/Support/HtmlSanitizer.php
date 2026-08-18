<?php

namespace App\Support;

use DOMDocument;
use DOMXPath;

class HtmlSanitizer
{
    /**
     * Allowed HTML tags.
     */
    protected static array $allowedTags = [
        'p', 'br', 'strong', 'b', 'em', 'i', 'u', 'strike', 's',
        'ul', 'ol', 'li', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
        'blockquote', 'a', 'span', 'div', 'img', 'table', 'thead',
        'tbody', 'tr', 'td', 'th', 'hr', 'code', 'pre'
    ];

    /**
     * Allowed attributes globally.
     */
    protected static array $allowedAttributes = [
        'href', 'src', 'alt', 'title', 'class', 'style', 'target', 'rel'
    ];

    public static function clean(?string $html): string
    {
        if (empty($html)) {
            return '';
        }

        // Remove script and style contents before strip_tags
        $html = preg_replace('@<(script|style|iframe|object|embed|applet)[^>]*?>.*?</\1>@si', '', $html);

        // Basic strip_tags to remove entirely forbidden tags
        $allowedTagsString = '<' . implode('><', self::$allowedTags) . '>';
        $html = strip_tags($html, $allowedTagsString);

        if (empty(trim($html))) {
            return $html;
        }

        // Use DOMDocument to safely clean attributes and javascript protocols
        $dom = new DOMDocument();
        
        // Suppress warnings due to malformed HTML
        libxml_use_internal_errors(true);
        
        // Load HTML with proper encoding wrapper
        $dom->loadHTML('<?xml encoding="UTF-8"><div>' . $html . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        
        libxml_clear_errors();

        $xpath = new DOMXPath($dom);

        // Remove any script or iframe that somehow bypassed strip_tags
        $nodesToRemove = $xpath->query('//script | //iframe | //object | //embed | //form | //style | //applet');
        foreach ($nodesToRemove as $node) {
            $node->parentNode->removeChild($node);
        }

        // Clean attributes
        $nodes = $xpath->query('//*[@*]');
        foreach ($nodes as $node) {
            // Traverse attributes backwards to safely remove them
            for ($i = $node->attributes->length - 1; $i >= 0; $i--) {
                $attr = $node->attributes->item($i);
                $attrName = strtolower($attr->nodeName);
                $attrValue = strtolower($attr->nodeValue);

                // 1. Remove event handlers (onclick, onerror, etc.)
                if (str_starts_with($attrName, 'on')) {
                    $node->removeAttribute($attr->nodeName);
                    continue;
                }

                // 2. Remove non-allowed attributes
                if (!in_array($attrName, self::$allowedAttributes)) {
                    $node->removeAttribute($attr->nodeName);
                    continue;
                }

                // 3. Remove javascript: pseudo-protocols in href or src
                if (in_array($attrName, ['href', 'src'])) {
                    // Check for javascript: or vbscript: or data:text/html
                    $cleanValue = preg_replace('/[\s\x00-\x1F\x7F]+/', '', $attrValue);
                    if (str_starts_with($cleanValue, 'javascript:') || str_starts_with($cleanValue, 'vbscript:') || str_starts_with($cleanValue, 'data:text/html')) {
                        $node->removeAttribute($attr->nodeName);
                    }
                }
            }
        }

        // Extract the inner HTML of the wrapper <div>
        $result = '';
        $wrapper = $dom->documentElement; // This is the <div> we added
        foreach ($wrapper->childNodes as $child) {
            $result .= $dom->saveHTML($child);
        }

        return $result;
    }
}
