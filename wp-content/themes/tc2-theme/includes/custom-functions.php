<?php
// Check if color is light
function is_quesks_light( $hex ) {
	
    $hex = str_replace('#', '', $hex);

    //break up the color in its RGB components
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    //do simple weighted avarage
    if($r + $g + $b > 250){ //bright color
        $return = true;
    }else{ //dark color
        $return = false;
    }
    
    return $return;

}


