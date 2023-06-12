<?php
$title="InputDB"; //Seitenüberschrift wird definiert
include ("./templates/header.php");//header wird eingebunden
include("./templates/database-connect.php");//verbindung zur Datenbank wird aufgebaut
?>

<h1>Spiele verwalten</h1>
<div class="admin-insert-container">
    <div class="admin-insert-row">
        <h2>Hinzufügen</h2>
        <form action="insertDB.php" method="post">
            <p>
                <label for="titel">Titel:</label>
                <input type="text" name="titel" id="titel">
            </p>
            <p>
                <label for="beschreibung">Beschreibung:</label>
                <input type="text" name="beschreibung" id="beschreibung">
            </p>
            <p>
                <label for="trailer">Trailer Url:</label>
                <input type="text" name="trailer" id="trailer">
            </p>
            <p>
                <label for="screenshot">Screenshot:</label>
                <input type="file"
                       id="screenshot" name="screenshot"
                       accept="image/jpg">
            </p>
            <p>
                <label for="systemanforderung">Systemanforderung:</label>
                <input type="text" name="systemanforderung" id="systemanforderung">
            </p>

            <?php
            $query = 'SELECT Entwickler_ID, Name FROM entwickler';
            $entwicklers = $dbh->query($query);
            ?>
            <p>
                <div id="entwicklers" class="dropdown-check-list" tabindex="100">
                    <span class="anchor">Entwickler auswählen</span>
                    <ul class="items">
                        <?php
                        foreach ($entwicklers as $entwickler){
                            echo '<li><input type="radio" name="entwickler" value="'.$entwickler["Entwickler_ID"].'" />'.$entwickler["Name"].' </li>';
                        }
                        ?>
                    </ul>
                </div>
            </p>

            <?php
            $query = 'SELECT Genre_ID, Name FROM genre';
            $genres = $dbh->query($query);
            ?>
            <p>
                <div id="genres" class="dropdown-check-list" tabindex="100">
                    <span class="anchor">Genres auswählen</span>
                    <ul class="items">
                        <?php
                        foreach ($genres as $genre){
                            echo '<li><input type="checkbox" name="genres[]" value="'.$genre["Genre_ID"].'" />'.$genre["Name"].' </li>';
                        }
                        ?>
                    </ul>
                </div>
            </p>

            <?php
            $query = 'SELECT Plattform_ID, Name, Hersteller FROM plattform';
            $plattforms = $dbh->query($query);
            ?>
            <p>
                <div id="plattforms" class="dropdown-check-list" tabindex="100">
                    <span class="anchor">Plattform auswählen</span>
                    <ul class="items">
                        <?php
                        foreach ($plattforms as $plattform){
                            echo '<li><input type="checkbox" name="plattforms[]" value="'.$plattform["Plattform_ID"].'" />'.$plattform["Name"].' - '.$plattform["Hersteller"].' </li>';
                        }
                        ?>
                    </ul>
                </div>
            </p>

            <input type="submit" value="Senden" name="submit-spiele" class="submit-button">
        </form>
    </div>
    <div class="admin-insert-row">
        <h2>Löschen</h2>
        <?php
        $query = 'SELECT Spiele_ID, Titel FROM spiele';
        $spiele = $dbh->query($query);
        ?>
        <form action="deleteDB.php" method="post">
            <p>
                <div id="spiele-delete" class="dropdown-check-list" tabindex="100">
                    <span class="anchor">Spiele zum Löschen wählen</span>
                    <ul class="items">
                        <?php
                        foreach ($spiele as $spiel){
                            echo '<li><input type="checkbox" name="spiele[]" value="'.$spiel["Spiele_ID"].'" />'.$spiel["Titel"].'</li>';
                        }
                        ?>
                    </ul>
                </div>
            </p>
            <input type="submit" value="Senden" name="delete-spiele" class="submit-button">
        </form>
    </div>
</div>




<h1>Entwickler verwalten</h1>
<div class="admin-insert-container">
    <div class="admin-insert-row">
        <h2>Hinzufügen</h2>
        <form action="insertDB.php" method="post">
            <p>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
            </p>
            <p>
                <label for="gründungsjahr">Gründungsjahr:</label>
                <input type="date" name="gründungsjahr" id="gründungsjahr">
            </p>
            <p>
                <label for="geschichte">Geschichte:</label>
                <input type="text" name="geschichte" id="geschichte">
            </p>
            <p>
                <label for="straße">Straße:</label>
                <input type="text" name="straße" id="straße">
            </p>
            <p>
                <label for="plz">PLZ:</label>
                <input type="text" name="plz" id="plz">
            </p>
            <p>
                <label for="ort">Ort:</label>
                <input type="text" name="ort" id="ort">
            </p>
            <p>
                <label for="land">Land:</label>
                <input type="text" name="land" id="land">
            </p>
            <p>
                <label for="E-Mail">E-Mail:</label>
                <input type="text" name="E-Mail" id="E-Mail">
            </p>
            <p>
                <label for="telefonnummer">Telefonnummer:</label>
                <input type="text" name="telefonnummer" id="telefonnummer">
            </p>
            <input type="submit" value="Senden" name="submit-entwickler" class="submit-button">
        </form>
    </div>
    <div class="admin-insert-row">
        <h2>Löschen</h2>
        <?php
        $query = 'SELECT Entwickler_ID, Name FROM entwickler';
        $entwicklers = $dbh->query($query);
        ?>
        <form action="deleteDB.php" method="post">
            <p>
                <div id="entwicklers-delete" class="dropdown-check-list" tabindex="100">
                    <span class="anchor">Entwickler zum Löschen wählen</span>
                    <ul class="items">
                        <?php
                        foreach ($entwicklers as $entwickler){
                            echo '<li><input type="checkbox" name="entwicklers[]" value="'.$entwickler["Entwickler_ID"].'" />'.$entwickler["Name"].'</li>';
                        }
                        ?>
                    </ul>
                </div>
            </p>
            <input type="submit" value="Senden" name="delete-entwickler" class="submit-button">
        </form>
    </div>
</div>




<h1>Genre verwalten</h1>
<div class="admin-insert-container">
    <div class="admin-insert-row">
        <h2>Hinzufügen</h2>
        <form action="insertDB.php" method="post">
            <p>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
            </p>
            <p>
                <label for="beschreibung">Beschreibung:</label>
                <input type="text" name="beschreibung" id="beschreibung">
            </p>
            <input type="submit" value="Senden" name="submit-genre" class="submit-button">
        </form>
    </div>
    <div class="admin-insert-row">
        <h2>Löschen</h2>
        <?php
        $query = 'SELECT Genre_ID, Name FROM genre';
        $genres = $dbh->query($query);
        ?>
        <form action="deleteDB.php" method="post">
            <p>
                <div id="genres-delete" class="dropdown-check-list" tabindex="100">
                    <span class="anchor">Genre zum Löschen wählen</span>
                    <ul class="items">
                        <?php
                        foreach ($genres as $genre){
                            echo '<li><input type="checkbox" name="genres[]" value="'.$genre["Genre_ID"].'" />'.$genre["Name"].'</li>';
                        }
                        ?>
                    </ul>
                </div>
            </p>
            <input type="submit" value="Senden" name="delete-genre" class="submit-button">
        </form>
    </div>
</div>




<h1>Plattform verwalten</h1>
<div class="admin-insert-container">
    <div class="admin-insert-row">
        <h2>Hinzufügen</h2>
        <form action="insertDB.php" method="post">
            <p>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
            </p>
            <p>
                <label for="hersteller">Hersteller:</label>
                <input type="text" name="hersteller" id="hersteller">
            </p>
            <p>
                <label for="veröffentlichungsdatum">Veröffentlichungsdatum:</label>
                <input type="date" name="veröffentlichungsdatum" id="veröffentlichungsdatum">
            </p>
            <input type="submit" value="Senden" name="submit-plattform" class="submit-button">
        </form>
    </div>
    <div class="admin-insert-row">
        <h2>Löschen</h2>
        <?php
        $query = 'SELECT Plattform_ID, Name FROM plattform';
        $plattforms = $dbh->query($query);
        ?>
        <form action="deleteDB.php" method="post">
            <p>
                <div id="plattforms-delete" class="dropdown-check-list" tabindex="100">
                    <span class="anchor">Plattform zum Löschen wählen</span>
                    <ul class="items">
                        <?php
                        foreach ($plattforms as $plattform){
                            echo '<li><input type="checkbox" name="plattforms[]" value="'.$plattform["Plattform_ID"].'" />'.$plattform["Name"].'</li>';
                        }
                        ?>
                    </ul>
                </div>
            </p>
            <input type="submit" value="Senden" name="delete-plattform" class="submit-button">
        </form>
    </div>
</div>


<?php include("./templates/footer.php"); //footer wird eingebunden?>
<script>

    var checkListGenres = document.getElementById('genres');
    checkListGenres.getElementsByClassName('anchor')[0].onclick = function(evt) {
        if (checkListGenres.classList.contains('visible'))
            checkListGenres.classList.remove('visible');
        else
            checkListGenres.classList.add('visible');
    }

    var checkListEntwickler = document.getElementById('entwicklers');
    checkListEntwickler.getElementsByClassName('anchor')[0].onclick = function(evt) {
        if (checkListEntwickler.classList.contains('visible'))
            checkListEntwickler.classList.remove('visible');
        else
            checkListEntwickler.classList.add('visible');
    }

    var checkListPlattform = document.getElementById('plattforms');
    checkListPlattform.getElementsByClassName('anchor')[0].onclick = function(evt) {
        if (checkListPlattform.classList.contains('visible'))
            checkListPlattform.classList.remove('visible');
        else
            checkListPlattform.classList.add('visible');
    }
    var checkListSpieleDelete = document.getElementById('spiele-delete');
    checkListSpieleDelete.getElementsByClassName('anchor')[0].onclick = function(evt) {
        if (checkListSpieleDelete.classList.contains('visible'))
            checkListSpieleDelete.classList.remove('visible');
        else
            checkListSpieleDelete.classList.add('visible');
    }
    var checkListEntwicklersDelete = document.getElementById('entwicklers-delete');
    checkListEntwicklersDelete.getElementsByClassName('anchor')[0].onclick = function(evt) {
        if (checkListEntwicklersDelete.classList.contains('visible'))
            checkListEntwicklersDelete.classList.remove('visible');
        else
            checkListEntwicklersDelete.classList.add('visible');
    }
    var checkListGenresDelete = document.getElementById('genres-delete');
    checkListGenresDelete.getElementsByClassName('anchor')[0].onclick = function(evt) {
        if (checkListGenresDelete.classList.contains('visible'))
            checkListGenresDelete.classList.remove('visible');
        else
            checkListGenresDelete.classList.add('visible');
    }
    var checkListPlattformsDelete = document.getElementById('plattforms-delete');
    checkListPlattformsDelete.getElementsByClassName('anchor')[0].onclick = function(evt) {
        if (checkListPlattformsDelete.classList.contains('visible'))
            checkListPlattformsDelete.classList.remove('visible');
        else
            checkListPlattformsDelete.classList.add('visible');
    }
</script>