<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <link rel="stylesheet" href="../assets/css/default.css">
    <link rel="stylesheet" href="../assets/css/select-dropdown.css">
    <link rel="stylesheet" href="../assets/css/checklist-dropdown.css">

    <title><?php echo $title; ?></title>
</head>
<?php
//Funktion, um Feld in nav-Leiste auf active zu setzen
function active($current_page)
{
    $url_array = explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($current_page == $url) {
        echo 'active'; //class name in css
    }
}

?>
<body>
    <header>
        <h1>GamesDB</h1>
        <p>Erfahre alles über videospiele</p>
        <nav>
            <ul>
                <li><a class="<?php active(''); ?>" href="./">Home</a></li>
                <li><a class="<?php active('games-list.php'); ?>" href="./games-list.php">Spiele</a></li>
                <li><a class="<?php active('dev-list.php'); ?>" href="./dev-list.php">Entwickler</a></li>
                <li><a class="<?php active('admin.php'); ?>" href="./admin.php">Admin</a></li>
                <li style="float:right"><a class="<?php active('impressum.php'); ?>" href="./impressum.php">Impressum</a></li>
            </ul>
        </nav>
    </header>
    <div class="main-content">
