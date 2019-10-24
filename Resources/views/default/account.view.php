
<div class="container">
    <div class="row  mt-4 mb-4">
        <?php
        if (isset($_SESSION['updated']) == true) {
            echo '<div class="alert alert-danger">Deze mail of gebruikers naam is al bezet</div>';
        }
        if (!empty($user_info)) {
            foreach ($user_info as $user) {


                if (isset($_GET['edit'])) {
                    ?>
                    <div class="card" style="width: 18rem;">

                        <div style="background-color: #00adee" class="hoeverclass card-header text-white"><a
                                    href="account?edit" class="edit"><i class="far fa-edit float-right"></i></a>
                            Hallo <?= $user['user_name'] ?><br>
                            Persoonlijke gegevens
                        </div>
                        <form action="account?change" method="post">
                            <ul class="list-group list-group-flush">
                                Naam:
                                <input class=" list-group-item" name="user_name" value="<?= $user['user_name'] ?>">
                                Email:
                                <input class=" list-group-item" name="user_email" value="<?= $user['user_email'] ?>">
                                Login naam:
                                <input class=" list-group-item" name="login_name" value="<?= $user['login_name'] ?>">
                                <input class="btn" type="submit">
                            </ul>
                        </form>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="card" style="width: 18rem;">

                        <div style="background-color: #00adee" class="hoeverclass card-header text-white"><a
                                    href="account?edit" class="edit"><i class="far fa-edit float-right"></i></a>
                            Hallo <?= $user['user_name'] ?><br>
                            Persoonlijke gegevens
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class=" list-group-item">Naam: <?= $user['user_name'] ?></li>
                            <li class=" list-group-item">Email: <?= $user['user_email'] ?></li>
                            <li class=" list-group-item">Login naam: <?= $user['login_name'] ?></li>
                        </ul>
                    </div>
                    <?php
                }
            }
        }

        ?>
    </div>

    <div class="row">
        <p class="display-4">Favorieten video's:</p>
    </div>
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
                            <a href="/watch/video?id=<?= $video['video_id'] ?>" class="btn btn-primary">Kijk video!</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>

    </div>


