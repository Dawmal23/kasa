<?php echo "<!DOCTYPE html>
<html lang='pl'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='style.css'>
    <title>Kasa</title>
</head>
<body>
<div id='szynka'>
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
</div>

";
$najpierw=0;
$banknoty =[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,];
$nominaly=[500,200,100,50,20,10,5,2,1,0.5,0.2,0.1,0.05,0.02,0.01];
$bylo=fopen("plik.txt", 'r');
$bylozaw=fread($bylo, filesize("plik.txt"));
    $k=(explode(",",$bylozaw));
    for($i=0;$i<=14;$i++){
        $najpierw=$najpierw+$k[$i]*$nominaly[$i];

    }
fclose($bylo);
    $tab=[];
    $tab[0] = $_GET['piecset'];
    $tab[1] = $_GET['dwiescie'];
    $tab[2] = $_GET['sto'];
    $tab[3] = $_GET['piecdziesiat'];
    $tab[4] = $_GET['dwadziescia'];
    $tab[5] = $_GET['dziesiec'];
    $tab[6] = $_GET['piatec'];
    $tab[7] = $_GET['dwojek'];
    $tab[8] = $_GET['jedynek'];
    $tab[9] = $_GET['pisiondgr'];
    $tab[10] = $_GET['dwadziesciagr'];
    $tab[11] = $_GET['dziesiecgr'];
    $tab[12] = $_GET['piecgr'];
    $tab[13] = $_GET['dwagr'];
    $tab[14] = $_GET['gr'];
    $suma=0;
    echo "<div id='tabela1'>
    <table><tr><td>-</td><td>stan rzeczywisty</td><td>stan logiczny</td></tr>";
    for ($i=0;$i<=14;$i++){
        echo "<tr><td>";
        if($k[$i]==$tab[$i]){
            echo $nominaly[$i]."</td><td>".$tab[$i]."</td><td>".$k[$i]."</td></tr>";
        }else{
            echo $nominaly[$i]."</td><td bgcolor=#dd7373>".$tab[$i]."</td><td>".$k[$i]."</td></tr>";
            $k[$i]=$tab[$i];

        }
        
        $suma=$suma+$tab[$i]*$nominaly[$i];
    } 
    if($suma==$najpierw){ 
    echo "<tr><td>-</td><td>$suma</td><td>$najpierw</td></table>";
    }else{
        echo "<tr><td>-</td><td bgcolor=#dd7373>$suma</td><td>$najpierw</td></table>";
        if($suma>$najpierw){
        echo "<input type='submit' id='pstryczek' value='dołuż do kasy brakujące pieniądze'";
        
        }else{
            echo "<input type='submit' id='pstryczek' value='wyjmij z kasy nadmiar pieniądzy'";
            for ($i=0;$i<=14;$i++){
                $k[$i]=$tab[$i];
                }
        }
    }
    echo "</div></div>";
    
    echo "<div id='tabela2'><table><tr><td>-</td><td>stan rzeczywisty</td><td>stan logiczny</td></tr>";
    for ($i=0;$i<=14;$i++){
        echo "<tr><td>";
        
        echo $nominaly[$i]."</td><td>".$tab[$i]."</td><td>".$k[$i]."</td></tr>";
    }
    echo "<tr><td>-</td><td>$suma</td><td>$suma</td></table>";
    echo "</div></div>";
    $jest=fopen("plik.txt","w");

    fwrite($jest, implode(',',$tab));
    fclose($jest);


?>
<script type="text/JavaScript">
    var tabela1 = document.getElementById("tabela1")
    var tabela2 = document.getElementById("tabela2")
    tabela2.style.display="none"
    var szynka = document.getElementById("szynka")
    var pstryczek = document.getElementById("pstryczek")
    szynka.style.display = "none"
    pstryczek.onclick = function(){
        szynka.style.display = ""
        tabela2.style.display=""
        pstryczek.style.display="none"
        tabela1.style.display="none"
        
    }
</script>

</body>
</html>
