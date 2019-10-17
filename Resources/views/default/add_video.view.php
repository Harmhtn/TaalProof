<script type='text/javascript'>
    $(document).ready(function() {
        var max_fields = 4;
        var wrapper = $(".container1");
        var add_button = $(".add_form_field");

        var x = 1;
        $(add_button).click(function(e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div><label for="Input">Voeg genre toe</label><input  type="text" class="form-control" name="added_categorie[]"><a href="#" class="delete">Delete</a></div>'); //add input box
            } else {
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>
<div class="container">
    <form action="/admin" class="form-signin w-100" method="post">
        <!-- video name -->
        <div class="form-group">
            <label for="Input">Video naam</label><br>
            <input type="text" class="form-control" name="video_name" required>
        </div>
        <!-- video omschrijving -->
        <div class="form-group">
            <label for="Input">Video omschrijving</label><br>
            <textarea class="form-control" name="video_description" required ></textarea>
        </div>
        <!-- video code -->
        <div class="form-group">
            <label for="Input">Video code</label><br>
            <input type="text" class="form-control" name="video_code" required>
        </div>

        <!-- Video type -->
        <div class="form-group">
            <label>Genre</label><br>
            <select multiple title="Kies een soort"
                    data-live-search="true"
                    multiple class="selectpicker shadow-sm mb-2 bg-white rounded"
                    name="selected_categorie[]"
                    required>
                <?php

                if (!empty($categories)) {
                    foreach ($categories as $categorie)
                    {
                        echo "<option value='". $categorie['category_id']. "'>". $categorie['category_description']. "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <button type="button"  class="mt-2 btn btn-primary" value="Anders" onclick="myFunction()">Ander genre</button>

        <!-- video code -->
        <div class="container1" style="display: none" class="form-group" id="anders">
            <button class="mt-2 btn btn-info add_form_field">Add New Field &nbsp;
                <span style="font-size:16px; font-weight:bold;">+ </span>
            </button><br>
            <label for="Input">Voeg genre toe</label><br>
            <input  type="text" class="form-control" name="added_categorie[]">
        </div>



        <input type="submit" class="mt-2 btn btn-primary" value="Video toevoegen">


    </form>
</div>
<script>


    function myFunction() {
        var x = document.getElementById("anders");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

</script>