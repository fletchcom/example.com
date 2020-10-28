<?php
require './../core/bootstrap.php';
include './../core/db_connect.php';

$content=null;
$stmt = $pdo->query("SELECT * FROM posts");

while ($row = $stmt->fetch())
{

    $content .= "<div><a href=\"view.php?slug={$row['slug']}\">{$row['title']}"."</a></div>";
}

$content .= "<br><br><a href=\"add.php\">New Post</a>";

checkSession();

include './../core/layout.php';


