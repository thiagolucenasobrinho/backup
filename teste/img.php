<?php
sessao();
$imagem=$_GET['img'];
$ext=pathinfo($imagem, PATHINFO_EXTENSION);
switch ($ext) {
    case 'jpg':
        $image_source =imagecreatefromjpeg($imagem);
        break;
    case 'jpeg':
        $image_source =imagecreatefromjpeg($imagem);
        break;
    case 'png':
        $image_source =imagecreatefrompng($imagem);
        break;
    case 'gif':
        $image_source =imagecreatefromgif($imagem);
        break;
    
    default:
        exit;
        break;
}
function setTransparency($new_image,$image_source){
    $transparencyIndex = imagecolortransparent($image_source); 
    $transparencyColor = array('red' => 255, 'green' => 255, 'blue' => 255); 
    if ($transparencyIndex >= 0) { 
        $transparencyColor    = imagecolorsforindex($image_source, $transparencyIndex);    
    } 
    $transparencyIndex    = imagecolorallocate($new_image, $transparencyColor['red'], $transparencyColor['green'], $transparencyColor['blue']); 
    imagefill($new_image, 0, 0, $transparencyIndex); 
    imagecolortransparent($new_image, $transparencyIndex); 
}
list($width, $height, $type, $attr) = getimagesize($imagem);
$new_image = imagecreatetruecolor($width, $height); 
setTransparency($new_image,$image_source); 
imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $width, $height, $width, $height); 
imagefilter($new_image, IMG_FILTER_GRAYSCALE);
for ($y = 0; $y < $height; $y++) {
    for ($x = 0; $x < $width; $x++) {

        // Obter a cor do pixel da posicao [$x, $y]
        $cor1 = imagecolorat($new_image, $x, $y);
        $r1 = ($cor1 >> 16) & 0xFF;
        $g1 = ($cor1 >>  8) & 0xFF;
        $b1 = ($cor1 >>  0) & 0xFF;

        $igual=217;
        if($r1>=$igual && $g1>=$igual & $b1>=$igual){
        	$r2=255;
        	$g2=255;
        	$b2=255;
        }else{
        	// Criar cor complementar e modificar o pixel
        	/*$r2 = $r1;//0xFF - $r1;
        	$g2 = $g1;//0xFF - $g1;
        	$b2 = $b1;//0xFF - $b1;*/
        	$r2=0;
        	$g2=0;
        	$b2=0;
        }
        $cor2 = imagecolorallocate($new_image, $r2, $g2, $b2);

        // Modificar a cor do pixel da posicao [$x, $y]
        imagesetpixel($new_image, $x, $y, $cor2);
    }
}
header( "Content-type: image/png" );
imagepng($new_image);
imagedestroy($new_image);
exit;
