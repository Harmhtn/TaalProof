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
                url: '/watch/video?id='+id,
                data:
                    {

                        posttype: type,
                        id: id
                    },
                success: function(data)
                {
                    $(star).toggleClass("fas");
                    $(star).toggleClass("far");
                    // console.log($(star).toggleClass("far"));

                    // $(star).removeClass('far').addClass('fas');
                }
            });
    });

    // $('.fas').click(function() {
    //
    //     $.ajax(
    //         {
    //             type: 'POST',
    //             url: '/watch/video?id='+id,
    //             data:
    //
    //                 {
    //                     delete: "delete",
    //                     id: id
    //
    //                 },
    //             success: function(data)
    //             {
    //                 $(star).toggleClass("far");
    //                 $(star).toggleClass("fas");
    //                 // console.log($(star).toggleClass("fas"));
    //                 //
    //                 // // $(star).removeClass('fas').addClass('far');
    //                 // $(star).toggleClass("far");
    //
    //             }
    //         });
    // });

</script>
<script>

    // function onClick() {
    //     var arr = document.getElementById("star").className;
    //
    //     if (arr.includes('fas')) {
    //         document.getElementById("star").classList.add('far');
    //         document.getElementById("star").classList.remove('fas');
    //     } else {
    //         document.getElementById("star").classList.add('fas');
    //         document.getElementById("star").classList.remove('far');
    //     }
    // }
</script>