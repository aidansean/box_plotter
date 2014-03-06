<?php $n = 0 ; ?>
<table class="box_plotter" id="table_form">
<tbody id="tbody_form">

<tr>
  <th class="box_plotter box_plotter_heading" colspan="2">Plot options (<span id="toggle_plot" onclick="toggle_plot()">Hide</span>)</th>
</tr>
<tr id="tr_plot_title">
  <th>Title: </th>
  <td class="box_plotter_td_1"><input type="text" id="plot_title" name="plot_title" value="" /></td>
</tr>
<tr id="tr_plot_axis">
  <th>Axis title: </th>
  <td class="box_plotter_td_1"><input type="text" id="plot_axis" name="plot_axis" value="" /></td>
</tr>
<tr id="tr_plot_precision">
  <th>Axis precision: </th>
  <td class="box_plotter_td_1"><input class="narrow" type="text" id="precision" name="precision" value="2" /> dp</td>
</tr>
<tr id="tr_plot_width">
  <th>Plot width: </th>
  <td class="box_plotter_td_1"><input class="narrow" type="text" id="canvas_width" name="canvas_width" value="600" /> px</td>
</tr>
<tr id="tr_left_column_width">
  <th>Left column width: </th>
  <td class="box_plotter_td_1"><input class="narrow" type="text" id="left_column_width" name="left_column_width" value="25" /> %</td>
</tr>
<tr id="tr_right_column_width">
  <th>Right column width: </th>
  <td class="box_plotter_td_1"><input class="narrow" type="text" id="right_column_width" name="right_column_width" value="10" /> %</td>
</tr>
<tr id="tr_add_entry">
  <td class="box_plotter_td_1" colspan="2" style="text-align:center"><input type="submit" onclick="add_entry_rows()" value="Add another entry" /></td>
</tr>
<tr id="tr_add_band">
  <td class="box_plotter_td_1" colspan="2" style="text-align:center"><input type="submit" onclick="add_band_rows()" value="Add band" /></td>
</tr>
<tr id="tr_submit">
  <td class="box_plotter_td_1" colspan="2" style="text-align:center"><input type="submit" onclick="update_plot()" value="Make changes" /></td>
</tr>
</tbody>
</table>