<?php
$n = $_GET['n'] ;
if($n<1) exit() ;
$n_bands = $_GET['n_bands'] ;
$plot_title = $_GET['title']         ;
$axis_title = $_GET['axis']          ;
$precision  = $_GET['precision']     ;
$width      = $_GET['canvas_width']  ;

$data     = array() ;
$el1      = array() ;
$eh1      = array() ;
$el2      = array() ;
$eh2      = array() ;
$el3      = array() ;
$eh3      = array() ;
$c1       = array() ;
$title    = array() ;
$notes    = array() ;
$year     = array() ;
$citation = array() ;
$marker   = array() ;
$show_row = array() ;

for($i=1 ; $i<$n+1 ; $i++){
  $title[$i-1]    = $_GET['data_'.$i.'_title'] ;
  $notes[$i-1]    = $_GET['data_'.$i.'_notes'] ;
  $year[$i-1]     = $_GET['data_'.$i.'_year'] ;
  $citation[$i-1] = $_GET['data_'.$i.'_citation'] ;
  $data[$i-1]     = $_GET['data_'.$i.'_central_value'] ;
  $el1[$i-1]      = $_GET['data_'.$i.'_el1'] ;
  $eh1[$i-1]      = $_GET['data_'.$i.'_eh1'] ;
  $el2[$i-1]      = $_GET['data_'.$i.'_el2'] ;
  $eh2[$i-1]      = $_GET['data_'.$i.'_eh2'] ;
  $el3[$i-1]      = $_GET['data_'.$i.'_el3'] ;
  $eh3[$i-1]      = $_GET['data_'.$i.'_eh3'] ;
  $c1[$i-1]       = $_GET['data_'.$i.'_color'] ;
  $marker[$i-1]   = $_GET['data_'.$i.'_marker_style'] ;
  $show_row[$i-1] = 1 ;
}

$band_average    = array() ;
$band_sigma_low  = array() ;
$band_sigma_high = array() ;
$band_nSigma     = array() ;
$band_opacity    = array() ;
$band_color      = array() ;
$band_start      = array() ;
$band_end        = array() ;

$bands = array() ;
for($i=1 ; $i<$n_bands+1 ; $i++){
  $band = array() ;
  $band['average']    = $_GET['band_'.$i.'_average']    ;
  $band['sigma_low']  = $_GET['band_'.$i.'_sigma_low']  ;
  $band['sigma_high'] = $_GET['band_'.$i.'_sigma_high'] ;
  $band['n_sigma']    = $_GET['band_'.$i.'_nSigma']     ;
  $band['opacity']    = $_GET['band_'.$i.'_opacity']    ;
  $band['color']      = $_GET['band_'.$i.'_color']      ;
  $band['start']      = $_GET['band_'.$i.'_start']-1    ;
  $band['end']        = $_GET['band_'.$i.'_end']        ;
  $bands[] = $band ;
}
include('box_plotter.php') ;
?>