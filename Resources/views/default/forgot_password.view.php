<div class="container">
    <?php if (!empty($error)) {
        echo $error;
    } ?>
    <div class="row justify-content-center text-white">
        <div class="col-4 mt-4 p-4 rounded" style="background-color: #00adee">
            <form action="/forgot_password" class="form-signin w-100" method="post">
                <h4 class="">Voer je E-mail of login naam in</h4>
                <label>Email:
                    <input class="form-control" name="email" type="text">
                </label>
                <input type="hidden" name="email_send">
                <br>
                <a href="login">Terug naar login pagina</a>
                <input class="btn btn-light" type="submit">
            </form>
        </div>
    </div>
</div>