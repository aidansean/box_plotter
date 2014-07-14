<?php
header("Content-type: image/svg+xml") ;

include('settings.php') ;

$average    = 273 ;
$sigma_low  = 10 ;
$sigma_high = 10 ;

$g['x_min'] =  1e50 ;
$g['x_max'] = -1e50 ;
$g['y_min'] = 0 ;
$g['y_max'] = (count($data)+2)*100 ;
for($i=0 ; $i<count($data) ; $i++){
	$box[0] = $data[$i] - sqrt($el1[$i]*$el1[$i] + $el2[$i]*$el2[$i] + $el3[$i]*$el3[$i]) ;
	$box[1] = $data[$i] - sqrt($el1[$i]*$el1[$i] + $el2[$i]*$el2[$i]) ;
	$box[2] = $data[$i] - $el1[$i] ;
	$box[3] = $data[$i] ;
	$box[4] = $data[$i] + $eh1[$i] ;
	$box[5] = $data[$i] + sqrt($eh1[$i]*$eh1[$i] + $eh2[$i]*$eh2[$i]) ;
	$box[6] = $data[$i] + sqrt($eh1[$i]*$eh1[$i] + $eh2[$i]*$eh2[$i] + $eh3[$i]*$eh3[$i]) ;
	$box['title'   ] = $title[$i] ;
	$box['notes'   ] = $notes[$i] ;
	$box['year'    ] = $year[$i] ;
	$box['citation'] = $citation[$i] ;
	$box['color'   ] = $c1[$i] ;
	$box['marker'  ] = $marker[$i] ;
	$box['el1'] = $el1[$i] ;
	$box['eh1'] = $eh1[$i] ;
	$box['el2'] = $el2[$i] ;
	$box['eh2'] = $eh2[$i] ;
	$box['el3'] = $el3[$i] ;
	$box['eh3'] = $eh3[$i] ;
	$box['show_row'] = $show_row[$i] ;
	$boxes[] = $box ;
	if($box[0]<$g['x_min']) $g['x_min'] = $box[0] ; 
	if($box[6]>$g['x_max']) $g['x_max'] = $box[6] ; 
}
$g['n_boxes'] = count($boxes) ;

$g['x_min'] = $g['x_min'] - 0.1*($g['x_max']-$g['x_min']) ;
$g['x_max'] = $g['x_max'] + 0.1*($g['x_max']-$g['x_min']) ;

echo '<svg width="' . 
	write_float($g['canvas_width']) . 
	'" height="' . write_float($g['canvas_height']) . 
	'" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/11009/xlink">' . PHP_EOL ;

// Plot area	
echo '<rect ' .
	'x="' . write_float(x($g['x_min'])) . '" ' . 
	'y="' . write_float(y($g['y_min'])) . '" ' . 
	'width="' . write_float(x($g['x_max'])-x($g['x_min'])) . '" ' . 
	'height="' . write_float(y($g['y_max'])-y($g['y_min'])) . '" ' . 
	'stroke="black" stroke-width="1" fill-opacity="1.0" fill="rgb(255,255,255)"/>' . PHP_EOL ;

draw_bands() ;
draw_boxes() ;
draw_ticks() ;
draw_plot_title() ;
draw_axis_title() ;

echo '</svg>' ;

function draw_boxes(){
	global $g , $boxes ;
	for($i=0 ; $i<count($boxes) ; $i++){
		$box = $boxes[$i] ;
		$y = yi($i+2) ;
		if($box['show_row']==1){
			echo '<rect ' . 
				'x="'      . write_float(x($g['x_min']))    . '" ' . 
				'y="'      . write_float($y-2*$g['radius']) . '" ' .
				'width="'  . write_float($g['plot_width'])  . '" ' .
				'height="' . write_float(4*$g['radius'])    . '" ' .
				'stroke-width="0" stroke="rgb(0,0,0)" fill="' . $box['color'] . '" fill-opacity="0.05"/>' . PHP_EOL ;
		}
		
		echo '<line ' . 
				'x1="' . write_float(x($box[2]))                . '" ' .
				'y1="' . write_float($y)                        . '" ' .
				'x2="' . write_float(x($box[3])-$g['radius']+1) . '" ' .
				'y2="' . write_float($y)                        . '" ' .
				' stroke="' . $box['color'] . '" stroke-width="' . 2 . '" />' . PHP_EOL ;
			echo '<line ' . 
				'x1="' . write_float(x($box[3])+$g['radius']-1) . '" ' .
				'y1="' . write_float($y)                        . '" ' .
				'x2="' . write_float(x($box[4]))                . '" ' .
				'y2="' . write_float($y)                        . '" ' .
				' stroke="' . $box['color'] . '" stroke-width="' . 2 . '" />' . PHP_EOL ;
			echo '<line ' . 
				'x1="' . write_float(x($box[2]))       . '" ' .
				'y1="' . write_float($y-$g['radius'])  . '" ' .
				'x2="' . write_float(x($box[2]))       . '" ' .
				'y2="' . write_float($y+$g['radius'])  . '" ' .
				' stroke="' . $box['color'] . '" stroke-width="' . 2 . '" />' . PHP_EOL ;
			echo '<line ' . 
				'x1="' . write_float(x($box[4]))      . '" ' .
				'y1="' . write_float($y-$g['radius']) . '" ' .
				'x2="' . write_float(x($box[4]))      . '" ' .
				'y2="' . write_float($y+$g['radius']) . '" ' .
				' stroke="' . $box['color'] . '" stroke-width="' . 2 . '" />' . PHP_EOL ;
		for($j=1 ; $j<3 ; $j++){
			if($box['el'.($j+1)]==0 OR $box['eh'.($j+1)]==0) break ;
			echo '<line ' . 
				'x1="' . write_float(x($box[2-$j])) . '" ' .
				'y1="' . write_float($y)            . '" ' .
				'x2="' . write_float(x($box[3-$j])) . '" ' .
				'y2="' . write_float($y)            . '" ' .
				' stroke="' . $box['color'] . '" stroke-width="' . 2 . '" />' . PHP_EOL ;
			echo '<line ' . 
				'x1="' . write_float(x($box[3+$j])) . '" ' .
				'y1="' . write_float($y)            . '" ' .
				'x2="' . write_float(x($box[4+$j])) . '" ' .
				'y2="' . write_float($y)            . '" ' .
				' stroke="' . $box['color'] . '" stroke-width="' . 2 . '" />' . PHP_EOL ;
			echo '<line ' . 
				'x1="' . write_float(x($box[2-$j]))   . '" ' .
				'y1="' . write_float($y-$g['radius']) . '" ' .
				'x2="' . write_float(x($box[2-$j]))   . '" ' .
				'y2="' . write_float($y+$g['radius']) . '" ' .
				' stroke="' . $box['color'] . '" stroke-width="' . 2 . '" />' . PHP_EOL ;
			echo '<line ' . 
				'x1="' . write_float(x($box[4+$j]))   . '" ' .
				'y1="' . write_float($y-$g['radius']) . '" ' .
				'x2="' . write_float(x($box[4+$j]))   . '" ' .
				'y2="' . write_float($y+$g['radius']) . '" ' .
				' stroke="' . $box['color'] . '" stroke-width="' . 2 . '" />' . PHP_EOL ;
		}	
		
		switch($box['marker']){
			case 1:
			echo '<circle ' . 
				'cx="' . write_float(x($box[3])) . '" ' .
				'cy="' . write_float($y)         . '" ' . 
				'r="'  . $g['radius']            . '" ' .
				'stroke-width="0" fill="' . $box['color'] . '" fill-opacity="1"/>' . PHP_EOL ;
			break ;
			
			case 2:
			echo '<circle ' . 
				'cx="' . write_float(x($box[3])) . '" ' .
				'cy="' . write_float($y)         . '" ' . 
				'r="'  . $g['radius']            . '" ' .
				'stroke-width="2" stroke="' . $box['color'] . '" fill-opacity="0" />' . PHP_EOL ;
			break ;
			
			case 3:
			echo '<rect ' . 
				'x="'      . write_float(x($box[3])-$g['radius']) . '" ' . 
				'y="'      . write_float($y-$g['radius'])         . '" ' .
				'width="'  . write_float(2*$g['radius'])          . '" ' .
				'height="' . write_float(2*$g['radius'])          . '" ' .
				'stroke-width="0" stroke="rgb(0,0,0)" fill="' . $box['color'] . '" fill-opacity="1"/>' . PHP_EOL ;
			break ;
			
			case 4:
			echo '<rect ' . 
				'x="'      . write_float(x($box[3])-$g['radius']) . '" ' . 
				'y="'      . write_float($y-$g['radius'])         . '" ' .
				'width="'  . write_float(2*$g['radius'])          . '" ' .
				'height="' . write_float(2*$g['radius'])          . '" ' .
				'stroke-width="2" stroke="' . $box['color'] . '" fill-opacity="0"/>' . PHP_EOL ;
			break ;
		}
		// Main label
		echo '<text ' .
			'x="' . write_float($g['margin_left']+$g['label_width']) . '" ' . 
			'y="' . write_float($y) . '"' . 
			' font-family="' . $g['font_family'] . '" ' . 
			'font-style="italic" ' . 
			'text-anchor="end" ' . 
			'dy="0" ' . 
			'font-size="16" ' . 
			'>' . 
			$box['title'] .
			'</text>' . PHP_EOL ;
		// Notes
		echo '<text ' .
			'x="' . write_float($g['margin_left']+$g['label_width']) . '" ' . 
			'y="' . write_float($y+10) . '"' . 
			' font-family="' . $g['font_family'] . '" ' . 
			'font-style="italic" ' . 
			'text-anchor="end" ' . 
			'dy="4" ' . 
			'font-size="12" ' . 
			'>' . 
			$box['notes'] .
			'</text>' . PHP_EOL ;
			
		// Value
		if(false){
			$x = $g['margin_left']+$g['label_width']+$g['plot_width']+$g['plot_padding_left']+$g['plot_padding_right'] ;
			$dx = 25 + 5*$g['precision'] ;
			echo '<text ' .
				'x="' . write_float($x) . '" ' . 
				'y="' . write_float($y) . '"' . 
				' font-family="' . $g['font_family'] . '" font-style="italic" text-anchor="left" dy="2" font-size="12" >' . 
				print_float($box[3]) . '</text>' . PHP_EOL ;
		
			for($j=1 ; $j<4 ; $j++){
				$el = 'el' . $j ;
				$eh = 'eh' . $j ;
				if($box[$el]==0 AND $box[$eh]==0) continue ;
				if($box[$el]==$box[$eh]){
					echo '<text ' .
						'x="' . write_float($x+$j*$dx) . '" ' . 
						'y="' . write_float($y) . '"' . 
						' font-family="' . $g['font_family'] . '" font-style="italic" text-anchor="left" dy="2" font-size="12" >' . 
						' &#0177; ' . print_float($box[$el]) . '</text>' . PHP_EOL ;
				}
				else{
					echo '<text ' .
						'x="' . write_float($x+$j*$dx) . '" ' . 
						'y="' . write_float($y-5)      . '"' . 
						' font-family="' . $g['font_family'] . '" font-style="italic" text-anchor="left" dy="2" font-size="10" >' . 
						' + ' . print_float($box[$eh]) . '</text>' . PHP_EOL ;
					echo '<text ' .
						'x="' . write_float($x+$j*$dx) . '" ' . 
						'y="' . write_float($y+5)      . '"' . 
						' font-family="' . $g['font_family'] . '" font-style="italic" text-anchor="left" dy="2" font-size="10" >' . 
						' - ' . print_float($box[$el]) . '</text>' . PHP_EOL ;
				}
			}
	  }
	  
		// Year and citation
		if($box['year']!='' || $box['citation']!=''){
			echo '<text ' .
				'x="' . write_float($g['margin_left'] + $g['label_width'] + $g['plot_padding_left'] + $g['plot_width'] + $g['plot_padding_right']) . '" ' . 
				'y="' . write_float($y)         . '"' . 
				' font-family="' . $g['font_family'] . '" text-anchor="start" dy="2" font-size="12" >' ;
			if($box['year']!='')     echo '(' . $box['year'] . ')' ;
			echo ' ' ;
			if($box['citation']!='') echo '[' . $box['citation'] . ']' ;
			echo '</text>' . PHP_EOL ;
		}
	}
	echo PHP_EOL ;
}

function draw_bands(){
	global $g , $bands ;
	if(count($bands)<1) return ;
	foreach($bands as $band){
		$y0 = yi(1.5+$band['start']) ;
		$y1 = yi(1.5+$band['end']) ;
		for($i=0 ; $i<$band['n_sigma'] ; $i++){
			$x0 = x($band['average']-($i+1)*$band['sigma_low']) ;
			$x1 = x($band['average']-$i*$band['sigma_low']) ;
			$opacity = $band['opacity']*($band['n_sigma']-$i)/$band['n_sigma'] ;
			echo '<rect ' .
				'x="' . write_float($x0) . '" ' . 
				'y="' . write_float($y0) . '" ' . 
				'width="' . write_float($x1-$x0) . '" ' . 
				'height="' . write_float($y1-$y0) . '" ' . 
				' stroke-width="0" fill-opacity="' . $opacity . '" fill="' . $band['color'] . '"/>' . PHP_EOL ;
			$x0 = x($band['average']+$i*$band['sigma_high']) ;
			$x1 = x($band['average']+($i+1)*$band['sigma_high']) ;
			echo '<rect ' .
				'x="' . write_float($x0) . '" ' . 
				'y="' . write_float($y0) . '" ' . 
				'width="' . write_float($x1-$x0) . '" ' . 
				'height="' . write_float($y1-$y0) . '" ' . 
				' stroke-width="0" fill-opacity="' . $opacity . '" fill="' . $band['color'] . '"/>' . PHP_EOL ;
		}
		echo '<line ' . 
			'x1="' . write_float(x($band['average'])) . '" ' .
			'y1="' . write_float($y0)      . '" ' .
			'x2="' . write_float(x($band['average'])) . '" ' .
			'y2="' . write_float($y1)      . '" ' .
			' stroke="' . $band['color'] . '" stroke-width="' . 2 . '" />' . PHP_EOL ;
	}
}

function draw_plot_title(){
	global $g , $plot_title ;
	echo '<text ' .
		'x="' . write_float(x(0.5*($g['x_min']+$g['x_max']))) . '" ' .
		'y="' . write_float(yi(1)) . '" ' .
		'text-anchor="middle" font-size="24" font-family="' . $g['font_family'] . '" >' .
		$plot_title .
		'</text>' . PHP_EOL ;
}

function draw_axis_title(){
	global $g , $axis_title ;
	echo '<text ' .
		'x="' . write_float(x(0.5*($g['x_min']+$g['x_max']))) . '" ' .
		'y="' . write_float(yi($g['n_boxes']+3)) . '" ' .
		'text-anchor="middle" font-size="24" font-family="' . $g['font_family'] . '" >' .
		$axis_title .
		'</text>' . PHP_EOL ;
}

function draw_ticks(){
	global $g ;
	$g['range'] = $g['x_max'] - $g['x_min'] ;
	$g['x_min_log']  = ($g['x_max']>0) ? floor(log10($g['x_max'])) - 1 : floor(log10(-$g['x_max'])) - 1 ;
	$g['x_min_log']  = ($g['x_min']>0) ? floor(log10($g['x_min'])) - 1 : floor(log10(-$g['x_min'])) - 1 ;
	$g['tick'] = max(pow(10,$g['x_max_log']),pow(10,$g['x_min_log'])) ;
	$g['axis_max'] = ($g['x_max']>0) ? floor($g['x_max']/$g['tick'])*$g['tick'] : -floor(-$g['x_max']/$g['tick'])*$g['tick'] ;
	$g['axis_min'] = ($g['x_min']>0) ? floor($g['x_min']/$g['tick'])*$g['tick'] : -floor(-$g['x_min']/$g['tick'])*$g['tick'] ;
	$g['number_of_ticks'] = floor($g['range']/$g['tick']) + 1 ;
	while($g['number_of_ticks']>10){
		$g['tick'] = $g['tick']*5 ;
		$g['number_of_ticks'] = floor($g['range']/$g['tick']) + 1 ;
	}
	while($g['number_of_ticks']<5){
		$g['tick'] = $g['tick']/2 ;
		$g['number_of_ticks'] = floor($g['range']/$g['tick']) + 1 ;
	}
	$g['tick_min'] = $g['tick']*floor($g['x_min']/$g['tick']) ;
	$g['tick_max'] = $g['tick']*floor($g['x_max']/$g['tick']) ;
	for($u=$g['tick_min'] ; $u<=$g['tick_max']+$g['tick'] ; $u+=$g['tick']){
		for($v=$u+0.2*$g['tick'] ; $v<$u+$g['tick'] ; $v+=0.2*$g['tick']){
			// Small ticks
			if($v<$g['x_min']) continue ;
			if($v>$g['x_max']) continue ;
			echo '<line ' . 
				'x1="' . write_float(x($v)) . '" ' .
				'y1="' . write_float(y(0)) . '" ' .
				'x2="' . write_float(x($v)) . '" ' .
				'y2="' . write_float(y(0)+5) . '" ' .
				'stroke="rgb(0,0,0)" stroke-width="1" />' . PHP_EOL ;
			echo '<line ' . 
				'x1="' . write_float(x($v)) . '" ' .
				'y1="' . write_float(yi($g['n_boxes']+2)) . '" ' .
				'x2="' . write_float(x($v)) . '" ' .
				'y2="' . write_float(yi($g['n_boxes']+2)-5) . '" ' .
				'stroke="rgb(0,0,0)" stroke-width="1" />' . PHP_EOL ;
		}
		// Big ticks
		if($u<$g['x_min']) continue ;
		if($u>$g['x_max']) continue ;
		echo '<line ' . 
			'x1="' . write_float(x($u)) . '" ' .
			'y1="' . write_float(y(0)) . '" ' .
			'x2="' . write_float(x($u)) . '" ' .
			'y2="' . write_float(y(0)+15) . '" ' .
			'stroke="rgb(0,0,0)" stroke-width="1" />' . PHP_EOL ;
		echo '<text ' .
			'x="' . write_float(x($u)) . '" ' .
			'y="' . write_float(yi($g['n_boxes']+2)+15) . '" ' .
			'text-anchor="middle" font-size="12" font-family="' . $g['font_family'] . '" >' .
			print_float($u) .
			'</text>' . PHP_EOL ;
		echo '<line ' . 
			'x1="' . write_float(x($u)) . '" ' .
			'y1="' . write_float(yi($g['n_boxes']+2)) . '" ' .
			'x2="' . write_float(x($u)) . '" ' .
			'y2="' . write_float(yi($g['n_boxes']+2)-15) . '" ' .
			'stroke="rgb(0,0,0)" stroke-width="1" />' . PHP_EOL ;
	}
}

function x($u){
	global $g ;
	$left = $g['margin_left'] + $g['label_width'] + $g['plot_padding_left'] ;
	return $left + $g['plot_width']*($u-$g['x_min'])/($g['x_max']-$g['x_min']) ;	
}

function y($v){
	global $g ;
	$down = $g['margin_top'] + $g['plot_padding_top'] ; 
	return $down + $g['plot_height']*($v-$g['y_min'])/($g['y_max']-$g['y_min']) ;	
}

function yi($i){
	global $g ;
	return $g['margin_top'] + $g['plot_padding_top'] + $g['plot_height']*($i)/($g['n_boxes']+2) ;	
}

function write_int($int)    { return sprintf("%d"  , $int   ) ; }
function write_float($float){ return sprintf("%.2f", $float ) ; } // Used for SVG elements
function print_float($float){ global $g ; return sprintf('%.' . $g['precision'] . 'f', $float ) ; } // Used for numbers the user can see

?>