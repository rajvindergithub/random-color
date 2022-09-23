<?php 

use \Colors\RandomColor;

include 'vendor/autoload.php';

// Returns a hex code for an attractive color
RandomColor::one(); 

// Returns one yellow or blue color
$mixColor = RandomColor::one(array(
    'hue' => array()
));

//echo $mixColor; 

//echo '<div style="background-color: '.$mixColor.'; height: 75px; width: 75px; "></div>';

if(isset($_POST['colorName'])){
    
    $color = $_POST['colorName']; 
    
          // Returns an array of ten green colors
        $randomColor = RandomColor::many(10, array(
           'hue' => $color
        ));

        $randomColorLum = RandomColor::many(10, array(
           'luminosity' => $color
        ));

        //echo '<div>Hello</div>'; 

        //print_r($randomColor);
        //echo '<br />';

        //print_r($randomColorLum);

        $arrayColor = array("hue"=>$randomColor, "luminosity"=> $randomColorLum);

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($arrayColor);

}

?>