<?php
$content = file_get_contents("storage/framework/views/97bc5f93d459a41aa57d4e87f97c24fc.php");
$tokens = token_get_all($content);
$stack = [];
foreach ($tokens as $token) {
    if (is_array($token)) {
        if ($token[0] === T_IF) {
            // Check if it's if(): or if() {
        }
    }
}
// Actually, it's easier to check Blade directives in the original file!
