<?php
$title="Entwickler";//Seitenüberschrift wird definiert
include ("./templates/header.php");//header wird eingebunden
include("./templates/database-connect.php");//verbindung zur Datenbank wird aufgebaut

//Spaltenüberschriften, die Angezeigt werden soll
$rowsHeading = [
    'Entwickler_ID',
    'Name',
    'Gründungsjahr',
    'Geschichte',
    'E-Mail',
    'Land'
];
//Spalten, nach denen Gefiltert werden darf
$rowsFilterable = [
    'Entwickler_ID',
    'Name',
    'Gründungsjahr',
    'Geschichte',
    'E-Mail',
    'Land'
];
?>
<?php include("./templates/sort-form.php");//Sortierformular wird eingebunden ?>
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
    $query = 'SELECT * FROM entwickler e inner join kontaktdaten k on e.Kontaktdaten_ID = k.Kontaktdaten_ID'.$orderBy;
    $results = $dbh->query($query);
    //Es wird für jedes ergebnis eine Reihe erstellt
    foreach ($results as $row) {
        echo '<tr class="main-table-row">';
        echo '<td>' . $row['Entwickler_ID'] . '</td>';
        echo '<td>' . $row['Name'] . '</td>';
        echo '<td>' . $row['Gründungsjahr'] . '</td>';
        echo '<td>' . $row['Geschichte'] . '</td>';
        echo '<td>' . $row['E-Mail'] . '</td>';
        echo '<td>' . $row['Land'] . '</td>';
        echo '</tr>';
    }
    ?>
    <tbody>
</table>
<?php include("./templates/footer.php"); //footer wird eingebunden ?>
<script type="text/javascript" src="./assets/js/select-dropdown.js"></script><?php //Javascript komponente zum designen der Filter wird eingebunden?>