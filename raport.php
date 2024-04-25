<?php echo "<!DOCTYPE html>
<html lang='pl'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='style.css'>
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
$kil=fread($plik, filesize("raport.txt"));
$lik=explode("\n",$kil);
echo "<table><tr><td>ID</td><td>nazwa</td><td>data</td><td>komentarz</td><td>ilość</td></tr>";
for ($i=0;$i<count($lik);$i++){
    $czesc=explode(' ',$lik[$i]);
    echo "<tr><td>".$czesc[0]."</td><td>".$czesc[1]."</td><td>".$czesc[2]." ".$czesc[3]."</td><td>".$czesc[4]."</td><td>".$czesc[5]."</td></tr>";

}
echo "</table>";





fclose($plik);

echo '</body>
</html>';

?>