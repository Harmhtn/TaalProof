<div class="container">
    <div class="row justify-content-center text-white">
        <div class="col-4 mt-4 p-4 rounded" style="background-color: #00adee">
            <form action="/forgot_password?newpass=<?= $result['user_id'] ?>" class="form-signin w-100" method="post">
                <h4 class="">Het nieuwe wachtwoord in</h4>
                <label>Password:
                    <input class="form-control" name="new_password" type="password">
                </label>
                <br>
                <input class="btn btn-light" type="submit">
            </form>
        </div>
    </div>
</div>