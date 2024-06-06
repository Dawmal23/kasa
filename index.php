<!DOCTYPE html>
<html lang='pl'>
<head>
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="style.css">
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
            <input type='number' name='kiedy' min='0.01' step='0.01' required>
            <input type='submit' value='wypłać'>
        </form>
        <form action='inwentaryzacja.php' method='get'>
            <input type='submit' value='inwentaryzacja'>
        </form>
        <form action='raport.php' method='get'>
            <input type='submit' value='raport'>
        </form>
        
    </fieldset> <br>
    <script>
        var kolor =1
        var wielkosc=1
        document.cookie = "kolor= 1"
        document.cookie = "wielkosc=1"
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
            document.cookie = "wielkosc= 1"
           
        }
        srednia.onclick=function(){
            document.body.style.fontSize="150%"
            document.cookie = "wielkosc= 2"
           
        }
        duza.onclick=function(){
            document.body.style.fontSize="200%"
            document.cookie = "wielkosc= 3"
        }

    </script>
    
</body>
</html>