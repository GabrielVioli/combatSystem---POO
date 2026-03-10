<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arena</title>
</head>
<body>

<?php
foreach ($duelo as $chave => $valor) {
    foreach ($valor as $chave1 => $valor2) {
        echo "{$chave1} {$chave}: {$valor2}<br>";
    }
}

echo "<br>";


var_dump($_SESSION);
?>


<form action="#" method="post">
    <button type="submit" name="bolaDeFogo">ataque</button>
    <button type="submit" name="CorteCortante">ataque2</button>
    <button type="submit" name="sla">ataque3</button>
</form>

</body>
</html>