<?php
//load head and navbar
require 'Resources/views/head.php';

$user_info = $app['database']->selectUserById($_SESSION["user_id"]);


//get all the favorite videos
$favorites_video_id = $app['database']->selectAllIdWhereId('favorite_video', 'users_user_id', $_SESSION["user_id"]);

foreach($favorites_video_id as $favorite){
    $vid_id[] = $favorite['videos_video_id'];
}

$videoids = implode(",", $vid_id);

$all_videos = $app['database']->selectVideosById('videos', $videoids);



if(isset($_GET['change'])) {

    $username = $_POST['user_name'];
    $login_name = $_POST['login_name'];
    $user_email = $_POST['user_email'];
    $id = $_SESSION['user_id'];
    $app['database']->updateUser($username, $login_name, $user_email, $id);


}

//load view
require 'Resources/views/default/account.view.php';

//load footer
require 'Resources/views/footer.php';