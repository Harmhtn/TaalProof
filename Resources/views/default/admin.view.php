<table class="table table-hover">
<thead>
<tr>
    <th scope=\"col\">Video id</th>
    <th scope=\"col\">Video naam</th>
    <th scope=\"col\">Video omschrijving</th>
    <th scope=\"col\">Video code</th>
    <th scope=\"col\">Video categorie</th>

</tr>
</thead>
<tbody>
<tr>
    <td colspan="4">
        <a href="/admin?vid"><i class="fas fa-plus"></i> Video toevoegen</a>
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
      <td><?php foreach ($video[0] as $vid){
          echo '-' . $vid . '<br>';
          } ?></td>
    </tr>

<?php
    }
}

?>

</tbody>
</table>
