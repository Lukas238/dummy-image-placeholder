<?php
/*!
 * Dummy Image Placeholder
 * 
 * 
 * @author Lucas Dasso
 * @version 1.0.0
 * Copyright 2015. ISC licensed.
 */

$debug= false;

if(isset($_GET['data'])){
	
	//Preparo los datos
	$args_string = $_GET['data'];
	$args = array();
	
	$image_text = explode('&t=', $args_string);
	$image_data = explode('/', $image_text[0]);
	$image_size = explode('x', $image_data[0]);
	
	//WIDTH
	if(count($image_size) >= 1){
		$args['width'] = $image_size[0];
	}
	
	//HEIGHT
	if(count($image_size) >= 2){
		$args['height'] = $image_size[1];
	}
	
	//TEXT
	if( count($image_text) ==2 ){
		$args['text'] = $image_text[1];
		//$args['text'] = str_replace("__", "\n", $image_text[1]);
	}
	
	//BACKGROUND COLOR
	if(count($image_data) >= 2){
		$args['bg_color'] = $image_data[1];
	}
	
	//TEXT COLOR
	if(count($image_data) >= 3){
		$args['text_color'] = $image_data[2];
	}
	
	
	create_image( $args );
	exit;
}

//Function that has all the magic
function create_image( $args = false){
	global $debug;
	
	$fontfile = './fonts/BebasNeue_Regular.ttf';
	$fontsize = 1000; //Max font size
	$padding = .3;
	$line_spacer = .3;

	
	if( !$args ){
		return false;
	}
	

	$defaults = array(
		'width' 		=>	100,
		'height' 		=>	null,
		'bg_color' 		=>	'cccccc',
		'text_color' 	=>	'888888',
		'text' 			=>	null 
	);

	//Merge the new arguments with the defaults one
	$options = array_merge($defaults, $args);
	
	if( $options['height'] == null ){
		$options['height'] = $options['width'];
	}
	
	if( $options['text'] == null ){
		$options['text'] = $options['width']. " x " .$options['height'];
	}
	
	extract($options);


    //Create the image resource 
    $image = ImageCreate($width, $height);  

    
		
	
	switch( strlen($bg_color) ){
		case 6:
			$bg_color_r = base_convert(substr($bg_color, 0, 2), 16, 10);
			$bg_color_g = base_convert(substr($bg_color, 2, 2), 16, 10);
			$bg_color_b = base_convert(substr($bg_color, 4, 2), 16, 10);
			break;
		
		default:
			$bg_color_r = base_convert(substr($defaults['bg_color'], 0, 2), 16, 10);
			$bg_color_g = base_convert(substr($defaults['bg_color'], 2, 2), 16, 10);
			$bg_color_b = base_convert(substr($defaults['bg_color'], 4, 2), 16, 10);
	}
	
	switch( strlen($text_color) ){
		case 6:
			$text_color_r = base_convert(substr($text_color, 0, 2), 16, 10);
			$text_color_g = base_convert(substr($text_color, 2, 2), 16, 10);
			$text_color_b = base_convert(substr($text_color, 4, 2), 16, 10);
			break;
		
		default:
			$text_color_r = base_convert(substr($defaults['text_color'], 0, 2), 16, 10);
			$text_color_g = base_convert(substr($defaults['text_color'], 2, 2), 16, 10);
			$text_color_b = base_convert(substr($defaults['text_color'], 4, 2), 16, 10);
	}

	//We are making two colors one for BackGround and one for ForGround
	$color_background = ImageColorAllocate($image, $bg_color_r, $bg_color_g, $bg_color_b);
	$color_text = ImageColorAllocate($image, $text_color_r, $text_color_g, $text_color_b );

										   
    //Fill the background color 
    ImageFill($image, 0, 0, $color_background); 
    
	
	//Calculating (Actually astimationg :) ) font size
	$fontsize = ($width>$height)? ($height / 4) : ($width / 4);
	
	
	//Calculo el tamaño de la caja de texto y achico el font hasta que entre
	$low = 1;
	$high = $fontsize;
	$inner_width = $width - $width * $padding;
	$inner_height = $height - $height * $padding;
	
	debug("Height: " .$height);
	
	$words = explode("__", $options['text']);
	$wnum = count($words);
	while ( $low <= $high ){
		$mid = intval( ($low + $high) / 2 );
		
		// Calculo el alto de multiples lineas de texto	
		$text_height = 0;
		$text_width = 0;
		
		for($i=0; $i<$wnum; $i++){
			$dimensions = imagettfbbox($mid, 0, $fontfile, $words[$i]);
			
			$text_height += abs($dimensions[5] - $dimensions[1]);//Sumo el alto de las lineas de texto
			
			//Y le agrego el espacio entre renglones
			if( $i>0 ){
				$text_height += $line_spacer * $mid;
			}
			
			if( $text_width < abs($dimensions[2] - $dimensions[0])){//Guardo el ancho de texto más largo 
				$text_width = abs($dimensions[2] - $dimensions[0]);
			}
		}		
		
		if( $text_width <= $inner_width && $text_height <= $inner_height){
			$low = $mid + 1;
		}else{
			$high = $mid - 1;
		}	
	}
	
	$fontsize = $low;
	
	debug("Text Height: " . $text_height);
	debug("Font Size: " . $fontsize);
	debug("Line Spacer: " . ($line_spacer * $mid));
	
	//Lo centro
	$y = ($height - $text_height) /2;
	
	debug("Top: ". $y);
	
	imagettfmultilinetext($image, $fontsize, 0, $width, $y, $color_text, $fontfile, $options['text'], $line_spacer * $fontsize);
	
 
    //Tell the browser what kind of file is come in 
    if(!$debug){
		header("Content-Type: image/png");

		//Output the newly created image in png format 
		imagepng($image);
	   
		//Free up resources
		ImageDestroy($image);
	}
	
}

function imagettfmultilinetext($image, $size, $angle, $width, $y, $color, $fontfile,  $text, $spacing=1){
	
	$lines=explode('__',$text);
		
	//First line
	
	$dimensions = imagettfbbox($size,  $angle, $fontfile, $lines[0]);
	$line_height = abs($dimensions[5] - $dimensions[1]);
	$newY = $y + $line_height;
	$line_width = abs($dimensions[2] - $dimensions[0]);
	$newX = $width/2 - $line_width/2;	
	imagettftext($image, $size, $angle, $newX, $newY, $color, $fontfile,  $lines[0]);
	
	for($i=1; $i< count($lines); $i++){		
		
		$dimensions = imagettfbbox($size,  $angle, $fontfile, $lines[$i]);
		
		$line_height = abs($dimensions[5] - $dimensions[1]);
		debug('$line_height: '. $line_height);
		
		//print_r($dimensions);
		
		$newY += $line_height + $spacing;
		
		debug('$newY: '. $newY);
		
		$line_width = abs($dimensions[2] - $dimensions[0]);
		$newX = $width/2 - $line_width/2;
		
		imagettftext($image, $size, $angle, $newX, $newY, $color, $fontfile,  $lines[$i]);
	}
	return null;
}

function  debug( $string ){
	global $debug;
	if($debug){
		echo $string . "<br />";
	}
}
?>