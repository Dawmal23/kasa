<?php echo "<!DOCTYPE html>
<html lang='pl'>
<head>
    <meta charset='UTF-8'>
    <title>Kasa</title>
</head>
<body>
<fieldset>
<legend>wybierz opcję</legend>
    <form action='wplaty.php' method='get'>
        <input type='number' min='0.01' name='ile' step='0.01' required>
        <input type='submit' value='wpłać'>
    </form>
    <form action='wyplaty.php' method='get'>
    <input type='number' min='0.01' name='kiedy'  step='0.01' required>
        <input type='submit' value='wypłać'>
    </form>
    <form action='inwentaryzacja2.php' method='get'>
        pięćsetek: <input type='number' value='0' min=0 step='0.01' name='piecset' required><br>
        dwusetek: <input type='number' value='0' min=0 step='0.01' name='dwiescie' required><br>
        setek: <input type='number' value='0' min=0 step='0.01' name='sto' required><br>
        piędziesiątek: <input type='number' value='0' min=0 step='0.01' name='piecdziesiat' required><br>
        dwudziestek: <input type='number' value='0' min=0 step='0.01' name='dwadziescia' required><br>
        dziesiątek: <input type='number' value='0' min=0 step='0.01' name='dziesiec' required><br>
        piątek: <input type='number' value='0' min=0 step='0.01' name='piatec' required><br>
        dwójek: <input type='number' value='0' min=0 step='0.01' name='dwojek' required><br>
        jedynek: <input type='number' value='0' min=0 step='0.01' name='jedynek' required><br>
        
        <input type='submit' value='podlicz'>
        
    </form>
    
        
    </fieldset> <br>


";
$banknoty=[];



$banknoty[0] = $_GET['piecset'];

echo '</body>
</html>';

?>