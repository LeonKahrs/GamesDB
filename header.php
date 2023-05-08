<?php
function active($current_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);
  if($current_page == $url){
      echo 'active'; //class name in css
  }
}
?>
<header>
    <h1>GamesDB</h1>
    <p>Erfahre alles über videospiele</p>
    <nav>
        <ul>
            <li><a class="<?php active('index.php');?>" href="./index.php">Home</a></li>
            <li><a class="<?php active('auslesen.php');?>" href="./auslesen.php">Datenbank</a></li>
            <li><a  href="#contact">Contact</a></li>
            <li style="float:right"><a href="#about">About</a></li>
        </ul>
    </nav>
</header>