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
$plik=fopen("raport.txt","r");
$lik=fread($plik, filesize("raport.txt"));
$lik=explode("\n",$lik);
for($i=0;$i<count($lik);$i++){
echo $lik[$i];
echo "<br>";
}
fclose($plik);

echo '</body>
</html>';

?>