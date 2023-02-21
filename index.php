<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht4 - nagelstudio</title>
</head>

<body>
    <h3>Bling Bling Nagelstudio Chantal</h3>

    <a href="read.php">Afspraken</a>
    <form action="create.php" method="post">
        <label for="color1">Kies 4 basiskleuren voor uw nagels:</label><br>
        <input type="color" name="color1" id="color1" value="#f28f93">
        <input type="color" name="color2" id="color2" value="#1e34e2">
        <input type="color" name="color3" id="color3" value="#7e0cd6">
        <input type="color" name="color4" id="color4" value="#ff00a1">
    <br>
    <br>
        <input type="tel" name="tel" id="tel" pattern="[0-9]{2}-[0-9]{1}-[0-9]{4}-[0-9]{2}-[0-9]{2}" placeholder="31 6 1234 56 78" required>
    <br>
    <br>
        <input type="email" name="email" id="email" required>
    <br>
    <br>
        <input type="datetime-local" name="date" id="date" required>
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
    <input type="hidden" name="date">
        <input type="submit" value="Sla op">
        <input type="reset" value="Reset">
    </form>
</body>
</html>