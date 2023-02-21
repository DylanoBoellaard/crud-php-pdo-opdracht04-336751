<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Verbinding";
    } else {
        // echo "Interne error";
    }
} catch(PDOException $e) {
    $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Er is op het formulier knopje gedrukt";
    var_dump($_POST);
    try {
        $sql = "UPDATE Afspraak
                SET kleur1 = :kleur1,
                    kleur2 = :kleur2,
                    kleur3 = :kleur3,
                    kleur4 = :kleur4,
                    tel = :tel,
                    email = :email,
                    datumTijd = :datumTijd,
                    nagelbijt = :nagelbijt,
                    manicure = :manicure,
                    nagelreparatie = :nagelreparatie

                WHERE afspraakID = :afspraakID";

        $nagelbijt = (isset($_POST['nagelbijt'])) ? $_POST['nagelbijt'] : "nee";
        $manicure = (isset($_POST['manicure'])) ? $_POST['manicure'] : "nee";
        $nagelreparatie = (isset($_POST['nagelreparatie'])) ? $_POST['nagelreparatie'] : "nee";


        $statement = $pdo->prepare($sql);
        $statement->bindValue(':afspraakID', $_POST['id'], PDO::PARAM_INT);
        $statement->bindValue(':kleur1', $_POST['kleur1'], PDO::PARAM_STR);
        $statement->bindValue(':kleur2', $_POST['kleur2'], PDO::PARAM_STR);
        $statement->bindValue(':kleur3', $_POST['kleur3'], PDO::PARAM_STR);
        $statement->bindValue(':kleur4', $_POST['kleur4'], PDO::PARAM_STR);
        $statement->bindValue(':tel', $_POST['tel'], PDO::PARAM_STR);
        $statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $statement->bindValue(':datumTijd', $_POST['datumTijd'], PDO::PARAM_STR);
        $statement->bindValue(':nagelbijt', $nagelbijt, PDO::PARAM_STR);
        $statement->bindValue(':manicure', $manicure, PDO::PARAM_STR);
        $statement->bindValue(':nagelreparatie', $nagelreparatie, PDO::PARAM_STR);

        $statement->execute();

        header('Refresh:3; url=read.php');
    } catch(PDOException $e) {
        echo 'Het record is niet geupdate, probeer het opnieuw.'; 
        header('Refresh:3; url=read.php');
    }
    exit();
} 

$sql = "SELECT afspraakID
              ,kleur1 as KA
              ,kleur2 as KB
              ,kleur3 as KC
              ,kleur4 as KD
              ,tel as TE
              ,email as EM
              ,datumTijd as DT
              ,nagelbijt as NB
              ,manicure as MC
              ,nagelreparatie as NR
        FROM Afspraak
        WHERE afspraakID = :afspraakID";

$statement = $pdo->prepare($sql);

$statement->bindValue(':afspraakID', $_GET['id'], PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

var_dump($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht4 - nagelstudio</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h3>Bling Bling Nagelstudio Chantal</h3>

    <a href="read.php">Afspraken</a>
    <form action="update.php" method="post">
        <label for="kleur1">Kies 4 basiskleuren voor uw nagels:</label><br>
        <input type="color" name="kleur1" id="kleur1" value="#f28f93" value="<?= $result->KA ?>">
        <input type="color" name="kleur2" id="kleur2" value="#1e34e2" value="<?= $result->KB ?>">
        <input type="color" name="kleur3" id="kleur3" value="#7e0cd6" value="<?= $result->KC ?>">
        <input type="color" name="kleur4" id="kleur4" value="#ff00a1" value="<?= $result->KD ?>">
    <br>
    <br>
    <label for="tel">Telefoon nummer:</label>
        <input type="tel" name="tel" id="tel" pattern="^\+31\s6\s\d{4}\s\d{2}\s\d{2}$" placeholder="+31 6 1234 56 78" required value="<?= $result->TE ?>">
    <br>
    <br>
    <label for="email">Email:</label>
            <input type="email" name="email" id="email" required value="<?= $result->EM ?>">
    <br>
    <br>
    <label for="date">Datum en tijd:</label>
        <input type="datetime-local" name="datumTijd" id="datumTijd" required value="<?= $result->DT ?>">
    <br>
    <br>
        <input type="checkbox" name="nagelbijt" id="nagelbijt" value="ja">
            <label for="nagelbijt">Nagelbijt arrangement (termijnbetaling mogelijk) €180</label>
    <br>
    <br>
        <input type="checkbox" name="manicure" id="manicure" value="ja">
            <label for="manicure">Luxe manicure (massage en handpakking) €30,00</label>
    <br>
    <br>
        <input type="checkbox" name="nagelreparatie" id="nagelreparatie" value="ja">
            <label for="nagelreparatie">Nagelreparatie per nagel (in eerste week gratis) €5,00</label>
    <br>
    <br>
    
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="submit" value="Sla op">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
