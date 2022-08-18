<?php 

use \Colors\RandomColor;

include 'vendor/autoload.php';

// Returns a hex code for an attractive color
RandomColor::one(); 

// Returns an array of ten green colors
$randomColor = RandomColor::many(10, array(
   'hue' => 'green'
));

$randomColorLum = RandomColor::many(10, array(
   'luminosity' => 'green'
));

//echo '<div>Hello</div>'; 

//print_r($randomColor);
//echo '<br />';

//print_r($randomColorLum);

$arrayColor = array("hue"=>$randomColor, "luminosity"=> $randomColorLum);

header('Content-Type: application/json; charset=utf-8');

echo json_encode($arrayColor);






?>