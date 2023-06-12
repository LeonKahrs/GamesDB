<?php
$title="Spiele";//Seitenüberschrift wird definiert
include ("./templates/header.php");//header wird eingebunden
include("./templates/database-connect.php");//verbindung zur Datenbank wird aufgebaut


$query = '
        SELECT * FROM spiele s 
        inner join entwickler e 
        on s.Entwickler_ID = e.Entwickler_ID 
        WHERE Spiele_ID='.$_GET['id'];
$results = $dbh->query($query);

foreach ($results as $product){
    $genreQuery = '
        SELECT Name FROM genre g
        INNER JOIN genre_spiele gs
        on g.Genre_ID = gs.Genre_ID
        WHERE gs.Spiele_ID = '.$_GET['id'];

    $genres = $dbh->query($genreQuery);
    $genresStr ="";
    foreach ($genres as $genre){
        $genresStr = $genresStr.$genre['Name'].',';
    }
    $plattformQuery = '
        SELECT Name FROM plattform p
        INNER JOIN spiele_plattform sp
        on p.Plattform_ID = sp.Plattform_ID
        WHERE sp.Spiele_ID = '.$_GET['id'];

    $plattforms = $dbh->query($plattformQuery);
    $plattformsStr ="";
    foreach ($plattforms as $plattform){
        $plattformsStr = $plattformsStr.$plattform['Name'].',';
    }
?>

<div class="detail-page-container">
    <div class="detail-picture-container">
        <img class="detail-picture" src="./assets/img/screenshot/<?= $product['Screenshot'] ?>">
    </div>
    <div class="detail-info-container">
        <h1><?= $product['Titel']?></h1>
        <p><?= $product['Beschreibung']?></p>
        <p><a href="<?= $product['Trailer']?>">Zum Trailer</a></p>
        <p><?= $product['Systemanforderungen']?></p>
        <p><strong>Entwickler: </strong><?= $product['Name']?></p>
        <p><strong>Plattform: </strong><?= $plattformsStr?></p>
        <p><strong>Genre: </strong><?= $genresStr?></p>


    </div>
</div>



<?php } ?>


<?php include("./templates/footer.php"); //footer wird eingebunden ?>
<script type="text/javascript" src="./assets/js/select-dropdown.js"></script>