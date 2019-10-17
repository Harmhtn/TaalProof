<?php

$id = $_GET['id'];

$video_data = $app['database']->selectVideosById('videos', $id);


//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/watch_video.view.php';

//load footer
require 'Resources/views/footer.php';