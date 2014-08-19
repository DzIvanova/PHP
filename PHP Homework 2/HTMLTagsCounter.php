<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>HTML Tags Counter</title>
    <style>
        p{
            font-size: 23px;
            font-weight: bold;
            margin: 0;
        }
    </style>
</head>
<body>
<form action="" method="POST">
    <label>Enter HTML tag:</label><br>
    <input type="text" name="tags" id="tags" /><br>
    <input type="submit" name="submit" value="Submit"/>

</form>

<?php
$htmlTags = array("!doctype", "a", "abbr", "address", "area", "article", "aside", "audio", "b", "base", "bdi", "bdo", "big",
    "blockquote", "body", "br", "button", "canvas", "caption", "center", "cite", "code", "col", "colgroup", "command",
    "datalist", "dd", "del", "details", "dfn", "dir", "div", "dl", "dt", "em", "embed", "fieldset", "figcaption",
    "figure", "font", "footer", "form", "frame", "frameset", "h1", "h2", "h3", "h4", "h5", "h6", "head", "header",
    "hgroup", "hr", "html", "i", "iframe", "img", "input", "ins", "kbd", "keygen", "label", "legend", "li", "link",
    "map", "mark", "menu", "meta", "meter", "nav", "noframes", "noscript", "object", "ol", "optgroup", "option", "p",
    "param", "pre", "progress", "q", "rp", "rt", "ruby", "s", "samp", "script", "section", "select", "small", "source",
    "span", "strike", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td", "textarea", "tfoot", "th",
    "time", "title", "tr", "track", "tt", "u", "ul", "var", "video", "wbr");

if(isset($_POST['tags'])){
    $tags = strtolower(htmlentities($_POST['tags']));
    if(!isset($_SESSION['count'])){
        $_SESSION = 0;
    }
    if(in_array($tags, $htmlTags)){
        echo "<p>Valid HTML Tag!</p>";
            $_SESSION['count']++;
        }
    else {
        echo "<p>Invalid HTML Tag!</p>";
    }
echo "<p>Score: " . $_SESSION['count'] . "</p>";
}
?>
</body>
</html>