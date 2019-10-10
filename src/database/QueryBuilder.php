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

    public function register($username, $mail, $pass, $zipcode, $phone, $address, $city_id, $payment_method, $customer_type, $last_updated_date)
    {
        //insert de user in de db vergeet niet alle columns!!!!!
        //pass hash
        $sql = "INSERT INTO customers (customer_name, customer_email, 
                                        customer_password, customer_address,
                                        customer_zipcode, customer_phone,
                                        last_updated, payment_method_payment_method_id,
                                        city_city_id, customer_type_customer_type_id)
                VALUES (:name, :email, :password, :address, :zipcode, :phone , :last_updated, :payment, :city, :customer_type)";
        $sel = $this->pdo->prepare($sql);
        $sel->bindValue("name", $username);
        $sel->bindValue("password", $pass);
        $sel->bindValue("email", $mail);
        $sel->bindValue("zipcode", $zipcode);
        $sel->bindValue("address", $address);
        $sel->bindValue("phone", $phone);
        $sel->bindValue("city", $city_id);
        $sel->bindValue("payment", $payment_method);
        $sel->bindValue("customer_type", $customer_type);
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

    public function selectVideoById($table, $video_ids)
    {

        $sql = $this->pdo->prepare("SELECT * FROM videos WHERE video_id in ($video_ids)");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function selectAllIdWhereId($category_id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM multiple_categories WHERE video_category_category_id = '$category_id'");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }


}