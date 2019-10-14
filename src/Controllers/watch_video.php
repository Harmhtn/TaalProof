<?php

$id = $_GET['id'];

$video_data = $app['database']->selectVideoById('videos', $id);

function add($a,$b){
  $c=$a+$b;
  return $c;
}



//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/watch_video.view.php';

//load footer
require 'Resources/views/footer.php';