<div class="container">
    <div class="row justify-content-center text-white">
        <div class="col-4 mt-4 p-4 rounded" style="background-color: #00adee">
            <form action="/login" class="form-signin w-100" method="post">
                <?php
                if (isset($message) && $message == true) {
                    ?>
                    <div class="alert alert-danger">Geen goede inlog gegevens!</div>
                    <?php
                }
                ?>
                <h4 class="">Welkom bij Taalproof</h4>
                <p>Login om verder te gaan naar de website</p>
                <label>Username:
                    <input class="form-control" name="login_name" type="text">
                </label>
                <label>Wachtwoord:
                    <input class="form-control" name="password" type="password">
                </label>
                <br>
                <input class="btn btn-light" type="submit">
                <div id="formFooter">
                    <a class="underlineHover text-light" href="forgot_password">Wachtwoord vergeten?</a><br>
                    <a class="underlineHover text-light" href="register">Nog geen account?</a>
                </div>
            </form>
        </div>
    </div>
</div>