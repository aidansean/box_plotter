<?php

$data[] = 2494.8 ; $el1[] = 4.1 ; $eh1[] = 4.1 ; $el2[] = 0    ; $eh2[] = 0    ; $el3[] = 0 ; $eh3[] = 0 ; // 00
$data[] = 2487.6 ; $el1[] = 4.1 ; $eh1[] = 4.1 ; $el2[] = 0    ; $eh2[] = 0    ; $el3[] = 0 ; $eh3[] = 0 ; // 01
$data[] = 2502.4 ; $el1[] = 4.2 ; $eh1[] = 4.2 ; $el2[] = 0    ; $eh2[] = 0    ; $el3[] = 0 ; $eh3[] = 0 ; // 02
$data[] = 2495.1 ; $el1[] = 4.3 ; $eh1[] = 4.3 ; $el2[] = 0    ; $eh2[] = 0    ; $el3[] = 0 ; $eh3[] = 0 ; // 03
$data[] = 2494.3 ; $el1[] = 4.1 ; $eh1[] = 4.1 ; $el2[] = 0    ; $eh2[] = 0    ; $el3[] = 0 ; $eh3[] = 0 ; // 04
$data[] = 2502.5 ; $el1[] = 4.1 ; $eh1[] = 4.1 ; $el2[] = 0    ; $eh2[] = 0    ; $el3[] = 0 ; $eh3[] = 0 ; // 05

$c1[] = 'rgb(000,000,000)' ;	$title[] = 'OPAL' 	;	$notes[] = 'Lattice' ; $marker[] = 1 ; $show_row[] = 1 ; // 00
$c1[] = 'rgb(000,000,000)' ;	$title[] = 'DELPHI' ;	$notes[] = 'Lattice' ; $marker[] = 1 ; $show_row[] = 1 ; // 01
$c1[] = 'rgb(000,000,000)' ;	$title[] = 'L3'	 	  ;	$notes[] = 'QL'		 	 ; $marker[] = 1 ; $show_row[] = 1 ; // 02
$c1[] = 'rgb(000,000,000)' ;	$title[] = 'ALEPH' 	;	$notes[] = 'QL' 		 ; $marker[] = 1 ; $show_row[] = 1 ; // 03
$c1[] = 'rgb(000,000,000)' ;	$title[] = 'OPAL' 	;	$notes[] = 'QL' 		 ; $marker[] = 1 ; $show_row[] = 1 ; // 04
$c1[] = 'rgb(000,000,000)' ;	$title[] = 'L3'		  ;	$notes[] = 'QL' 		 ; $marker[] = 1 ; $show_row[] = 1 ; // 05

// World average bands
$band['average']    = 2495.2 ;
$band['sigma_low']  = 2.3  ;
$band['sigma_high'] = 2.3  ;
$band['n_sigma']    = 2   ;
$band['opacity']    = 0.4 ;
$band['color']      = 'rgb(000,255,000)' ;
$band['start']      = 0   ;
$band['end']        = 4   ;
$bands[] = $band ;

$plot_title = 'Z width measurements' ;
$axis_title = '<tspan>&#915;</tspan><tspan dy="8" font-size="18">Z</tspan> <tspan dy="-8">(KeV)</tspan>' ;

$precision = 1 ;
$width = 600 ;

include('box_plotter.php') ;

?>