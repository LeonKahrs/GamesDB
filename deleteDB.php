<?php
$title="InputDB"; //Seitenüberschrift wird definiert
include ("./templates/header.php");//header wird eingebunden
include("./templates/database-connect.php");//verbindung zur Datenbank wird aufgebaut
?>
<?php
//überprüfen, ob die POST variable gesetzt wurde
if(isset($_POST['delete-spiele'])){
    $spiele = implode(",", $_POST['spiele']);
    $query = '
    DELETE FROM genre_spiele
    WHERE Spiele_ID IN('.$spiele.');
    ';
    $dbh->exec($query);

    $query = '
    DELETE FROM spiele_plattform
    WHERE Spiele_ID IN('.$spiele.');
    ';
    $dbh->exec($query);

    $query = '
    DELETE FROM spiele
    WHERE Spiele_ID IN('.$spiele.');
    ';
    $dbh->exec($query);

}

if(isset($_POST['delete-entwickler'])) {
    $entwicklers="";
    $notDeletable="";
    foreach ($_POST['entwicklers'] as $entwickler){
        $query = '
        SELECT COUNT(Spiele_ID) AS summe
        FROM spiele
        WHERE Entwickler_ID = '.$entwickler;
        $isAvailable = $dbh->query($query);
        foreach ($isAvailable as $ava){
            $sum = $ava['summe'];
        }
        if(!$sum){
            if($entwicklers==""){
                $entwicklers=$entwickler;
            }else{
                $entwicklers=$entwicklers.','.$entwickler;
            }

        }else{
            if($notDeletable == ""){
                $notDeletable = $entwickler;
            }else{
                $notDeletable = $notDeletable.', '.$entwickler;
            }
        }
    }
    if($notDeletable != ""){
        echo "Die Entwickler mit den IDs: ".$notDeletable." konnten nicht gelöscht werden, weil sie noch einem Spiel zugeordnet sind.";
    }
    if($entwicklers!=""){
        $query = '
    DELETE FROM entwickler
    WHERE Entwickler_ID IN('.$entwicklers.');
    ';
        $dbh->exec($query);
    }


}
if(isset($_POST['delete-genre'])) {
    $genres = implode(",", $_POST['genres']);
    $query = '
    DELETE FROM genre_spiele
    WHERE Genre_ID IN('.$genres.');
    ';
    $dbh->exec($query);

    $query = '
    DELETE FROM genre
    WHERE Genre_ID IN('.$genres.');
    ';
    $dbh->exec($query);

}
if(isset($_POST['delete-plattform'])) {
    $plattforms = implode(",", $_POST['plattforms']);
    $query = '
    DELETE FROM spiele_plattform
    WHERE Plattform_ID IN('.$plattforms.');
    ';
    $dbh->exec($query);

    $query = '
    DELETE FROM plattform
    WHERE Plattform_ID IN('.$plattforms.');
    ';
    $dbh->exec($query);
}


?>
<?php include("./templates/footer.php"); //footer wird eingebunden?>
