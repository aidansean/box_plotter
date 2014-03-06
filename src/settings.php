<?php

$value_width_fraction = 0.10 ;
$label_width_fraction = 0.25 ;

if(isset($_GET['left_column_width' ])) $label_width_fraction = 0.01*$_GET['left_column_width' ] ;
if(isset($_GET['right_column_width'])) $value_width_fraction = 0.01*$_GET['right_column_width'] ;

$g['margin_left']         =   0 ;
$g['margin_right']        =   0 ;
$g['margin_top']          =   0 ;
$g['margin_bottom']       =  10 ;
$g['plot_padding_left']   =  10 ;
$g['plot_padding_right']  =  10 ;
$g['plot_padding_top']    =  50 ;
$g['plot_padding_bottom'] =  50 ;
$g['canvas_width']        = $width ;
$g['scale']               =   1 ;
$g['row_height']          =  40 ;

$g['canvas_width']        = $g['scale']*$g['canvas_width']        ;
$g['margin_left']         = $g['scale']*$g['margin_left']         ;
$g['margin_right']        = $g['scale']*$g['margin_right']        ;
$g['margin_top']          = $g['scale']*$g['margin_top']          ;
$g['margin_bottom']       = $g['scale']*$g['margin_bottom']       ;
$g['plot_padding_left']   = $g['scale']*$g['plot_padding_left']   ;
$g['plot_padding_right']  = $g['scale']*$g['plot_padding_right']  ;
$g['plot_padding_top']    = $g['scale']*$g['plot_padding_top']    ;
$g['plot_padding_bottom'] = $g['scale']*$g['plot_padding_bottom'] ;

$g['canvas_height'] = $g['row_height']*$g['scale']*(count($data)+2) + $g['margin_top'] + $g['margin_bottom'] + $g['plot_padding_top'] + $g['plot_padding_bottom'] ;
$g['label_width']   = ($g['canvas_width'] - $g['margin_left'] - $g['margin_right'])*$label_width_fraction ;
$g['value_width']   = ($g['canvas_width'] - $g['margin_left'] - $g['margin_right'])*$value_width_fraction ;
$g['plot_width']    = $g['canvas_width']  - ($g['margin_left'] + $g['margin_right'] + $g['plot_padding_left'] + $g['plot_padding_right'] + $g['label_width'] + $g['value_width']) ;
$g['plot_height']   = $g['canvas_height'] - ($g['margin_top'] + $g['margin_bottom'] + $g['plot_padding_top'] + $g['plot_padding_bottom'] ) ;
$g['font_family']   = 'georgia' ;
$g['radius'] = 5 ;
$g['precision'] = $precision ;

?>