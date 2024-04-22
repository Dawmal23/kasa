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
        <input type='number' min='0.01' name='kiedy' step='0.01' required>
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


    $banknoty =[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,];
    $nominaly=[500,200,100,50,20,10,5,2,1,0.5,0.2,0.1,0.05,0.02,0.01];
    $bylo=fopen("plik.txt", 'r');
    $najpierw=0;
    $bylozaw=fread($bylo, filesize("plik.txt"));
    $k=(explode(",",$bylozaw));
    for($i=0;$i<=14;$i++){
        $najpierw=$najpierw+$k[$i]*$nominaly[$i];

    }
    echo "stan kasy przed wpłatą: $najpierw";
    $suma500=0;
    $suma200=0;
    $suma100=0;
    $suma50=0;
    $suma20=0;
    $suma10=0;
    $suma5=0;
    $suma2=0;
    $suma1=0;
    $suma05=0;
    $suma02=0;
    $suma01=0;
    $suma005=0;
    $suma002=0;
    $suma001=0;
    $sum = $_GET['ile'];
    $liczba=$sum;
   echo "<br>wpłaciłeś: $liczba<br>";
   
    //for($i=0;$i<=$liczba-1;$i++){
        
        piecset:
        if (round($liczba,2)>=500){
            $suma500++;
            $liczba=round($liczba,2)-500;
            
            goto piecset;
        }
        dwiescie:
        if (round($liczba,2)>=200){
            $suma200++;
            $liczba=round($liczba,2)-200;
            goto dwiescie;
        }
        sto:
        if (round($liczba,2)>=100){
            $suma100++;
            $liczba=round($liczba,2)-100;
            goto sto;
        }
        piedziesiat:
        if (round($liczba,2)>=50){
            $suma50++;
            $liczba=round($liczba,2)-50;
            goto piedziesiat;
        }
        dwadziescia:
        if (round($liczba,2)>=20){
            $suma20++;
            $liczba=round($liczba,2)-20;
            goto dwadziescia;
        }
        dziesiec:
        if (round($liczba,2)>=10){
            $suma10++;
            $liczba=round($liczba,2)-10;
            goto dziesiec;
        }
        piec:
        if (round($liczba,2)>=5){
            $suma5++;
            $liczba=round($liczba,2)-5;
            goto piedziesiat;
        }
        dwa:
        if (round($liczba,2)>=2){
            $suma2++;
            $liczba=round($liczba,2)-2;
            goto dwa;
        }
        jeden:
        if (round($liczba,2)>=1){
            $suma1++;
            $liczba=round($liczba,2)-1;
            goto jeden;
        }
        pisiontgr:
        if (round($liczba,2)>=0.5){
            $suma05++;
            $liczba=round($liczba,2)-0.5;
            goto pisiontgr;
        }
        dwadziesciagr:
        if (round($liczba,2)>=0.2){
            $suma02++;
            $liczba=round($liczba,2)-0.2;
            goto dwadziesciagr;
        }
        dziesiecagr:
        if (round($liczba,2)>=0.1){
            
            $suma01++;
            $liczba=round($liczba,2)-0.1;
            goto dziesiecagr;
        }
        piecgr:
        if (round($liczba,2)>=0.05){
            $suma005++;
            $liczba=round($liczba,2)-0.05;
            //echo $liczba;
            goto piecgr;
        }
        dwagr:
        if (round($liczba,2)>=0.02){
            $suma002++;
            $liczba=round($liczba,2)-0.02;
            goto dwagr;
        }
        jedengr:
        if (round($liczba,2)>=0.01){
            $suma001++;
            $liczba=round($liczba,2)-0.01;
            goto jedengr;
        }
   
    $banknoty[0]=$suma500;
    $banknoty[1]=$suma200;
    $banknoty[2]=$suma100;
    $banknoty[3]=$suma50;
    $banknoty[4]=$suma20;
    $banknoty[5]=$suma10;
    $banknoty[6]=$suma5;
    $banknoty[7]=$suma2;
    $banknoty[8]=$suma1;
    $banknoty[9]=$suma05;
    $banknoty[10]=$suma02;
    $banknoty[11]=$suma01;
    $banknoty[12]=$suma005;
    $banknoty[13]=$suma002;
    $banknoty[14]=$suma001;
echo "<br>pięćsetek: $suma500";
echo "<br>dwusetek: $suma200";
echo "<br>setek: $suma100";
echo "<br>piędziesiątek: $suma50";
echo "<br>dwudziestek: $suma20";
echo "<br>dziesiątek: $suma10";
echo "<br>piątek: $suma5";
echo "<br>dwójek: $suma2";
echo "<br>jedynek: $suma1";
echo "<br>piędziesiąt groszy: $suma05";
echo "<br>dwadzieścia groszy: $suma02";
echo "<br>dziesięć groszy: $suma01";
echo "<br>pięc groszy: $suma005";
echo "<br>dwa groszy: $suma002";
echo "<br>jeden groszy: $suma001<br>";
$suma=0;
for ($i=0;$i<=14;$i++){
    $suma=round($suma,2)+$banknoty[$i]*$nominaly[$i];
}

echo "<br>razem wpłaciłeś: $suma<br>";



for($i=0;$i<=14;$i++){
    $banknoty[$i]=$banknoty[$i]+$k[$i];

}


fclose($bylo);


$suma=0;
for ($i=0;$i<=14;$i++){
    $suma=$suma+$banknoty[$i]*$nominaly[$i];
}
$jest=fopen("plik.txt","w");
fwrite($jest, implode(',',$banknoty));
fclose($jest);

echo "aktualny stan kasy: ";
echo $suma;


echo '</body>
</html>';

?>