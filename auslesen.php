<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico">
        <link rel="stylesheet" href="./assets/css/default.css">
        <title>GamesDB - Home</title>
    </head>
    <body>
        <?php include("./header.php"); ?>
        <div class="main-content">
            <?php
            try {
                $dsn = 'mysql:host=localhost;dbname=videodb;charset=utf8mb4';
                $username = 'root';
                $password = '';
                $dbh = new \PDO($dsn, $username, $password);
            } catch(\Exception $e) {
                echo "<p>Datenbank ist nicht erreichbar</p>";
                die('Interner Fehler: Die Datenbank-Verbindung konnte nicht aufgebaut werden.');
            }



            $spalten = [
            'Titel' => 'Titel',
            'Beschreibung' => 'Beschreibung'
            ];
            ?>

            <table>
                <thead>
                <tr>
                    <?php
                    foreach ($spalten as $name) {
                        echo '<th>', htmlspecialchars($name), '</th>';
                    }
                    ?>
                </tr>
                </thead>
                <tbody>
                <?php
                $results = $dbh->query('SELECT * FROM `spiele`');

                foreach($results as $result) {
                    echo '<tr>';

                    foreach ($spalten as $schluessel => $name) {
                        echo '<td>', htmlspecialchars($result[$schluessel]), '</td>';
                    }

                    echo '</tr>';
                }
                ?>
                <tbody>
            </table>


        </div>
        <?php include("./footer.html"); ?>
    </body>
</html>



