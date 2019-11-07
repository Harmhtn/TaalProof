<div class="container">
    <?php
    if (!empty($video_data)) {

    foreach ($video_data as $video) {
    ?>
    <div class="card"
    ">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $video['video_code'] ?>"
                allowfullscreen></iframe>
    </div>
    <div class="card-body">
        <h5 class="card-text"><?= $video['video_name'] ?><i id="star" class="fa-star card-text float-right <?= $class ?>"></i></h5>
    </div>
</div>
<?php

}

}
?>
<script >
    var id = "<?php echo $video['video_id'] ?>";
    $(star).click(function() {
        console.log($(star).attr('class'));
        if($(star).hasClass( "fas" )){
            var type = 'delete';
        }else {
            var type = 'add';
        }
        console.log(type);
        $.ajax(
            {
                type: 'POST',
                url: '?url=watch/video?id='+id,
                data:
                    {

                        posttype: type,
                        id: id
                    },
                success: function(data)
                {
                    $(star).toggleClass("fas");
                    $(star).toggleClass("far");
                }
            });
    });



</script>
<script>

</script>