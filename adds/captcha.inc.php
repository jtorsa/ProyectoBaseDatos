<?php
    session_start();
    //Fuentes windows
    $fonts = array('timesi','times','arial','arialbd','arialbi','ariali','consola','consolai','consolab','consolaz','cour','sylfaen','cambriab','mangalb','segoeui','seguisym','pala','nyala','msyi','trebuc','phagspa');
    $fontRoute = 'c:\windows\fonts\\';
    //ruta principal de las fuentes
    $img_width = 300;
    $img_height = 120;

    $img = imagecreatetruecolor($img_width, $img_height);
    $black = imagecolorallocate($img, 0, 0, 0);
    $white = imagecolorallocate($img, 255, 255, 255);
    $red   = imagecolorallocate($img, 255, 0, 0);
    $green = imagecolorallocate($img, 0, 255, 0);
    $blue  = imagecolorallocate($img, 0, 200, 250);
    $orange = imagecolorallocate($img, 255, 200, 0);
    $brown = imagecolorallocate($img, 220, 110, 0);
    $imagen = imagecreatetruecolor($img_width, $img_height);
    $azul = imagecolorallocate($imagen, 255, 255, 255);
    $blanco = imagecolorallocate($imagen, 0, 0, 64);
    $red = imagecolorallocate($imagen, 64, 0, 0);
    imagefill($img, 0, 0, $white);

    function n1(){	return rand( 33,110);}
    function n2(){	return rand( 10,270);}
    function n3(){	return rand( 200,280);}
    function n4(){	return rand( 33,110);}
    function n5(){	return rand( 250,280);}
    //imágenes aleatorias
    for($i=0;$i<=4;$i++){
           imageline($img, n1(), n1(), n3(), n1(), $blanco);
           imagesetthickness($img, rand(1,5));
       //$counter++;
        }

    $randomWord =array();
    $long=rand(5,8);
    $inicio= -60;
    for($i=0;$i<=$long;$i++){
        $font = $fontRoute.$fonts[rand(0,sizeof($fonts)-1)].'.ttf';
        $randomWord[] = $letter = randomLetter();
        imagettftext($img, 22, rand(-45,45), $img_width/2+$inicio, $img_height/2+10, $black, $font, $letter);
        $font = $fontRoute.$fonts[rand(0,sizeof($fonts)-1)].'.ttf';
        $inicio=$inicio+20;
    }
    $_SESSION['palabra'] = implode($randomWord);


    //Funcion que devuelve una letra aleatoria de la cadena que le pasemos
    function randomLetter(){		
       $texto ="ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789";
       return $texto[rand(0,strlen($texto)-1)];
    }

    header("Content-type: image/png");
    imagepng($img);
?>