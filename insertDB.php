<?php
$title="InputDB"; //Seitenüberschrift wird definiert
include ("./templates/header.php");//header wird eingebunden
include("./templates/database-connect.php");//verbindung zur Datenbank wird aufgebaut
?>
<?php
//überprüfen, ob die POST variable gesetzt wurde
if(isset($_POST['submit-spiele'])){

   $query = '
        INSERT INTO spiele (
            Titel, 
            Beschreibung, 
            Trailer, 
            Screenshot, 
            Systemanforderungen, 
            Entwickler_ID)
        VALUES (
            "'.$_POST['titel'].'",
            "'.$_POST['beschreibung'].'",
            "'.$_POST['trailer'].'",
            "'.$_POST['screenshot'].'",
            "'.$_POST['systemanforderung'].'",
            "'.$_POST['entwickler'].'"
        )
    ';
    $dbh->exec($query);

    $last_id = $dbh->lastInsertId();
    foreach ($_POST['genres'] as $genre){
        $query = 'INSERT INTO genre_spiele (Genre_ID, Spiele_ID)
  VALUES ("'.$genre.'","'.$last_id.'")';
        $dbh->exec($query);
    }
    foreach ($_POST['plattforms'] as $plattform){
        $query = 'INSERT INTO spiele_plattform (Spiele_ID, Plattform_ID)
  VALUES ("'.$last_id.'","'.$plattform.'")';
        $dbh->exec($query);
    }
}

if(isset($_POST['submit-entwickler'])) {

    $query = '
            INSERT INTO kontaktdaten (
                Straße, 
                PLZ, 
                Ort, 
                Land, 
                `E-Mail`, 
                Telefonnummer)
            VALUES (
                "' . $_POST['straße'] . '",
                "' . $_POST['plz'] . '",
                "' . $_POST['ort'] . '",
                "' . $_POST['land'] . '",
                "' . $_POST['E-Mail'] . '",
                "' . $_POST['telefonnummer'] . '"
            )
        ';
    $dbh->exec($query);
    $kontaktdaten_id = $dbh->lastInsertId();

    $query = '
        INSERT INTO entwickler (
            Name, 
            Gründungsjahr, 
            Geschichte, 
            Kontaktdaten_ID
        )
        VALUES (
            "' . $_POST['name'] . '",
            "' . $_POST['gründungsjahr'] . '",
            "' . $_POST['geschichte'] . '",
            "' . $kontaktdaten_id . '"
        )
    ';
    $dbh->exec($query);
}
if(isset($_POST['submit-genre'])) {

    $query = '
            INSERT INTO genre (
                Name, 
                Beschreibung
            )
            VALUES (
                "' . $_POST['name'] . '",
                "' . $_POST['beschreibung'] . '"
            )
        ';
    $dbh->exec($query);
}
if(isset($_POST['submit-plattform'])) {

    $query = '
            INSERT INTO plattform (
                Name, 
                Hersteller,
                Veröffentlichungsdatum
            )
            VALUES (
                "' . $_POST['name'] . '",
                "' . $_POST['hersteller'] . '",
                "' . $_POST['veröffentlichungsdatum'] . '"
            )
        ';
    $dbh->exec($query);
}


?>
<?php include("./templates/footer.php"); //footer wird eingebunden?>
