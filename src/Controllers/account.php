<?php
//load head and navbar
require 'Resources/views/head.php';

//if account is edited
if(isset($_GET['change'])) {

    //get all post variables
    $username = $_POST['user_name'];
    $login_name = $_POST['login_name'];
    $user_email = $_POST['user_email'];
    $id = $_SESSION['user_id'];

    //update the info from user
    $message = $app['database']->updateUser($username, $login_name, $user_email, $id);
}

//select the user to show user info
$user_info = $app['database']->selectUserById($_SESSION["user_id"]);

//get all the favorite videos from the user
$favorites_video_id = $app['database']->selectAllIdWhereId('favorite_video', 'users_user_id', $_SESSION["user_id"]);

//als er favoriete videos zijn:
if(!empty($favorites_video_id)) {
    foreach ($favorites_video_id as $favorite) {
        $vid_id[] = $favorite['videos_video_id'];
    }

    //put al videos in one string
    $videoids = implode(",", $vid_id);

    //get all favorite videos
    $all_videos = $app['database']->selectVideosById('videos', $videoids);
}


//load view
require 'Resources/views/default/account.view.php';

//load footer
require 'Resources/views/footer.php';