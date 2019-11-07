<div class="container">
    <div class="row justify-content-center text-white">
    <div class=" mt-4 p-4 rounded" style="background-color: #00adee">
    <?php if (!empty($mail_send)) {
        echo "<div class='alert alert-info'>$mail_send</div>";
    }else{ ?>
    <?php if (!empty($error)) {
        echo $error;
    } ?>
    <form action="?url=forgot_password" method="post">
        <label>Voer hier je email adres in: </label>
        <input class="form-control" name="email" type="text">
        <input type="hidden" name="email_send">
        <br>
        <input class="btn btn-primary" type="submit" value="Bevestig">
    </form>
    <div align="center">
        <a href="?url=login">Terug naar login pagina</a>
    </div>
    </div>
    </div>
</div>

<?php
}