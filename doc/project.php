<?php
include_once($_SERVER['FILE_PREFIX']."/project_list/project_object.php") ;
$github_uri   = "https://github.com/aidansean/box_plotter" ;
$blogpost_uri = "http://aidansean.com/projects/?tag=box_plotter" ;
$project = new project_object("box_plotter", "Box plotter", "https://github.com/aidansean/box_plotter", "http://aidansean.com/projects/?tag=box_plotter", "box_plotter/images/project.jpg", "box_plotter/images/project_bw.jpg", "One of the most popular ways to compare results in particle physics is to create plots that show different results with horizontal bands (sometimes known as boxes), making comparisons easier on the eye.  Unsatisfied with the quality of available solutions at the time, I created my own scripts which would make these plots for use in my thesis.", "Maths,Physics,Tools", "HTML,PHP,SVG") ;
?>