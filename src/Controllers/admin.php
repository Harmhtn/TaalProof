<?php

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    //get video
    $edit_video = $app['database']->selectOneIdWhereId('*', 'videos', 'video_id', $id);


    //get categories of video
    $category_ids = $app['database']->selectAllIdWhereId('multiple_categories', 'videos_video_id', $id);
    foreach ($category_ids as $category_id) {
        $category_description_edit [] = $app['database']->selectAllIdWhereIdFetch(
            'video_category', 'category_id',
            $category_id['video_category_category_id']
        );

    }


}

if (isset($_POST['edit'])) {

    //update video values
    $video_name = $_POST['video_name'];
    $video_description = $_POST['video_description'];
    $video_code = $_POST['video_code'];
    $video_id = $_POST['video_id'];
    $selected_category = $_POST['selected_categorie'];

    //update video
    $app['database']->updateVideo($video_name, $video_description, $video_code, $video_id);

    //update category description name
    $edited_categories = $_POST['edited_category'];

    foreach ($edited_categories as $category_id => $edited_category){
        $app['database']->updateCategory($edited_category, $category_id);
    }

    //change if category is deselected
    //delete video categories
    $app['database']->deleteMultipleCategories($video_id);

    for ($i = 0; $i < count($selected_category); $i++) {
        $app['database']->insertVideoCategory($video_id, $selected_category[$i]);
    }


}
if (isset($_POST['add'])) {

    //all variables from the form
    $video_name = $_POST['video_name'];
    $video_description = $_POST['video_description'];
    $video_code = $_POST['video_code'];

    //arrays from the form
    $selected_category = $_POST['selected_categorie'];
    $added_category = $_POST['added_categorie'];

    if ($added_category[0] != '') {

        for ($i = 0; $i < count($added_category); $i++) {

            $app['database']->insertNewCategory($added_category[$i]);
            $multiple_category_ids = $app['database']->selectOneIdWhereId(
                'category_id',
                'video_category',
                'category_description',
                $added_category[$i]);

            foreach ($multiple_category_ids as $multiple_category_id) {

                array_push($selected_category, $multiple_category_id);

            }
        }

    }

    $app['database']->insertVideo($video_name, $video_description, $video_code);
    $video_id = $app['database']->selectOneIdWhereId('video_id', 'videos', 'video_code', $_POST['video_code']);

    for ($i = 0; $i < count($selected_category); $i++) {

        $app['database']->insertVideoCategory($video_id['video_id'], $selected_category[$i]);

    }

}

if (isset($_GET['delete'])) {

    $video_id = $_GET['delete'];
    //delete video id to category id
    $app['database']->deleteMultipleCategories($video_id);
    // delete all videos from favorites
    $app['database']->deleteVideoFromFavorites($video_id);
    //delete video
    $app['database']->deleteVideo($video_id);

}

if (isset($_GET['deleteC'])) {

    $category_id = $_GET['deleteC'];
    $error = $app['database']->deleteCategory($category_id);

}

//select all the videos
$videos = $app['database']->selectAll('videos');
$all_categories = $app['database']->selectAll('video_category');

//get category of video
//get category id with video id
foreach ($videos as $video) {
    //category id's from one video
    $category_ids = $app['database']->selectAllIdWhereId('multiple_categories', 'videos_video_id', $video['video_id']);

//    get name from category
    foreach ($category_ids as $category_id) {

        $categorie_video = $app['database']->selectAllIdWhereIdFetch(
            'video_category', 'category_id',
            $category_id['video_category_category_id']
        );

        $types[] = $categorie_video['category_description'];

    }
    if (!empty($types)) {

        array_push($video, $types);
        unset($types);
        $all_video[] = $video;

    }

}


//load head and navbar
require 'Resources/views/head.php';

if (isset($_GET['edit']) || isset($_GET['add'])){
    $categories = $app['database']->selectAll('video_category');
    require 'Resources/views/default/add_video.view.php';
}




//load view
require 'Resources/views/default/admin.view.php';


//load footer
require 'Resources/views/footer.php';