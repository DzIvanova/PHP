<?php
$text = $_GET['text'];
$blackList = $_GET['blacklist'];
$blacklistItems = preg_split('/[*\s+]/', $blackList,-1, PREG_SPLIT_NO_EMPTY);

$emailPattern = '/\b[A-Za-z0-9\_\+\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-\.]+\b/';
$newText = preg_replace_callback($emailPattern, 'getReplacements', $text);

echo "<p>$newText</p>";

function getreplacements($match){
        $email = $match[0];
        if(shouldBlacklist($email)){
            return str_repeat("*",strlen($email));
        }
        else {
            return "<a href=\"mailto:$email\">$email</a>";
        }
    return "*";
}

function shouldBlacklist($email) {
    global $blacklistItems;
    foreach ($blacklistItems as $blacklistItem) {
        if(startsWith($blacklistItem, ".")) {
           if(endsWith($email, $blacklistItem)){
                return true;
           }
        }
        else {
            if($email === $blacklistItem){
                return true;
            }
        }
    }
    return false;
}

function startsWith($location, $target) {
    return $target === "" || strpos($location, $target) === 0;
}

function endsWith($location, $target) {
    return $target === "" || substr($location, -strlen($target)) === $target;
}