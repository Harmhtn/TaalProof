<?php


class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {

        $sql = $this->pdo->prepare("SELECT * FROM $table");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }

    public function login($login_name, $password)
    {

        $sql = $this->pdo->prepare("SELECT * FROM users WHERE login_name = '$login_name' AND user_password = '$password'");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }

    public function register($user_name, $login_name, $user_email, $user_password, $last_updated_date)
    {
        //insert de user in de db vergeet niet alle columns!!!!!
        //pass hash
        $sql = "INSERT INTO users (user_name, login_name, user_email, user_password, last_updated, roles_role_id)
                VALUES (:user_name, :login_name, :user_email, :user_password, :last_updated, 2)";
        $sel = $this->pdo->prepare($sql);
        $sel->bindValue("user_name", $user_name);
        $sel->bindValue("login_name", $login_name);
        $sel->bindValue("user_email", $user_email);
        $sel->bindValue("user_password", $user_password);
        $sel->bindValue("last_updated", $last_updated_date);


        $sel->execute();

    }

    public function selectUserById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE user_id = $id");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }

    public function updateUser($user_name, $login_name, $email, $id)
    {
        try {

            $sql = $this->pdo->prepare("UPDATE users SET user_name = :user_name, login_name = :login_name, user_email = :email  WHERE user_id = :id");

            $sql->bindParam('user_name', $user_name);
            $sql->bindParam('login_name', $login_name);
            $sql->bindParam('email', $email);
            $sql->bindParam('id', $id);

            $sql->execute();

            $_SESSION['updated'] = true;
        }catch (PDOException $e){
            $_SESSION['updated'] = false;
        }
    }

    public function getCities()
    {
        //select all cities
        $sql = ("SELECT * FROM city");

        $sel = $this->pdo->prepare($sql);

        $sel->execute();

        $result = $sel->fetchAll();

        return $result;
    }

    public function selectVideosById($table, $video_ids)
    {

        $sql = $this->pdo->prepare("SELECT * FROM $table WHERE video_id in ($video_ids)");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function selectAllIdWhereId($table, $column, $id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM $table WHERE $column = '$id'");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function selectAllIdWhereIdFetch($table, $column, $id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM $table WHERE $column = '$id'");
        $sql->execute();

        $results = $sql->fetch(PDO::FETCH_ASSOC);

        return $results;
    }

    public function selectOneIdWhereId($select, $table, $column, $id)
    {
        $sql = $this->pdo->prepare("SELECT $select FROM $table WHERE $column = '$id'");
        $sql->execute();

        $results = $sql->fetch(PDO::FETCH_ASSOC);

        return $results;
    }

    public function selectFavorites($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM favorite_video WHERE users_user_id = '$id'");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function insertVideo($video_name, $video_description, $video_code)
    {
        try {

            $sql = $this->pdo->prepare("insert into videos (video_name, video_description, video_code) VALUES (:video_name, :video_description, :video_code)");

            $sql->bindParam('video_name', $video_name);
            $sql->bindParam('video_description', $video_description);
            $sql->bindParam('video_code', $video_code);

            $sql->execute();

            $error = "false";
        }catch (PDOException $e){
            $error = "true";
        }
        return $error;
    }
    public function insertVideoCategory($video_id, $category_id)
    {

        try {

            $sql = $this->pdo->prepare("insert into multiple_categories (videos_video_id, video_category_category_id) VALUES (:video_id, :category_id)");

            $sql->bindParam('video_id', $video_id);
            $sql->bindParam('category_id', $category_id);

            $sql->execute();

            $error = "false";
        }catch (PDOException $e){
            $error = "true";
        }
        return $error;
    }

    public function insertNewCategory($category_id)
    {

        try {
            $sql = $this->pdo->prepare("insert into video_category (category_description) VALUES (:category_id)");

            $sql->bindParam('category_id', $category_id);

            $sql->execute();

            $error = "false";
        }catch (PDOException $e){

            $error = "true";
        }
        return $error;
    }

}