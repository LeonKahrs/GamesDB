<?php
$title="Spiele";//Seitenüberschrift wird definiert
include ("./templates/header.php");//header wird eingebunden
include("./templates/database-connect.php");//verbindung zur Datenbank wird aufgebaut

//Spaltenüberschriften, die Angezeigt werden soll
$rowsHeading = [
    'Spiele_ID',
    'Titel',
    'Beschreibung',
    'Plattform',
    'Genre',
    'Trailer',
    'Screenshot',
    'Entwickler'
];
//Spalten, nach denen Gefiltert werden darf
//[table,row,label]
$rowsFilterable = [
    ['s','Spiele_ID','Spiele_ID'],
    ['s','Titel','Titel'],
    ['e','Name','Entwickler']
];
?>

<?php include("./templates/sort-form.php"); //Sortierformular wird eingebunden?>
<table class="table-list">
    <thead>
    <tr>
        <?php
        //TabellenSpalten Überschriften werden generiert
        foreach ($rowsHeading as $name) {
            echo '<th>', htmlspecialchars($name), '</th>';
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    //SQL String wird erstellt und ausgeführt
    $query = '
        SELECT * FROM spiele s 
        inner join entwickler e 
        on s.Entwickler_ID = e.Entwickler_ID 
        WHERE Titel LIKE "%'.$searchStr.'%"'.$orderBy;
    $results = $dbh->query($query);
    //Es wird für jedes ergebnis eine Reihe erstellt
    foreach ($results as $row) {

        $genreQuery = '
        SELECT Name FROM genre g
        INNER JOIN genre_spiele gs
        on g.Genre_ID = gs.Genre_ID
        WHERE gs.Spiele_ID = '.$row['Spiele_ID'];

        $genres = $dbh->query($genreQuery);
        $genresStr ="";
        foreach ($genres as $genre){
            $genresStr = $genresStr.$genre['Name'].',';
        }
        $plattformQuery = '
        SELECT Name FROM plattform p
        INNER JOIN spiele_plattform sp
        on p.Plattform_ID = sp.Plattform_ID
        WHERE sp.Spiele_ID = '.$row['Spiele_ID'];

        $plattforms = $dbh->query($plattformQuery);
        $plattformsStr ="";
        foreach ($plattforms as $plattform){
            $plattformsStr = $plattformsStr.$plattform['Name'].',';
        }

        echo '<tr class="main-table-row">';
        echo '<td>' . $row['Spiele_ID'] . '</td>';
        echo '<td><a href="./games-detail.php?id='.$row['Spiele_ID'].'">' . $row['Titel'] . '</a></td>';
        echo '<td>' . $row['Beschreibung'] . '</td>';
        echo '<td>' . $plattformsStr . '</td>';
        echo '<td>' .$genresStr.'</td>';
        echo '<td><a href="' . $row['Trailer'] . '">' . $row['Trailer'] . '</a></td>';
        echo '<td><img class="preview-screenshot" src="./assets/img/screenshot/'.$row['Screenshot'].'"/></td>';
        echo '<td>' . $row['Name'] . '</td>';
        echo '</tr>';
    }
    ?>
    <tbody>
</table>

<?php include("./templates/footer.php"); //footer wird eingebunden ?>
<script type="text/javascript" src="./assets/js/select-dropdown.js"></script>