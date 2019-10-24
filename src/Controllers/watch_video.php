<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = $_POST['id'];

    if ($_POST['posttype'] == 'delete') {
        echo $_POST['posttype'];
        $app['database']->deleteFromFavorites($_SESSION['user_id'], $id);
    }else {
        echo $_POST['posttype'];
        $app['database']->addToFavorites($_SESSION['user_id'], $id);
    }
}
    $id = $_GET['id'];

    $video_data = $app['database']->selectVideosById('videos', $id);
    $id = $_SESSION['user_id'];
    $favorites = $app['database']->selectIfVideoFavorite($id, $video_data[0]['video_id']);


    if ($favorites == ""){
        $class = 'fas';
    }else{
        $class = 'far';
    }




//get if video is already favorite or not

//when send back
//make video favorite
//delete video from favorites


//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/watch_video.view.php';

//load footer
require 'Resources/views/footer.php';