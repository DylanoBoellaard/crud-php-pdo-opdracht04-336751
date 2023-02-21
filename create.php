<?php
/**
 * We gaan een verbinding maken met de MySQL database
 */
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo 'Er is een verbinding gemaakt met de mysqldatabase';
    } else {
        echo 'Interne servererror, neem contact op met de databasebeheerder';
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

$post = var_dump($_POST);

/**
 * We gaan een sql-query maken voor het wegschrijven van de formuliergegevens in de tabel Afspraak
 */
// Schrijf de sql-insertquery
$sql = "INSERT INTO Afspraak (afspraakID
                            ,kleur1
                            ,kleur2
                            ,kleur3
                            ,kleur4
                            ,tel
                            ,email
                            ,datumTijd
                            ,nagelbijt
                            ,manicure
                            ,nagelreparatie)
        VALUES              (NULL
                            ,:kleur1
                            ,:kleur2
                            ,:kleur3
                            ,:kleur4
                            ,:tel
                            ,:email
                            ,:datumTijd
                            ,:nagelbijt
                            ,:manicure
                            ,:nagelreparatie);";

// Zorgt ervoor dat de default values '' wordt als er niets ingevuld is
// Bij de checkboxes (onderste 3) wordt er ipv een empty string, 'nee' als default value meegegeven als de checkboxes niet aangeklikt zijn
$kleur1 = (isset($_POST['kleur1'])) ? $_POST['kleur1'] : '';
$kleur2 = (isset($_POST['kleur2'])) ? $_POST['kleur2'] : '';
$kleur3 = (isset($_POST['kleur3'])) ? $_POST['kleur3'] : '';
$kleur4 = (isset($_POST['kleur4'])) ? $_POST['kleur4'] : '';
$tel = (isset($_POST['tel'])) ? $_POST['tel'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$datumTijd = (isset($_POST['datumTijd'])) ? $_POST['datumTijd'] : '';
$nagelbijt = (isset($_POST['nagelbijt'])) ? $_POST['nagelbijt'] : "nee";
$manicure = (isset($_POST['manicure'])) ? $_POST['manicure'] : "nee";
$nagelreparatie = (isset($_POST['nagelreparatie'])) ? $_POST['nagelreparatie'] : "nee";



// Maak de sql-query gereed om te worden afgevuurd op de mysql-database
$statement = $pdo->prepare($sql);

// De bindValue method bind de $_POST waarde aan de placeholder
$statement->bindValue(':kleur1', $kleur1, PDO::PARAM_STR);
$statement->bindValue(':kleur2', $kleur2, PDO::PARAM_STR);
$statement->bindValue(':kleur3', $kleur3, PDO::PARAM_STR);
$statement->bindValue(':kleur4', $kleur4, PDO::PARAM_STR);
$statement->bindValue(':tel', $tel, PDO::PARAM_STR);
$statement->bindValue(':email', $email, PDO::PARAM_STR);
$statement->bindValue(':datumTijd', $datumTijd, PDO::PARAM_STR);
$statement->bindValue(':nagelbijt', $nagelbijt, PDO::PARAM_STR);
$statement->bindValue(':manicure', $manicure, PDO::PARAM_STR);
$statement->bindValue(':nagelreparatie', $nagelreparatie, PDO::PARAM_STR);

// Voer de sql-query uit op de database
$statement->execute();

echo "Het opslaan is gelukt";
// Link door naar read.php voor een overzicht van de gegevens in tabel Afspraak
header('Refresh:4; url=read.php');