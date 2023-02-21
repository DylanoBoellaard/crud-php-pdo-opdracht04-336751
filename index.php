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
    <form action="create.php" method="post">
        <label for="kleur1">Kies 4 basiskleuren voor uw nagels:</label><br>
        <input type="color" name="kleur1" id="kleur1" value="#f28f93">
        <input type="color" name="kleur2" id="kleur2" value="#1e34e2">
        <input type="color" name="kleur3" id="kleur3" value="#7e0cd6">
        <input type="color" name="kleur4" id="kleur4" value="#ff00a1">
    <br>
    <br>
    <label for="tel">Telefoon nummer:</label>
        <input type="tel" name="tel" id="tel" pattern="^\+31\s6\s\d{4}\s\d{2}\s\d{2}$" placeholder="+31 6 1234 56 78" required>
    <br>
    <br>
    <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
    <br>
    <br>
    <label for="date">Datum en tijd:</label>
        <input type="datetime-local" name="datumTijd" id="datumTijd" required>
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
    <input type="hidden" name="datumTijd">
        <input type="submit" value="Sla op">
        <input type="reset" value="Reset">
    </form>
</body>
</html>