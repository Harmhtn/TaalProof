<?php

$all_catagories = $app['database']->selectAll('video_category');

if($_SERVER['REQUEST_METHOD'] == 'POST' &&  $_POST['select_category'] != 'all')
{
    $category_id_name = $_POST['select_category'];
    $cat_id = strtok($category_id_name, '.');
    $cat_name = substr($category_id_name, strpos($category_id_name, ".") + 1);

    //select all videos where the category_id is id
    $all_videos_id = $app['database']->selectAllIdWhereId('multiple_categories', 'video_category_category_id', $cat_id);

    if(!empty($all_videos_id)){

        foreach($all_videos_id as $video){
            $vid_id[] = $video['videos_video_id'];
        }

        $videoids = implode(",", $vid_id);

        $all_videos = $app['database']->selectVideosById('videos', $videoids);

    }


}else{
    $all_videos = $app['database']->selectAll('videos');

}

//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/video.view.php';

//load footer
require 'Resources/views/footer.php';