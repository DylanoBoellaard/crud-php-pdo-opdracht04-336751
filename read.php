<?php
    /**
     * Maak een verbinding met de mysql-server en database
     */

    // 1. Voeg een configuratiebestand toe
    require('config.php');

    // 2. Maak een data source name string
    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

    try {
        // 3. Maak een pdo-object aan voor het maken van de verbinding
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        if ($pdo) {
            // echo "Er is verbinding met de mysql-server en database";
        } else {
            echo "Interne server-error. Probeer het later nog eens";
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

    // 4. Maak een select query voor het opvragen van de gegevens.
    $sql = "SELECT afspraakID
                    ,kleur1
                    ,kleur2
                    ,kleur3
                    ,kleur4
                    ,tel
                    ,email
                    ,datumTijd
                    ,nagelbijt
                    ,manicure
                    ,nagelreparatie
            FROM Afspraak
            ORDER BY afspraakID";

    // 5. We bereiden de query voor met de method prepare()
    $statement = $pdo->prepare($sql);

    // 6. We vuren de query af op de mysql-database
    $statement->execute();

    // 7. We stoppen het resultaat van de query in de variabele $result
    $result = $statement->fetchAll(PDO::FETCH_OBJ);

    $rows = "";
    foreach ($result as $info) {
        $rows .= "<tr>
                    <td>$info->afspraakID</td>
                    <td>$info->kleur1</td>
                    <td>$info->kleur2</td>
                    <td>$info->kleur3</td>
                    <td>$info->kleur4</td>
                    <td>$info->tel</td>
                    <td>$info->email</td>
                    <td>$info->datumTijd</td>
                    <td>$info->nagelbijt</td>
                    <td>$info->manicure</td>
                    <td>$info->nagelreparatie</td>
                    <td>
                        <a href='delete.php?id={$info->afspraakID}'>
                            <img src='img/b_drop.png' alt='kruis'>
                        </a>
                    </td>
                    <td> 
                        <a href='update.php?id={$info->afspraakID}'>
                            <img src='img/b_edit.png' alt='potlood'>
                        </a>
                    </td>
                  </tr>";
    }
?>

<link rel="stylesheet" href="css/style.css">
<a href="index.php">Homepage</a>
<h3>Afspraken</h3>
<a href="index.php"><input type="button" value="Nieuwe afspraak"></a>
<br><br>
<table border="1">
    <thead>
        <th>Id</th>
        <th>kleur1</th>
        <th>kleur2</th>
        <th>kleur3</th>
        <th>kleur4</th>
        <th>tel</th>
        <th>email</th>
        <th>datumTijd</th>
        <th>nagelbijt</th>
        <th>manicure</th>
        <th>nagelreparatie</th>
        <th></th>
        <th></th>   
    </thead>
    <tbody>
        <?= $rows; ?>   
    </tbody>
</table>