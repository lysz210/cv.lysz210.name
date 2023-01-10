<?php
function toBase64($path) {
    $content = file_get_contents($path);
    return base64_encode($content);
}
