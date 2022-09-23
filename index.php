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
        .colorDivResult{ height: 75px; width: 75px; border-radius: 25%; background-color: #efefef;  }
        
        #hueColorResult{ display: flex; align-items: center; flex-wrap: wrap; }
        #luminosityColorResult{ display: flex; align-items: center; flex-wrap: wrap; }
        .copiedClass{ display: none; }
    </style>
    
</head>

<body>
	
    <div><input type="text" placeholder="Enter" id="colorInputField" value="red"></div>
    
    <div>
        <button id="GenerateColorShades" onclick="generateColorShades();">Generate Now</button>
    </div>
    
    <section id="colorResult">
        <div id="hueColorResult">
          <!--  <div class="colorResultDivMain">
                <div class="colorDivResult" style="background-color: #ff0000;"></div>
                <div class="colorDivTextarea">
                    <textarea>#FF0000</textarea>
                </div>
                <div class="colorCopyButton">
                    <button id="copyColorRandom" class="copyColorRandom">Copy color code</button>
                </div>
            </div>-->
        </div>
      
        <div id="luminosityColorResult">
            <!--<div class="colorResultDivMain">
                    <div class="colorDivResult" style="background-color: #ff0000;"></div>
                    <div class="colorDivTextarea">
                        <textarea>#FF0000</textarea>
                    </div>
                    <div class="colorCopyButton">
                        <button id="copyColorRandom" class="copyColorRandom">Copy color code</button>
                    </div>
                </div>-->
        </div>
    </section>
    
    
</body>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        
        
      
    
        function generateColorShades(){
            
            var colorName = jQuery('#colorInputField').val();
            
            var data = {colorName: colorName};
            
             var j = 0; 
             var u = 0; 
            
            $.ajax({
                url : 'submit.php',
                type: 'POST',
                data : data,
                success: function(response){
                    
                    var hueColors = response.hue;
                    var luminosityColors = response.luminosity;
                    
                    console.log(hueColors);
                    
                    var hue = '';
                    var luminosity = '';
                    
                   
                    
                    for(var i = 0; i < hueColors.length; i++){
                        j++;
                        u++;
                        
                        hue += ` <div class="colorResultDivMain">
                                    <div class="colorDivResult" style="background-color: ${hueColors[i]};"></div>
                                    <div class="colorDivTextarea">
                                        <textarea>${hueColors[i]}</textarea>
                                    </div>
                                    <div class="colorCopyButton" id="colorCopyButtonTwo">
                                        <button id="copyColorRandom${j}" class="copyColorRandom" onclick="copyColorCode('${hueColors[i]}'); changeButtonText('copyColorRandom${u}');" >Copy color code</button>
                                        <span class="copiedClass">Copied</span>
                                    </div>
                                </div>`;
                        
                    }
                    
                    if(j === 0){
                       
                        j = 11; 
                        u = 11;
                        
                       }
                    
                    for(var k = 0; k < luminosityColors.length; k++){
                        
                        j++;
                        u++;
                        
                        luminosity += ` <div class="colorResultDivMain">
                                    <div class="colorDivResult" style="background-color: ${luminosityColors[k]};"></div>
                                    <div class="colorDivTextarea">
                                        <textarea>${luminosityColors[k]}</textarea>
                                    </div>
                                    <div class="colorCopyButton" id="colorCopyButton">
                                        <button id="copyColorRandom${j}" class="copyColorRandom" onclick="copyColorCode('${luminosityColors[k]}'); changeButtonText('copyColorRandom${u}');">Copy color code</button>
                                        <span class="copiedClass">Copied</span>
                                    </div>
                                </div>`;
                    }
                    
                    
                    
                    jQuery('#hueColorResult').html(hue);
                    jQuery('#luminosityColorResult').html(luminosity);
                    
                }
            });
            
        }
    
        function copyColorCode(code){
          //  alert(code);
            
            const textarea = document.createElement('textarea');
            document.body.appendChild(textarea);
            textarea.value = code
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);

            
        }
        

        
        function changeButtonText(getID){
          //  alert(getID);
            
            jQuery('#'+getID).html('Color Copied');
            
            setTimeout(function(){
                 jQuery('#'+getID).html('Copy color code');
            }, 3000);
            
        }
        
        
    </script>
    
</html>