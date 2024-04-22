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
    <form action='inwentaryzacja.php' method='get'>
        <input type='submit' value='inwentaryzacja'>
    </form>
    <form action='raport.php' method='get'>
        <input type='submit' value='raport'>
    </form>
        
    </fieldset> <br>


";
    $banknoty = array(
        '500'=>0,
        '200'=>0,
        '100'=>0,
        '50'=>0,
        '20'=>0,
        '10'=>0,
        '5'=>0,
        '2'=>0,
        '1'=>0,
        '0.5'=>0,
        '0.2'=>0,
        '0.1'=>0,

    );
    echo "<pre>";
print_r($banknoty);
echo "</pre>";

echo '</body>
</html>';

?>