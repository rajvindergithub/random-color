<?php 

use \Colors\RandomColor;

include 'vendor/autoload.php';

// Returns a hex code for an attractive color
RandomColor::one(); 

// Returns an array of ten green colors
$randomColor = RandomColor::many(10, array(
   'hue' => 'green'
));

echo '<div></div>'

print_r($randomColor);

?>