<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = $_POST['id'];

    //add or delete from favorites
    if ($_POST['posttype'] == 'delete') {
        echo $_POST['posttype'];
        $app['database']->deleteFromFavorites($_SESSION['user_id'], $id);
    }else {
        echo $_POST['posttype'];
        $app['database']->addToFavorites($_SESSION['user_id'], $id);
    }
}
    $id = $_GET['id'];
    //check if video is already a favorite or not
    $video_data = $app['database']->selectVideosById('videos', $id);
    $id = $_SESSION['user_id'];
    $favorites = $app['database']->selectIfVideoFavorite($id, $video_data[0]['video_id']);

//make video show as favorite or not
    if (empty($favorites)){
        $class = 'far';
    }else{
        $class = 'fas';
    }


//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/watch_video.view.php';

//load footer
require 'Resources/views/footer.php';