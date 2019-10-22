<div class="container">

    <table class="table table-hover">
        <thead>
        <tr>
            <th>
                Genres
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            if (isset($error) && $error) {
                ?>
                <div class="alert alert-danger">
                    <p>Je kan geen genres verwijderen die nog bij een video horen</p>
                </div>
            <?php
            }
            if (!empty($all_categories)) {
            foreach ($all_categories as $category) {
            //for select make a for loop or input field
            ?>
        <tr>
            <td><?= $category['category_description'] ?></td>
            <td><a href="admin?deleteC=<?= $category['category_id'] ?>" class="fas fa-trash-alt"></a></td>
            <td><a href="admin?editC=<?= $category['category_id'] ?>" class="fas fa-edit"></a></td>
        </tr>

        <?php
        }
        }
        ?>

        </tbody>
    </table>
    <table class="table table-hover">

        <thead>
        <tr>
            <th scope=\"col\">Video id</th>
            <th scope=\"col\">Video naam</th>
            <th scope=\"col\">Video omschrijving</th>
            <th scope=\"col\">Video code</th>
            <th colspan="3" scope=\"col\">Video categorie</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="4">
                <a href="/admin?add"><i class="fas fa-plus"></i> Video toevoegen</a>
            </td>
        </tr>
        <?php

        if (!empty($all_video)) {
            foreach ($all_video as $video) {
                //for select make a for loop or input field
                ?>
                <tr>
                    <th scope=\"row\"><?= $video['video_id'] ?></th>
                    <td><?= $video['video_name'] ?></td>
                    <td><?= $video['video_description'] ?></td>
                    <td><?= $video['video_code'] ?></td>
                    <td><?php foreach ($video[0] as $vid) {
                            echo '-' . $vid . '<br>';
                        } ?></td>
                    <td><a href="admin?delete=<?= $video['video_id'] ?>" class="fas fa-trash-alt"></a></td>
                    <td><a href="admin?edit=<?= $video['video_id'] ?>" class="fas fa-edit"></a></td>

                </tr>

                <?php
            }
        }

        ?>

        </tbody>
    </table>
