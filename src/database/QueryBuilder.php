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

        $sql = $this->pdo->prepare("SELECT * FROM users WHERE login_name ='$login_name' or user_email ='$login_name' AND user_password = '$password'");
        try {
            $sql->execute();

            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            $message = false;
        } catch (PDOException $e) {
            $message = true;
        }

        return $output[] = [$results, $message];

    }

    public function register($user_name, $login_name, $user_email, $user_password, $last_updated_date)
    {

        $sql = "INSERT INTO users (user_name, login_name, user_email, user_password, last_updated, roles_role_id)
                VALUES (:user_name, :login_name, :user_email, :user_password, :last_updated, 2)";
        $sel = $this->pdo->prepare($sql);
        $sel->bindValue("user_name", $user_name);
        $sel->bindValue("login_name", $login_name);
        $sel->bindValue("user_email", $user_email);
        $sel->bindValue("user_password", $user_password);
        $sel->bindValue("last_updated", $last_updated_date);

        try {
            $sel->execute();
            $message = false;
        } catch (Exception $e) {
            $message = true;
        }

        return $message;
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

        $sql = $this->pdo->prepare("UPDATE users SET user_name = :user_name, login_name = :login_name, user_email = :email  WHERE user_id = :id");

        $sql->bindParam('user_name', $user_name);
        $sql->bindParam('login_name', $login_name);
        $sql->bindParam('email', $email);
        $sql->bindParam('id', $id);

        try {
            $sql->execute();
            $message = false;
        } catch (Exception $e) {
            $message = true;

        }

        return $message;

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

    public function selectIfEmailLoginExists($login)
    {
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE login_name = '$login' OR user_email = '$login'");
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

    public function selectIfVideoFavorite($id, $video_id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM favorite_video WHERE users_user_id = '$id' AND videos_video_id = '$video_id'");
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
        } catch (PDOException $e) {
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
        } catch (PDOException $e) {
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
        } catch (PDOException $e) {

            $error = "true";
        }
        return $error;
    }

    public function deleteMultipleCategories($video_id)
    {

        try {
            $sql = $this->pdo->prepare("DELETE FROM `multiple_categories` 
            WHERE `videos_video_id` = :video_id ");

            $sql->bindParam('video_id', $video_id);

            $sql->execute();

            $error = "false";
        } catch (PDOException $e) {

            die($e->getMessage());
        }
        return $error;
    }

    public function deleteVideoFromFavorites($video_id)
    {

        try {
            $sql = $this->pdo->prepare("DELETE FROM `favorite_video` 
            WHERE `videos_video_id` = :video_id ");

            $sql->bindParam('video_id', $video_id);

            $sql->execute();

            $error = "false";
        } catch (PDOException $e) {

            die($e->getMessage());
        }
        return $error;
    }

    public function deleteVideo($video_id)
    {

        try {
            $sql = $this->pdo->prepare("DELETE FROM `videos` 
            WHERE `videos`.`video_id` = :video_id ");

            $sql->bindParam('video_id', $video_id);

            $sql->execute();

            $error = "false";
        } catch (PDOException $e) {

            die($e->getMessage());
        }
        return $error;
    }

    public function deleteCategory($category_id)
    {

        try {
            $sql = $this->pdo->prepare("DELETE FROM `video_category` 
            WHERE `video_category`.`category_id` = :category ");

            $sql->bindParam('category', $category_id);

            $sql->execute();

            $error = "false";
        } catch (PDOException $e) {
            $error = "true";
        }
        return $error;
    }

    public function updateVideo($video_name, $video_description, $video_code, $video_id)
    {
        try {


            $sql = $this->pdo->prepare("UPDATE `videos` SET `video_name`=:video_name,`video_description`=:video_description,`video_code`=:video_code WHERE video_id = :video_id");

            $sql->bindParam('video_id', $video_id);
            $sql->bindParam('video_code', $video_code);
            $sql->bindParam('video_description', $video_description);
            $sql->bindParam('video_name', $video_name);

            $sql->execute();

        } catch (Exception $e) {
            $message = true;
        }
    }

    public function updateCategory($category_description, $category_id)
    {
        $sql = $this->pdo->prepare("UPDATE `video_category` SET `category_description`=:category_description WHERE category_id = :category_id");

        $sql->bindParam('category_description', $category_description);
        $sql->bindParam('category_id', $category_id);

        $sql->execute();
    }

    public function updateCategoryVideo($category_description, $category_id)
    {
        $sql = $this->pdo->prepare("UPDATE `video_category` SET `category_description`=:category_description WHERE category_id = :category_id");

        $sql->bindParam('category_description', $category_description);
        $sql->bindParam('category_id', $category_id);

        $sql->execute();
    }


    public function addToken($token, $email)
    {
        $sql = "UPDATE users SET authentication_date = CURRENT_TIMESTAMP,
                authentication_token = :tn
                WHERE user_email = :em
                OR login_name = :em";

        $sql = $this->pdo->prepare($sql);

        $sql->bindParam('tn', $token);
        $sql->bindParam('em', $email);

        $sql->execute();
    }

    public function resetToken($token, $user_id)
    {
        $sql = "UPDATE users SET authentication_date = NULL,
                authentication_token = NULL
                WHERE user_id = :id";

        $sql = $this->pdo->prepare($sql);

        $sql->bindParam('id', $user_id);

        $sql->execute();
    }

    public function checkToken($token)
    {
        $sql = "select * from users where authentication_token = '$token'";

        $sql = $this->pdo->prepare($sql);

        $sql->execute();

        $results = $sql->fetch(PDO::FETCH_ASSOC);


        return $results;
    }

    public function updatePassword($password, $id)
    {
        $sql = "UPDATE users SET user_password = :pass
                WHERE user_id = :id";

        $sql = $this->pdo->prepare($sql);
        $sql->bindParam('pass', $password);
        $sql->bindParam('id', $id);

        $sql->execute();

    }

    public function deleteFromFavorites($user_id, $video_id)
    {


        $sql = $this->pdo->prepare("DELETE FROM `favorite_video` 
            WHERE `videos_video_id` = :video_id And users_user_id = :users_user_id");

        $sql->bindParam('video_id', $video_id);
        $sql->bindParam('users_user_id', $user_id);

        try {
            $sql->execute();

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function addToFavorites($user_id, $video_id)
    {


        $sql = "INSERT INTO favorite_video (users_user_id, videos_video_id)
                VALUES (:users_user_id, :videos_video_id)";

        $sel = $this->pdo->prepare($sql);
        $sel->bindValue("users_user_id", $user_id);
        $sel->bindValue("videos_video_id", $video_id);

        try {
            $sel->execute();

        } catch (PDOException $e) {

            die($e->getMessage());
        }
    }


}