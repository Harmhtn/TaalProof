<div class="container">
    <div class="row justify-content-center text-white">
        <div class="col-4 mt-4 p-4 rounded" style="background-color: #00adee">
            <form action="/register" class="form-signin w-100" method="post">
                <!--    user name-->
                <div class="form-group">
                    <label for="Input">Naam</label><br>
                    <input type="text" class="form-control" name="user_name" placeholder="Voornaam en achternaam">
                </div>
                <!--user login naam-->
                <div class="form-group">
                    <label for="Input">Login naam</label><br>
                    <input type="text" class="form-control" name="login_name" placeholder="Login naam">
                </div>
                <!--    user email-->
                <div class="form-group">
                    <label for="Input">Email</label><br>
                    <input type="email" class="form-control" name="user_email" placeholder="Email">
                </div>
                <!--    user password-->
                <div class="form-group">
                    <label for="InputPassword">Wachtwoord</label><br>
                    <input type="password" class="form-control" name="user_password" id="InputPassword" placeholder="Wachtwoord">
                </div>
                <button type="submit" class="btn btn-primary">Registreer</button>


            </form>
        </div>
    </div>
</div>