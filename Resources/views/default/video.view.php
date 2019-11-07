<div class="container bg-light">
    <form action="?url=video" method="post">
        <select class="form-control mt-4" name="select_category">
            <option selected="selected">Kies een categorie</option>
            <option value="all">Alle</option>
            <?php
            if (!empty($all_catagories)) {
                foreach ($all_catagories as $category) {
                    echo "<option value='" . $category['category_id'] . '.' . $category['category_description'] . "'>" . $category['category_description'] . "</option>";
                }
            }
            ?>
        </select>
        <input type="submit" class="btn mt-2" style="background-color: #00adee">
    </form>
    <?php
    if (!empty($cat_name)) {
        ?>
        <p class="display-4"><?= $cat_name ?></p><br>
        <?php
    }
    ?>
    <div class="row justify-content-center">
        <?php
        if (!empty($all_videos)) {

            foreach ($all_videos as $video) {

                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12  m-2">
                    <div class="card  h-100" style="width: 18rem;">
                        <img class="card-img-top"
                             src="http://img.youtube.com/vi/<?= $video['video_code'] ?>/mqdefault.jpg" alt="">
                        <div class="card-body">
                            <h5 class="card-text"><?= $video['video_name'] ?></h5>
                            <a href="?url=watch/video?id=<?= $video['video_id'] ?>" class="btn btn-primary">Kijk video!</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>

    </div>
</div>
