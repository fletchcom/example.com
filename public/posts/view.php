<?php
include '../core/db_connect.php';

$slug = "'{$_GET['slug']}'";

$content=null;
$stmt = $pdo->query("SELECT * FROM posts WHERE slug={$slug}");

while ($row = $stmt->fetch())
{

    $content .= "<a href=\"view.php?slug={$row['slug']}\">{$row['title']}</a>";
}

echo $content;