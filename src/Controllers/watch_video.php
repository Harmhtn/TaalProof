<?php

$id = $_GET['id'];

$video_data = $app['database']->selectVideosById('videos', $id);

if(isset($_GET['yes'])){
    echo"<pre>";
    print_r("yes");
    exit;
}
//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/watch_video.view.php';

//load footer
require 'Resources/views/footer.php';