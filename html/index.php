<?php
$title = 'Box plotter' ;
include_once('settings.php') ;
include_once('project.php') ;
include_once($_SERVER['FILE_PREFIX'] . '/_core/preamble.php') ;
?>

<script type="text/javascript">
<!--
var n = 0 ;
var n_bands = 0 ;
function start(){
<?php
  if(isset($_GET['n'])){
    $data_strings = array() ;
		$data_strings[] = 'title'    ;
		$data_strings[] = 'notes'    ;
		$data_strings[] = 'year'     ;
		$data_strings[] = 'citation' ;
		$data_strings[] = 'color'    ;
		
		$data_floats = array() ;
		$data_floats[] = 'central_value' ;
		$data_floats[] = 'el1' ;
		$data_floats[] = 'eh1' ;
		$data_floats[] = 'el2' ;
		$data_floats[] = 'eh2' ;
		$data_floats[] = 'el3' ;
		$data_floats[] = 'eh3' ;
		
		$band_strings = array() ;
		$band_strings[] = 'color' ;
		$band_floats = array() ;
		$band_floats[] = 'average'    ;
		$band_floats[] = 'sigma_low'  ;
		$band_floats[] = 'sigma_high' ;
		$band_floats[] = 'nSigma'     ;
		$band_floats[] = 'start'      ;
		$band_floats[] = 'end'        ;
		$band_floats[] = 'opacity'    ;
		
		if($_GET['title']       !='') echo 'Get(\'plot_title\').value = "'   , $_GET['title']        , '" ;' , PHP_EOL ;
		if($_GET['axis']        !='') echo 'Get(\'plot_axis\').value  = "'   , $_GET['axis']         , '" ;' , PHP_EOL ;
		if($_GET['precision']   !='') echo 'Get(\'precision\').value = "'    , $_GET['precision']    , '" ;' , PHP_EOL ;
		if($_GET['canvas_width']!='') echo 'Get(\'canvas_width\').value = "' , $_GET['canvas_width'] , '" ;' , PHP_EOL ;
		
    for($i=1 ; $i<$_GET['n']+1 ; $i++){
      echo 'add_entry_rows() ;' , PHP_EOL ;
      for($j=0 ; $j<count($data_strings) ; $j++){
        if($_GET['data_' . $i . '_' . $data_strings[$j]]!='') echo 'Get(\'data_' , $i , '_' , $data_strings[$j] , '\').value = "' , $_GET['data_' . $i . '_' . $data_strings[$j]] , '" ;' , PHP_EOL ;
      }
      echo PHP_EOL ;
      for($j=0 ; $j<count($data_floats) ; $j++){
        if($_GET['data_' . $i . '_' . $data_floats[$j]]!='') echo 'Get(\'data_' , $i , '_' , $data_floats[$j] , '\').value = ' , $_GET['data_' . $i . '_' . $data_floats[$j]] , ' ;' , PHP_EOL ;
      }
      echo 'Get(\'data_' , $i , '_marker_style\').selectedOption = ' , ($_GET['data_' . $i . '_marker_style']-1) , ' ;' , PHP_EOL ;
      echo 'toggle_entry(' , $i , ') ;' , PHP_EOL ;
    }
    echo PHP_EOL ;
    for($i=1 ; $i<$_GET['n_bands']+1 ; $i++){
      echo 'add_band_rows() ;' , PHP_EOL ;
      for($j=0 ; $j<count($band_strings) ; $j++){
        if($_GET['band_' . $i . '_' . $band_strings[$j]]!='') echo 'Get(\'band_' , $i , '_' , $band_strings[$j] , '\').value = "' , $_GET['band_' . $i . '_' . $band_strings[$j]] , '" ;' , PHP_EOL ;
      }
      for($j=0 ; $j<count($band_floats) ; $j++){
        if($_GET['band_' . $i . '_' . $band_floats[$j]]!='') echo 'Get(\'band_' , $i , '_' , $band_floats[$j] , '\').value = ' , $_GET['band_' . $i . '_' . $band_floats[$j]] , ' ;' , PHP_EOL ;
      }
      echo 'toggle_band(' , $i , ') ;' , PHP_EOL ;
    }
    echo PHP_EOL ;
    echo 'n = '       , $_GET['n']       , ' ; ' , PHP_EOL ;
    echo 'n_bands = ' , $_GET['n_bands'] , ' ; ' , PHP_EOL ;
    echo 'update_plot() ;' , PHP_EOL ;
    echo 'Get(\'box_plotter_wrapper\').style.width  = (10+' , $_GET['canvas_width'] , ') ;' , PHP_EOL ;
    echo 'Get(\'box_plotter_wrapper\').style.height = (10+plot_height()) ;' , PHP_EOL ;
  }
  else{
    echo 'add_entry_rows() ;' , PHP_EOL ;
    echo 'n = 1 ;' , PHP_EOL ;
  }
  
  ?>
}
function plot_height(){
  return (n+2)*<?php echo $g['row_height']*$g['scale'] ; ?> + <?php echo ($g['margin_top'] + $g['margin_bottom'] + $g['plot_padding_top'] + $g['plot_padding_bottom']) ; ?> ;
}
function update_plot(){
  var args = new Array() ;
  args[0]  = 'title' ;
  args[1]  = 'notes' ;
  args[2]  = 'year' ;
  args[3]  = 'citation' ;
  args[4]   = 'central_value' ;
  args[5]  = 'el1' ;
  args[6]  = 'eh1' ;
  args[7]  = 'el2' ;
  args[8]  = 'eh2' ;
  args[9]  = 'el3' ;
  args[10] = 'eh3' ;
  args[11] = 'marker_style' ;
  args[12] = 'color' ;
  var GETs = '?' ;
  GETs = GETs + 'title='                   + Get('plot_title'  ).value ;
  GETs = GETs + '&amp;axis='               + Get('plot_axis'   ).value ;
  GETs = GETs + '&amp;precision='          + Get('precision'   ).value ;
  GETs = GETs + '&amp;canvas_width='       + Get('canvas_width').value ;
  GETs = GETs + '&amp;left_column_width='  + Get('left_column_width').value ;
  GETs = GETs + '&amp;right_column_width=' + Get('right_column_width').value ;
  GETs = GETs + '&amp;n=' + n ;
  GETs = GETs + '&amp;n_bands=' + n_bands ;
  for(var i=1 ; i<n+1 ; i++){
    for(var j=0 ; j<args.length ; j++){
      GETs = GETs + '&amp;data_' + i + '_' + args[j] + '=' + Get('data_' + i + '_' + args[j]).value ;
    }
  }
  var band_args = new Array() ;
  band_args[0] = 'average' ;
  band_args[1] = 'sigma_low' ;
  band_args[2] = 'sigma_high' ;
  band_args[3] = 'nSigma' ;
  band_args[4] = 'start' ;
  band_args[5] = 'end' ;
  band_args[6] = 'opacity' ;
  band_args[7] = 'color' ;
  for(var i=1 ; i<n_bands+1 ; i++){
    for(var j=0 ; j<band_args.length ; j++){
      GETs = GETs + '&band_' + i + '_' + band_args[j] + '=' + Get('band_' + i + '_' + band_args[j]).value ;
    }
  }
  Get('box_plotter_wrapper').innerHTML = '<object type="image/svg+xml" data="plot.php' + GETs + '" name="box_plotter" width="600px" height="' + plot_height() + 'px" ><\/object>' ;
  Get('link').href     = 'index.php' + GETs ;
  Get('SVG_link').href = 'plot.php'  + GETs ;
}
function toggle_plot(){
  var trs = Get('table_form').getElementsByTagName('tr') ;
  if(Get('tr_plot_title'   ).className=='hide'){
    Get('tr_plot_title'    ).className = '' ;
    Get('tr_plot_axis'     ).className = '' ;
    Get('tr_plot_precision').className = '' ;
    Get('tr_plot_width'    ).className = '' ;
    Get('toggle_plot'      ).innerHTML = 'Hide' ;
  }
  else{
    Get('tr_plot_title'    ).className = 'hide' ;
    Get('tr_plot_axis'     ).className = 'hide' ;
    Get('tr_plot_precision').className = 'hide' ;
    Get('tr_plot_width'    ).className = 'hide' ;
    Get('toggle_plot'      ).innerHTML = 'Show' ;
  }
}
function toggle_entry(i){
  var trs = Get('table_form').getElementsByTagName('tr') ;
  if(Get('tr_'+i+'_title').className=='hide'){
    for(var j=0 ; j<trs.length ; j++){ if(trs[j].id.match('tr_'+i+'_')) trs[j].className = '' ; }
    Get('toggle_entry_'+i).innerHTML = 'Hide' ;
  }
  else{
    for(var j=0 ; j<trs.length ; j++){ if(trs[j].id.match('tr_'+i+'_')) trs[j].className = 'hide' ; }
    Get('toggle_entry_'+i).innerHTML = 'Show' ;
    Get('toggle_data_'+i).innerHTML  = 'Show' ;
    Get('toggle_style_'+i).innerHTML = 'Show' ;
  }
}
function toggle_data(i){
  var trs = Get('table_form').getElementsByTagName('tr') ;
  if(Get('tr_'+i+'_data_central_value').className=='hide'){
    for(var j=0 ; j<trs.length ; j++){ if(trs[j].id.match('tr_'+i+'_data_')) trs[j].className = '' ; }
    Get('toggle_data_'+i).innerHTML = 'Hide' ;
  }
  else{
    for(var j=0 ; j<trs.length ; j++){ if(trs[j].id.match('tr_'+i+'_data_')) trs[j].className = 'hide' ; }
    Get('toggle_data_'+i).innerHTML  = 'Show' ;
  }
}
function toggle_style(i){
  var trs = Get('table_form').getElementsByTagName('tr') ;
  if(Get('tr_'+i+'_style_marker_style').className=='hide'){
    for(var j=0 ; j<trs.length ; j++){ if(trs[j].id.match('tr_'+i+'_style_')) trs[j].className = '' ; }
    Get('toggle_style_'+i).innerHTML = 'Hide' ;
  }
  else{
    for(var j=0 ; j<trs.length ; j++){ if(trs[j].id.match('tr_'+i+'_style_')) trs[j].className = 'hide' ; }
    Get('toggle_style_'+i).innerHTML  = 'Show' ;
  }
}
function toggle_band(i){
  var trs = Get('table_form').getElementsByTagName('tr') ;
  if(Get('tr_'+i+'_band_average').className=='hide'){
    for(var j=0 ; j<trs.length ; j++){ if(trs[j].id.match('tr_'+i+'_band_')) trs[j].className = '' ; }
    Get('toggle_band_'+i).innerHTML = 'Hide' ;
  }
  else{
    for(var j=0 ; j<trs.length ; j++){ if(trs[j].id.match('tr_'+i+'_band_')) trs[j].className = 'hide' ; }
    Get('toggle_band_'+i).innerHTML = 'Show' ;
  }
}
function add_band_rows(){
  n_bands++ ;
  var before = 'tr_add_band' ;
  var tr ;
  var th ;
  var td ;
  var text ;
  var span ;
  tr = Create('tr') ;
  th = Create('th') ;
  th.className = 'box_plotter box_plotter_heading' ;
  th.colSpan = '2' ;
  th.innerHTML = 'Band ' + n_bands + ' (<span id="toggle_band_' + n_bands + '" onclick="toggle_band(' + n_bands + ')">Hide<\/span>)' ;
  tr.appendChild(th) ;
  Get('tbody_form').insertBefore(tr, Get(before)) ;
  
  add_input_row('tr_' + n_bands + '_band_average'   , 'Central value: '      , '<input type="text" class="narrow" id="band_' + n_bands + '_average" name="band_'    + n_bands + '_average" value="" />'   , before) ;
  add_input_row('tr_' + n_bands + '_band_sigma_low' , 'Lower uncertainty: '  , '<input type="text" class="narrow" id="band_' + n_bands + '_sigma_low" name="band_'  + n_bands + '_sigma_low" value="" />' , before) ;
  add_input_row('tr_' + n_bands + '_band_sigma_high', 'Upper uncertainty: '  , '<input type="text" class="narrow" id="band_' + n_bands + '_sigma_high" name="band_' + n_bands + '_sigma_high" value="" />', before) ;
  add_input_row('tr_' + n_bands + '_band_sigma_low' , 'n&sigma;: '           , '<input type="text" class="narrow" id="band_' + n_bands + '_nSigma" name="band_'     + n_bands + '_nSigma" value="" />'    , before) ;
  add_input_row('tr_' + n_bands + '_band_start'     , 'Start at data point: ', '<input type="text" class="narrow" id="band_' + n_bands + '_start" name="band_'      + n_bands + '_start" value="" />'     , before) ;
  add_input_row('tr_' + n_bands + '_band_end'       , 'End at data point: '  , '<input type="text" class="narrow" id="band_' + n_bands + '_end" name="band_'        + n_bands + '_end" value="" />'       , before) ;
  add_input_row('tr_' + n_bands + '_band_opacity'   , 'Opacity: '            , '<input type="text" class="narrow" id="band_' + n_bands + '_opacity" name="band_'    + n_bands + '_opacity" value="0.4" />', before) ;
  add_input_row('tr_' + n_bands + '_band_color'     , 'Color: '              , '<input type="text"                id="band_' + n_bands + '_color" name="band_'      + n_bands + '_color" value="rgb(255,0,0)"><span id="band_' + n_bands + '_color" style="background-color:rgb(255,0,0);width:25px" class="box_plotter_color"><\/span>', before) ;
}
function add_entry_rows(){
  n++ ;
  var before = 'tr_add_entry' ;
  var tr ;
  var th ;
  var td ;
  var text ;
  var span ;
  tr = Create('tr') ;
  th = Create('th') ;
  th.className = 'box_plotter box_plotter_heading' ;
  th.colSpan = '2' ;
  th.innerHTML = 'Entry ' + n + ' (<span id="toggle_entry_' + n + '" onclick="toggle_entry(' + n + ')">Hide<\/span>)' ;
  tr.appendChild(th) ;
  Get('tbody_form').insertBefore(tr, Get(before)) ;

  add_input_row('tr_' + n + '_title'   , 'Title: '   , '<input type="text" id="data_' + n + '_title"    name="data_' + n + '_title"    value="" />', before) ;
  add_input_row('tr_' + n + '_notes'   , 'Notes: '   , '<input type="text" id="data_' + n + '_notes"    name="data_' + n + '_notes"    value="" />', before) ;
  add_input_row('tr_' + n + '_year'    , 'Year: '    , '<input type="text" id="data_' + n + '_year"     name="data_' + n + '_year"     value="" />', before) ;
  add_input_row('tr_' + n + '_citation', 'Citation: ', '<input type="text" id="data_' + n + '_citation" name="data_' + n + '_citation" value="" />', before) ;
  
  tr = Create('tr') ;
  th = Create('th') ;
  th.className = 'box_plotter box_plotter_subheading' ;
  th.colSpan = '2' ;
  th.innerHTML = 'Data (<span id="toggle_data_' + n + '" onclick="toggle_data(' + n + ')">Hide<\/span>)' ;
  tr.appendChild(th) ;
  Get('tbody_form').insertBefore(tr, Get(before)) ;
  
  add_input_row('tr_' + n + '_data_central_value', 'Central value: ' , '<input type="text" id="data_' + n + '_central_value" name="data_' + n + '_central_value" value="" />', before) ;
  add_input_row('tr_' + n + '_data_el1', 'First lower uncertainty: ' , '<input type="text" id="data_' + n + '_el1" name="data_' + n + '_el1" value="" />', before) ;
  add_input_row('tr_' + n + '_data_eh1', 'First upper uncertainty: ' , '<input type="text" id="data_' + n + '_eh1" name="data_' + n + '_eh1" value="" />', before) ;
  add_input_row('tr_' + n + '_data_el2', 'Second lower uncertainty: ', '<input type="text" id="data_' + n + '_el2" name="data_' + n + '_el2" value="" />', before) ;
  add_input_row('tr_' + n + '_data_eh2', 'Second upper uncertainty: ', '<input type="text" id="data_' + n + '_eh2" name="data_' + n + '_eh2" value="" />', before) ;
  add_input_row('tr_' + n + '_data_el3', 'Third lower uncertainty: ' , '<input type="text" id="data_' + n + '_el3" name="data_' + n + '_el3" value="" />', before) ;
  add_input_row('tr_' + n + '_data_eh3', 'Third upper uncertainty: ' , '<input type="text" id="data_' + n + '_eh3" name="data_' + n + '_eh3" value="" />', before) ;
  
  tr = Create('tr') ;
  th = Create('th') ;
  th.className = 'box_plotter box_plotter_subheading' ;
  th.colSpan = '2' ;
  th.innerHTML = 'Style (<span id="toggle_style_' + n + '" onclick="toggle_style(' + n + ')">Hide<\/span>)' ;
  tr.appendChild(th) ;
  Get('tbody_form').insertBefore(tr, Get(before)) ;
  
  add_input_row('tr_' + n + '_style_marker_style', 'Marker style: ', '<select id="data_' + n + '_marker_style" name="data_' + n + '_marker_style">\n<option value="1">Filled circle<\/option>\n<option value="2">Hollow circle<\/option>\n<option value="3">Filled square<\/option>\n<option value="4">Hollow square<\/option>\n<\/select>', before) ;
  
  add_input_row('tr_' + n + '_style_color', 'Color: ', '<input type="text" id="data_' + n + '_color" name="data_' + n + '_color" value="rgb(0,0,0)"><span id="data_'+n+'_color" style="background-color:rgb(255,0,0);width:25px" class="box_plotter_color"><\/span>', before) ;
}
function add_input_row(row_id, thInnerHTML, tdInnerHTML, before){
	var tr = Create('tr') ;
	var th = Create('th') ;
	var td = Create('td') ;
	tr.id = row_id ;
	th.innerHTML = thInnerHTML ;
	td.className = 'box_plotter_td_1' ;
	td.innerHTML = tdInnerHTML ;
	tr.appendChild(th) ;
	tr.appendChild(td) ;
	Get('tbody_form').insertBefore(tr, Get(before)) ;
}
// Helper functions
function Create(tag ){ return document.createElement( tag ) ; }
function    Get(name){ return document.getElementById(name) ; }
-->
</script>

<p class="notice">You need a browser which is capable of displaying scalable vector graphics to view this page properly.</p>
<?php include('form.php') ; ?>
<div id="box_plotter_wrapper"></div>
<p><a href="" id="link">Link</a></p>
<p><a href="" id="SVG_link">SVG Link</a></p>
<p>Example plots:</p>
<ul>
  <li><a href="index.php?title=X(3872)%20mass&amp;axis=Mass%20(GeV)&amp;precision=0&amp;canvas_width=600&amp;left_column_width=10&amp;right_column_width=10&amp;n=5&amp;n_bands=1&amp;data_1_title=CDF2&amp;data_1_notes=&amp;data_1_year=2009&amp;data_1_citation=1&amp;data_1_central_value=3871.61&amp;data_1_el1=0.16&amp;data_1_eh1=0.16&amp;data_1_el2=0.19&amp;data_1_eh2=0.19&amp;data_1_el3=0&amp;data_1_eh3=0&amp;data_1_marker_style=1&amp;data_1_color=rgb(0,0,0)&amp;data_2_title=BaBar&amp;data_2_notes=Charged%20B&amp;data_2_year=2008&amp;data_2_citation=2&amp;data_2_central_value=3871.4&amp;data_2_el1=0.6&amp;data_2_eh1=0.6&amp;data_2_el2=0.1&amp;data_2_eh2=0.1&amp;data_2_el3=0&amp;data_2_eh3=0&amp;data_2_marker_style=1&amp;data_2_color=rgb(0,0,0)&amp;data_3_title=BaBar&amp;data_3_notes=Neutral%20B&amp;data_3_year=2008&amp;data_3_citation=3&amp;data_3_central_value=3868.7&amp;data_3_el1=1.5&amp;data_3_eh1=1.5&amp;data_3_el2=0.4&amp;data_3_eh2=0.4&amp;data_3_el3=0&amp;data_3_eh3=0&amp;data_3_marker_style=1&amp;data_3_color=rgb(0,0,0)&amp;data_4_title=D0&amp;data_4_notes=&amp;data_4_year=2004&amp;data_4_citation=4&amp;data_4_central_value=3871.8&amp;data_4_el1=3.1&amp;data_4_eh1=3.1&amp;data_4_el2=3&amp;data_4_eh2=3&amp;data_4_el3=0&amp;data_4_eh3=0&amp;data_4_marker_style=1&amp;data_4_color=rgb(0,0,0)&amp;data_5_title=Belle&amp;data_5_notes=All%20B&amp;data_5_year=2003&amp;data_5_citation=5&amp;data_5_central_value=3872&amp;data_5_el1=0.6&amp;data_5_eh1=0.6&amp;data_5_el2=0.5&amp;data_5_eh2=0.5&amp;data_5_el3=0&amp;data_5_eh3=0&amp;data_5_marker_style=1&amp;data_5_color=rgb(0,0,0)&amp;band_1_average=3871.56&amp;band_1_sigma_low=0.22&amp;band_1_sigma_high=0.22&amp;band_1_nSigma=2&amp;band_1_start=1&amp;band_1_end=5&amp;band_1_opacity=0.4&amp;band_1_color=rgb(0,0,255)">X(3872) mass</a></li>
  <li><a href="index.php?title=Z%20width&amp;axis=Width%20%28GeV%29&amp;precision=2&amp;canvas_width=600&amp;left_column_width=25&amp;right_column_width=10&amp;n=4&amp;n_bands=1&amp;data_1_title=OPAL&amp;data_1_notes=&amp;data_1_year=&amp;data_1_citation=&amp;data_1_central_value=2.4948&amp;data_1_el1=0.0041&amp;data_1_eh1=0.0041&amp;data_1_el2=&amp;data_1_eh2=&amp;data_1_el3=&amp;data_1_eh3=&amp;data_1_marker_style=1&amp;data_1_color=rgb%2899,0,0%29&amp;data_2_title=Delphi&amp;data_2_notes=&amp;data_2_year=&amp;data_2_citation=&amp;data_2_central_value=2.4876&amp;data_2_el1=0.0041&amp;data_2_eh1=0.0041&amp;data_2_el2=&amp;data_2_eh2=&amp;data_2_el3=&amp;data_2_eh3=&amp;data_2_marker_style=1&amp;data_2_color=rgb%2899,0,0%29&amp;data_3_title=L3&amp;data_3_notes=&amp;data_3_year=&amp;data_3_citation=&amp;data_3_central_value=2.5024&amp;data_3_el1=0.0042&amp;data_3_eh1=0.0042&amp;data_3_el2=&amp;data_3_eh2=&amp;data_3_el3=&amp;data_3_eh3=&amp;data_3_marker_style=1&amp;data_3_color=rgb%2899,0,0%29&amp;data_4_title=ALEPH&amp;data_4_notes=&amp;data_4_year=&amp;data_4_citation=&amp;data_4_central_value=2.4951&amp;data_4_el1=0.0043&amp;data_4_eh1=0.0043&amp;data_4_el2=&amp;data_4_eh2=&amp;data_4_el3=&amp;data_4_eh3=&amp;data_4_marker_style=1&amp;data_4_color=rgb%2899,0,0%29&amp;band_1_average=2.4952&amp;band_1_sigma_low=0.0023&amp;band_1_sigma_high=0.0023&amp;band_1_nSigma=2&amp;band_1_start=1&amp;band_1_end=4&amp;band_1_opacity=0.4&amp;band_1_color=rgb%28255,0,0%29">Z width</a></li>
</ul>
<?php foot() ; ?>
