<?php

namespace Database\Seeders\Support;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SeedAssetGenerator
{
    /**
     * Generate an image using PHP GD and save it to the public storage disk.
     *
     * @param string $text
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string $bgColor (Hex color)
     * @param string $textColor (Hex color)
     * @return string
     */
    public static function generateImage(
        string $text,
        string $path = 'placeholders',
        int $width = 800,
        int $height = 600,
        string $bgColor = '#cbd5e1',
        string $textColor = '#334155'
    ): string {
        $filename = $path . '/' . Str::slug($text) . '-' . $width . 'x' . $height . '.jpg';

        if (Storage::disk('public')->exists($filename)) {
            return $filename;
        }

        if (!extension_loaded('gd')) {
            // Fallback if GD is not available, just create a dummy file
            Storage::disk('public')->put($filename, 'dummy content');
            return $filename;
        }

        $image = imagecreatetruecolor($width, $height);

        // Parse colors
        list($bgR, $bgG, $bgB) = sscanf($bgColor, "#%02x%02x%02x");
        list($textR, $textG, $textB) = sscanf($textColor, "#%02x%02x%02x");

        $bg = imagecolorallocate($image, $bgR, $bgG, $bgB);
        $fg = imagecolorallocate($image, $textR, $textG, $textB);

        imagefill($image, 0, 0, $bg);

        // Basic font logic
        $font = 5; // Built-in GD font (largest)
        $fontWidth = imagefontwidth($font);
        $fontHeight = imagefontheight($font);

        $textWidth = $fontWidth * strlen($text);
        $x = intval(($width - $textWidth) / 2);
        $y = intval(($height - $fontHeight) / 2);

        imagestring($image, $font, $x, $y, $text, $fg);

        // Save image to output buffer
        ob_start();
        imagejpeg($image, null, 75);
        $imageData = ob_get_clean();
        imagedestroy($image);

        // Store via Laravel Storage
        Storage::disk('public')->put($filename, $imageData);

        return $filename;
    }

    /**
     * Generate a dummy PDF file and save it to the public storage disk.
     *
     * @param string $name
     * @param string $path
     * @return string
     */
    public static function generatePdf(string $name, string $path = 'downloads'): string
    {
        $filename = $path . '/' . Str::slug($name) . '.pdf';

        if (Storage::disk('public')->exists($filename)) {
            return $filename;
        }

        // Minimal valid PDF structure
        $pdfContent = "%PDF-1.4\n" .
                      "1 0 obj\n<< /Type /Catalog /Pages 2 0 R >>\nendobj\n" .
                      "2 0 obj\n<< /Type /Pages /Kids [3 0 R] /Count 1 >>\nendobj\n" .
                      "3 0 obj\n<< /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] /Resources << /Font << /F1 4 0 R >> >> /Contents 5 0 R >>\nendobj\n" .
                      "4 0 obj\n<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>\nendobj\n" .
                      "5 0 obj\n<< /Length 44 >>\nstream\n" .
                      "BT\n/F1 24 Tf\n100 700 Td\n(Placeholder PDF Document: $name) Tj\nET\n" .
                      "endstream\nendobj\n" .
                      "xref\n0 6\n0000000000 65535 f \n0000000009 00000 n \n0000000058 00000 n \n0000000115 00000 n \n0000000218 00000 n \n0000000306 00000 n \n" .
                      "trailer\n<< /Size 6 /Root 1 0 R >>\nstartxref\n399\n%%EOF";

        Storage::disk('public')->put($filename, $pdfContent);

        return $filename;
    }
}
