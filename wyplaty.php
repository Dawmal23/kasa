<!DOCTYPE html>
<html lang='pl'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='style.css'>
    <title>Kasa</title>
</head>
<div id="szata">
    Wybierz kolor:
    <input type="button" id="biały">
    <input type="button" id="czarny">
    <input type="button" id="niebieski">
    <input type="button" id="czerwony">
    <input type="button" id="zielony">
    Wybierz wielkość czcionki:
    <input type="button" value="A" id="mala">
    <input type="button" value="A" id="srednia">
    <input type="button" value="A" id="duza">
    </div>
<body>

<fieldset>
        <legend>wybierz opcję</legend>
        <form action='wplaty.php' method='get'>
            
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
<?php 

$banknoty =[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,];
$nominaly=[500,200,100,50,20,10,5,2,1,0.5,0.2,0.1,0.05,0.02,0.01];
$ile = $_GET['kiedy'];

echo "chciałeś wypłacić: ".$ile;
$liczba=$ile;
$bylo=fopen("plik.txt","r");



$rap=fopen("raport.txt", "r");
$lik=fread($rap, filesize("raport.txt"));
$lik=explode("\n",$lik);

fclose($rap);




    $najpierw=0;
    $bylozaw=fread($bylo, filesize("plik.txt"));
    $k=(explode(",",$bylozaw));
    for($i=0;$i<=14;$i++){
        $najpierw=$najpierw+$k[$i]*$nominaly[$i];

    }
    echo "<br>stan kasy przed wpłatą: $najpierw";
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
    piecset:
        if (round($liczba,2)>=500 && $k[0]>$suma500){
            $suma500++;
            $liczba=round($liczba,2)-500;
            
            goto piecset;
        }
        dwiescie:
        if (round($liczba,2)>=200 && $k[1]>$suma200){
            $suma200++;
            $liczba=round($liczba,2)-200;
            goto dwiescie;
        }
        sto:
        if (round($liczba,2)>=100 && $k[2]>$suma100){
            $suma100++;
            $liczba=round($liczba,2)-100;
            goto sto;
        }
        piedziesiat:
        if (round($liczba,2)>=50 && $k[3]>$suma50){
            $suma50++;
            $liczba=round($liczba,2)-50;
            goto piedziesiat;
        }
        dwadziescia:
        if (round($liczba,2)>=20 && $k[4]>$suma20){
            $suma20++;
            $liczba=round($liczba,2)-20;
            goto dwadziescia;
        }
        dziesiec:
        if (round($liczba,2)>=10 && $k[5]>$suma10){
            $suma10++;
            $liczba=round($liczba,2)-10;
            goto dziesiec;
        }
        piec:
        if (round($liczba,2)>=5 && $k[6]>$suma5){
            $suma5++;
            $liczba=round($liczba,2)-5;
            goto piec;
        }
        dwa:
        if (round($liczba,2)>=2 && $k[7]>$suma2){
            $suma2++;
            $liczba=round($liczba,2)-2;
            goto dwa;
        }
        jeden:
        if (round($liczba,2)>=1 && $k[8]>$suma1){
            $suma1++;
            $liczba=round($liczba,2)-1;
            goto jeden;
        }
        pisiontgr:
        if (round($liczba,2)>=0.5 && $k[9]>$suma05){
            $suma05++;
            $liczba=round($liczba,2)-0.5;
            goto pisiontgr;
        }
        dwadziesciagr:
        if (round($liczba,2)>=0.2 && $k[10]>$suma02){
            $suma02++;
            $liczba=round($liczba,2)-0.2;
            goto dwadziesciagr;
        }
        dziesiecagr:
        if (round($liczba,2)>=0.1 && $k[11]>$suma01){
            
            $suma01++;
            $liczba=round($liczba,2)-0.1;
            goto dziesiecagr;
        }
        piecgr:
        if (round($liczba,2)>=0.05 && $k[12]>$suma005){
            $suma005++;
            $liczba=round($liczba,2)-0.05;
            //echo $liczba;
            goto piecgr;
        }
        dwagr:
        if (round($liczba,2)>=0.02 && $k[13]>$suma002){
            $suma002++;
            $liczba=round($liczba,2)-0.02;
            goto dwagr;
        }
        jedengr:
        if (round($liczba,2)>=0.01 && $k[14]>$suma001){
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
    $tym=$banknoty;
    $x='';
    for($i=0;$i<=14;$i++){
        $tym[$i]=$k[$i]-$tym[$i];  
    }
    
  

echo "<br>pięćsetek: ".$k[0]-$tym[0];
echo "<br>dwusetek: ".$k[1]-$tym[1];
echo "<br>setek: ".$k[2]-$tym[2];
echo "<br>piędziesiątek:".$k[3]-$tym[3];
echo "<br>dwudziestek: ".$k[4]-$tym[4];
echo "<br>dziesiątek: ".$k[5]-$tym[5];
echo "<br>piątek: ".$k[6]-$tym[6];
echo "<br>dwójek: ".$k[7]-$tym[7];
echo "<br>jedynek: ".$k[8]-$tym[8];
echo "<br>piędziesiąt groszy: ".$k[9]-$tym[9];
echo "<br>dwadzieścia groszy: ".$k[10]-$tym[10];
echo "<br>dziesięć groszy: ".$k[11]-$tym[11];
echo "<br>pięc groszy: ".$k[12]-$tym[12];
echo "<br>dwa groszy: ".$k[13]-$tym[13];
echo "<br>jeden groszy: ".$k[14]-$tym[14];
$jest=fopen("plik.txt","w");


$suma=0;



for ($i=0;$i<=14;$i++){
    $suma=round($suma,2)+$tym[$i]*$nominaly[$i];
}
echo "<br>aktualny stan kasy: ";
echo $suma;


echo "$x<br>";
$suma=0;
for ($i=0;$i<=14;$i++){
    $suma=$suma+($k[$i]-$tym[$i])*$nominaly[$i];
}
fwrite($jest, implode(',',$tym));
fclose($jest);
if ($suma!=$ile){
    echo "z powodu braku środków wypłacono mniej niż chciano";
}

echo "<br>razem wypłaciłeś: $suma<br>";
fclose($bylo);
$raport=fopen("raport.txt", "a");
$index=count($lik);
$nazwa="wp$index";
$data=date("Y-m-d");
$czas=date("H:i");
$tresc='wyplata';
$suma=0-$suma;
fwrite($raport,"$index $nazwa $data $czas $tresc $suma\n");


fclose($raport);





?>
<script>
        let x = document.cookie;
        alert(x[9])
        alert(x[18])
    

        document.cookie = "kolor= 1"
        document.cookie = "wielkosc= 1"
        biały.onclick=function(){
            document.body.style.backgroundColor="rgb(255, 255, 255)"
            document.body.style.color="black"
            document.cookie = "kolor= 1"
           
        }
        czarny.onclick=function(){
            document.body.style.backgroundColor="rgb(0, 0 ,0)"
            document.body.style.color="white"
            document.cookie = "kolor= 2"
            
        }
        niebieski.onclick=function(){
            document.body.style.backgroundColor="aqua"
            document.body.style.color="black"
            kolor=3
            document.cookie = "kolor= 3"
           
        }
        czerwony.onclick=function(){
            document.body.style.backgroundColor="rgb(223, 22, 89)"
            document.body.style.color="black"
            document.cookie = "kolor= 4"
            kolor=4
            
        }
        zielony.onclick=function(){
            document.body.style.backgroundColor="rgb(23, 214, 49)"
            document.body.style.color="black"
            kolor=5
            document.cookie = "kolor= 5"
            
        }
        mala.onclick=function(){
            document.body.style.fontSize="100%"
            document.coocie = "wielkosc= 1"
           
        }
        srednia.onclick=function(){
            document.body.style.fontSize="150%"
            document.coocie = "wielkosc= 2"
           
        }
        duza.onclick=function(){
            document.body.style.fontSize="200%"
            document.coocie = "wielkosc= 3"
        }

    </script>
</body>
</html>
