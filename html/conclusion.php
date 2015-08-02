<?php

// Data points and errors
$data[] = 273 ; $el1[] = 16 ; $eh1[] = 16 ; $el2[] =  8 ; $eh2[] =  8 ; $el3[] =  0 ; $eh3[] =  0 ; // 00
$data[] = 264 ; $el1[] = 15 ; $eh1[] = 15 ; $el2[] =  7 ; $eh2[] =  7 ; $el3[] =  0 ; $eh3[] =  0 ; // 01
$data[] = 310 ; $el1[] = 25 ; $eh1[] = 25 ; $el2[] =  8 ; $eh2[] =  8 ; $el3[] =  0 ; $eh3[] =  0 ; // 02
//$data[] = 274 ; $el1[] = 10 ; $eh1[] = 10 ; $el2[] =  5 ; $eh2[] =  5 ; $el3[] =  0 ; $eh3[] =  0 ; // 03
$data[] = 275 ; $el1[] = 16 ; $eh1[] = 16 ; $el2[] = 12 ; $eh2[] = 12 ; $el3[] =  0 ; $eh3[] =  0 ; // 04
$data[] = 273 ; $el1[] = 10 ; $eh1[] = 10 ; $el2[] =  0 ; $eh2[] =  0 ; $el3[] =  0 ; $eh3[] =  0 ; // 05
$data[] = 283 ; $el1[] = 17 ; $eh1[] = 17 ; $el2[] =  7 ; $eh2[] =  7 ; $el3[] = 14 ; $eh3[] = 14 ; // 06
//$data[] = 273 ; $el1[] = 19 ; $eh1[] = 19 ; $el2[] = 27 ; $eh2[] = 27 ; $el3[] = 33 ; $eh3[] = 33 ; // 07
$data[] = 282 ; $el1[] = 19 ; $eh1[] = 19 ; $el2[] = 40 ; $eh2[] = 40 ; $el3[] =  0 ; $eh3[] =  0 ; // 08
$data[] = 283 ; $el1[] = 44 ; $eh1[] = 44 ; $el2[] = 41 ; $eh2[] = 41 ; $el3[] =  0 ; $eh3[] =  0 ; // 09
$data[] = 312 ; $el1[] = 43 ; $eh1[] = 43 ; $el2[] = 12 ; $eh2[] = 12 ; $el3[] = 39 ; $eh3[] = 39 ; // 10
$data[] = 299 ; $el1[] = 57 ; $eh1[] = 57 ; $el2[] = 32 ; $eh2[] = 32 ; $el3[] = 37 ; $eh3[] = 37 ; // 11




$data[] = 267.7 ; $el1[] =  8.3 ; $eh1[] =  8.3 ; $el2[] =  7.2 ; $eh2[] =  7.2 ; $el3[] = 1.9 ; $eh3[] = 1.9 ; // 12
$data[] = 254.4 ; $el1[] = 12.1 ; $eh1[] = 12.1 ; $el2[] = 13.5 ; $eh2[] = 13.5 ; $el3[] = 1.8 ; $eh3[] = 1.8 ; // 13
$data[] = 240.8 ; $el1[] =  8.5 ; $eh1[] =  8.5 ; $el2[] = 12.5 ; $eh2[] = 12.5 ; $el3[] = 1.7 ; $eh3[] = 1.7 ; // 14
$data[] = 246.7 ; $el1[] =  8.3 ; $eh1[] =  8.3 ; $el2[] = 12.2 ; $eh2[] = 12.2 ; $el3[] = 1.7 ; $eh3[] = 1.7 ; // 15
$data[] = 252.2 ; $el1[] =  5.7 ; $eh1[] =  5.7 ; $el2[] =  7.0 ; $eh2[] =  7.0 ; $el3[] = 1.0 ; $eh3[] = 1.0 ; // 16

// Styles

//Define the symbols
$wrapper_start = '' ;
$wrapper_end = '' ;
$sub_start = '<tspan font-size="6" dy="4">' ; //$sub_start = '<tspan baseline-shift="sub">' ;
$sub_end = '</tspan><tspan font-size="10" dy="-4" fill-opacity="0">;</tspan>' ;
$sup_start = '<tspan baseline-shift="super">' ;
$sup_end = '</tspan>' ;

$e   = 'e'        ;
$mu  = '&#x03BC;' ;
$tau = '&#x03C4;' ;
$nu  = '&#x03BD;' ;
$pi  = '&#x03C0;' ;
$to  = '&#x2192;' ;
$Ds  = 'D<tspan font-size="6" dy="4">s</tspan><tspan font-size="10" dy="-4" fill-opacity="0">;</tspan>' ;

$c1[] = 'rgb(000,000,000)' ; $marker[] = 1 ; $show_row[] = 1 ; // 00
$title[] = 'CLEO-c' ;
$notes[] = $wrapper_start . $Ds . $to . $tau . $nu . $sub_start . $tau . $sub_end . ' , ' . $tau . $to . 'e' . $nu . $sub_start . $tau . $sub_end . $nu . $sub_start . 'e' . $sub_end . $wrapper_end ;
$year[] = '2008' ;
$citation[] = 'XXX' ;

$c1[] = 'rgb(000,000,000)' ; $marker[] = 1 ; $show_row[] = 1 ; // 01
$title[] = 'CLEO-c' ;
$notes[] = $wrapper_start . $Ds . $to . $mu . $nu . $sub_start . $mu . $sub_end . $wrapper_end ;
$year[] = '2007' ;
$citation[] = 'XXX' ;

$c1[] = 'rgb(000,000,000)' ; $marker[] = 1 ; $show_row[] = 1 ; // 02
$title[] = 'CLEO-c' ;
$notes[] = $wrapper_start . $Ds . $to . $tau . $nu . $sub_start . $tau . $sub_end . ' , ' . $tau . $to . $pi . $nu . $sub_start . $tau . $sub_end . $wrapper_end ;
$year[] = '2007' ;
$citation[] = 'XXX' ;

//$c1[] = 'rgb(000,000,000)' ; $marker[] = 1 ; $show_row[] = 1 ; // 03
//$title[] = 'CLEO-c' ;
//$notes[] = 'Combined' ;
//$year[] = '' ;
//$citation[] = 'XXX' ;

$c1[] = 'rgb(000,000,000)' ; $marker[] = 1 ; $show_row[] = 1 ; // 04
$title[] = 'Belle' ;
$notes[] = $wrapper_start . $Ds . $to . $mu . $nu . $sub_start . $mu . $sub_end . $wrapper_end ;
$year[] = '2007' ;
$citation[] = 'XXX' ;

$c1[] = 'rgb(200,000,000)' ; $marker[] = 2 ; $show_row[] = 1 ; // 05
$title[] = 'PDG world average' ; // 'CLEO and Belle combined' ;
$notes[] = 'With radiative correction' ;
$year[] = '2008' ;
$citation[] = 'XXX' ;

$c1[] = 'rgb(000,100,000)' ; $marker[] = 4 ; $show_row[] = 1 ; // 06
$title[] = 'BaBar' ;
$notes[] = $wrapper_start . $Ds . $to . $mu . $nu . $sub_start . $mu . $sub_end . $wrapper_end ;
$year[] = '2007' ;
$citation[] = 'XXX' ;


//$c1[] = 'rgb(000,100,000)' ; $marker[] = 3 ; $show_row[] = 1 ; // 07
//$title[] = 'CLEO' ;
//$notes[] = $wrapper_start . $Ds . $to . $mu . $nu . $sub_start . $mu . $sub_end . $wrapper_end ;
//$year[] = '1998' ;
//$citation[] = 'XXX' ;

$c1[] = 'rgb(000,100,000)' ; $marker[] = 3 ; $show_row[] = 1 ; // 08
$title[] = 'ALEPH' ;
$notes[] = $wrapper_start . $Ds . $to . $mu . $nu . $sub_start . $mu . $sub_end . $wrapper_end ;
$year[] = '2002' ;
$citation[] = 'XXX' ;

$c1[] = 'rgb(000,100,000)' ; $marker[] = 3 ; $show_row[] = 1 ; // 09
$title[] = 'OPAL' ; 
$notes[] = $wrapper_start . $Ds . $to . $tau . $nu . $sub_start . $tau . $sub_end . $wrapper_end ;
$year[] = '2001' ;
$citation[] = 'XXX' ;

$c1[] = 'rgb(000,100,000)' ; $marker[] = 3 ; $show_row[] = 1 ; // 10
$title[] = 'BEATRICE' ;
$notes[] = $wrapper_start . $Ds . $to . $mu . $nu . $sub_start . $mu . $sub_end . $wrapper_end ;
$year[] = '2000' ;
$citation[] = 'XXX' ;

$c1[] = 'rgb(000,100,000)' ; $marker[] = 3 ; $show_row[] = 1 ; // 11
$title[] = 'L3' ;
$notes[] = $wrapper_start . $Ds . $to . $tau . $nu . $sub_start . $tau . $sub_end . $wrapper_end ;
$year[] = '1997' ;
$citation[] = 'XXX' ;

// These results

$c1[] = 'rgb(000,000,100)' ; $marker[] = 3 ; $show_row[] = 1 ; // 11
$title[] = 'This analysis' ;
$notes[] = $wrapper_start . $Ds . $to . $mu . $nu . $sub_start . $mu . $sub_end . $wrapper_end ;
$year[] = '2010' ;
$citation[] = '' ;

$c1[] = 'rgb(000,000,100)' ; $marker[] = 3 ; $show_row[] = 1 ; // 11
$title[] = 'This analysis' ;
$notes[] = $wrapper_start . $Ds . $to . $tau . $nu . $sub_start . $tau . $sub_end . ';' . $tau  . $to . $e . $nu . $sub_start . $e . $sub_end . $nu . $sub_start . $tau . $sub_end . $wrapper_end ;
$year[] = '2010' ;
$citation[] = '' ;

$c1[] = 'rgb(000,000,100)' ; $marker[] = 3 ; $show_row[] = 1 ; // 11
$title[] = 'This analysis' ;
$notes[] = $wrapper_start . $Ds . $to . $tau . $nu . $sub_start . $tau . $sub_end . ';' . $tau  . $to . $mu . $nu . $sub_start . $mu . $sub_end . $nu . $sub_start . $tau . $sub_end . $wrapper_end ;
$year[] = '2010' ;
$citation[] = '' ;

$c1[] = 'rgb(000,000,100)' ; $marker[] = 3 ; $show_row[] = 1 ; // 11
$title[] = 'This analysis' ;
$notes[] = $wrapper_start . $Ds . $to . $tau . $nu . $sub_start . $tau . $sub_end . ' combined' . $wrapper_end ;
$year[] = '2010' ;
$citation[] = '' ;

$c1[] = 'rgb(000,000,100)' ; $marker[] = 3 ; $show_row[] = 1 ; // 11
$title[] = 'This analysis' ;
$notes[] = $wrapper_start . 'Combined' . $wrapper_end ;
$year[] = '2010' ;
$citation[] = '' ;

// World average bands
$band['average']    = 273 ;
$band['sigma_low']  = 10  ;
$band['sigma_high'] = 10  ;
$band['n_sigma']    = 2   ;
$band['opacity']    = 0.4 ;
$band['color']      = 'rgb(255,0,0)' ;
$band['start']      = 0   ;
$band['end']        = 5   ;
$bands[] = $band ;

// These results band
$band['average']    = 252.2 ;
$band['sigma_low']  = sqrt(5.7*5.7+7.0*7.0+1.0*1.0)  ;
$band['sigma_high'] = sqrt(5.7*5.7+7.0*7.0+1.0*1.0)  ;
$band['n_sigma']    = 2   ;
$band['opacity']    = 0.4 ;
$band['color']      = 'rgb(50,50,255)' ;
$band['start']      = 10  ;
$band['end']        = 15  ;
$bands[] = $band ;

//$data[] = 252.2 ; $el1[] =  5.7 ; $eh1[] =  5.7 ; $el2[] =  7.0 ; $eh2[] =  7.0 ; $el3[] = 1.0 ; $eh3[] = 1.0 ; // 16

// World average bands
//$band['average']    = 241 ;
//$band['sigma_low']  = 3  ;
//$band['sigma_high'] = 3  ;
//$band['n_sigma']    = 2   ;
//$band['opacity']    = 0.5 ;
//$band['color']      = 'rgb(0,0,255)' ;
//$band['start']      = 0   ;
//$band['end']        = count($data)   ;
//$bands[] = $band ;

$plot_title = 'Experimental results (2008)' ;
$axis_title = '<tspan>f</tspan><tspan dy="8" font-size="18" font-style="italic">D</tspan><tspan dy="6" font-size="16" font-style="italic">s</tspan> <tspan dy="-14">(MeV)</tspan>' ;
$precision = 0 ;
$label_width_fraction = 0.2 ;
$value_width_fraction = 0.3 ;

include('box_plotter.php') ;

?>