<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>Example Title</title>
	<meta name="author" content="Your Name">
	<meta name="description" content="Example description">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="">
	<link rel="icon" type="image/x-icon" href=""/>
    
    <style type="text/css">
        .colorDivResult{ height: 75px; width: 75px; border-radius: 50%; background-color: #efefef;  }
    </style>
    
</head>

<body>
	
    <div><input type="text" placeholder="Enter" id="colorInputField"></div>
    
    <div>
        <button id="GenerateColorShades" onclick="generateColorShades();">Generate Now</button>
    </div>
    
    <section id="colorResult">
        <div id="hueColorResult">
            <div class="colorResultDivMain">
                <div class="colorDivResult"></div>
                <div class="colorDivTextarea">
                    <textarea></textarea>
                </div>
            </div>
        </div>
        <div id="luminosityColorResult"></div>
    </section>
    
    
</body>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
    
        function generateColorShades(){
            
            var colorName = jQuery('#colorInputField').val();
            
            var data = {colorName: colorName};
            
            $.ajax({
                url : 'submit.php',
                type: 'POST',
                data : data,
                success: function(response){
                    
                    var hueColors = response.hue;
                    var luminosityColors = response.luminosity;
                    
                    console.log(hueColors);
                    
                    var hue = '';
                    
                    for(var i = 0; i < hueColors.length; i++){
                        hue += `<div class="colorDivResult" style="background-color: ${hueColors[i]}">${hueColors[i]}</div>`;
                    }
                    
                    jQuery('#hueColorResult').html(hue);
                    
                }
            });
            
        }
    
    </script>
    
</html>