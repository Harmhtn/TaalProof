<div class="container">
    <?php
    if (!empty($video_data)) {

    foreach ($video_data

    as $video) {

    ?>
    <div class="card"
    ">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $video['video_code'] ?>"
                allowfullscreen></iframe>
    </div>
    <div class="card-body">
        <h5 class="card-text"><?= $video['video_name'] ?><i onclick="onClick()" id="star" class="far fa-star card-text float-right"></i></h5>
    </div>
</div>
<?php
}
}
?>
</div>
<script>

    function onClick() {
        var arr = document.getElementById("star").className;

        if (arr.includes('fas')) {
            document.getElementById("star").classList.add('far');
            document.getElementById("star").classList.remove('fas');
        } else {
            document.getElementById("star").classList.add('fas');
            document.getElementById("star").classList.remove('far');
        }

        $.ajax({url: "watch_video?", dataType: "php"});
    }
</script>