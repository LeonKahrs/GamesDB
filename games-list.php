<?php
$title="Spiele";//Seitenüberschrift wird definiert
include ("./templates/header.php");//header wird eingebunden
include("./templates/database-connect.php");//verbindung zur Datenbank wird aufgebaut

//Spaltenüberschriften, die Angezeigt werden soll
$rowsHeading = [
    'Spiele_ID',
    'Titel',
    'Beschreibung',
    'Trailer',
    'Screenshot',
    'Entwickler'
];
//Spalten, nach denen Gefiltert werden darf
$rowsFilterable = [
    'Spiele_ID',
    'Titel',
    'Beschreibung',
    'Entwickler'
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
    $query = 'SELECT * FROM spiele s inner join entwickler e on s.Entwickler_ID = e.Entwickler_ID'.$orderBy;
    $results = $dbh->query($query);
    //Es wird für jedes ergebnis eine Reihe erstellt
    foreach ($results as $row) {
        echo '<tr class="main-table-row">';
        echo '<td>' . $row['Spiele_ID'] . '</td>';
        echo '<td>' . $row['Titel'] . '</td>';
        echo '<td>' . $row['Beschreibung'] . '</td>';
        echo '<td><a href="' . $row['Trailer'] . '">' . $row['Trailer'] . '</a></td>';
        echo '<td><img class="preview-screenshot" src="data:image/jpeg;base64,' . base64_encode($row['Screenshot']) . '"/></td>';
        echo '<td>' . $row['Name'] . '</td>';
        echo '</tr>';
    }
    ?>
    <tbody>
</table>

<?php include("./templates/footer.php"); //footer wird eingebunden ?>
<script type="text/javascript" src="./assets/js/select-dropdown.js"></script>