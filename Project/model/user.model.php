<?php

class UserModel
{
    /*
     * We define the attributes of the User model.
     * Since they're public, we can access them using e.g. $user->name directly
     */
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $password;
    public $profile_image;

    /*
     * Constructor of the model.
     */
    public function __construct($id, $first_name, $last_name, $username, $password, $profile_image)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->password = $password;
        $this->profile_image = $profile_image;
    }

    public static function getAllUsers()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM users');

        // We create a list of UserModel objects from the database results
        foreach ($req->fetchAll() as $user) {
            $list[] = new UserModel($user['ID'], $user['FIRST_NAME'],
                $user['LAST_NAME'], $user['USERNAME'],
                $user['PASSWORD'], $user['PROFILE_IMAGE']);
        }

        return $list;
    }

    /*
     * Function to get all connected users on the webpage
     */
    public static function getConnectedUsers()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM users WHERE ONLINE = 1');

        // We create a list of UserModel objects from the database results
        foreach ($req->fetchAll() as $user) {
            $list[] = new UserModel($user['ID'], $user['FIRST_NAME'],
                $user['LAST_NAME'], $user['USERNAME'],
                $user['PASSWORD'], $user['PROFILE_IMAGE']);
        }

        return $list;
    }

    /*
     * Function to fund an user in the database providing its id
     */
    public static function findUserById($id)
    {
        $db = Database::getInstance();
        // Make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM users WHERE ID = :id');
        // The query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $user = $req->fetch();

        if (!empty($user)) {
            return new UserModel($user['ID'], $user['FIRST_NAME'],
                $user['LAST_NAME'], $user['USERNAME'],
                $user['PASSWORD'], $user['PROFILE_IMAGE']);
        } else {
            return null;
        }
    }

    /*
     * Function to find an user in the database providing its username
     */
    public static function findUserByUsername($username)
    {
        $db = Database::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE USERNAME = :username');
        // The query was prepared, now we replace :username with our actual $username value
        $req->execute(array('username' => $username));
        $user = $req->fetch();

        if (!empty($user)) {
            return new UserModel($user['ID'], $user['FIRST_NAME'],
                $user['LAST_NAME'], $user['USERNAME'],
                $user['PASSWORD'], $user['PROFILE_IMAGE']);
        } else {
            return null;
        }
    }

    /*
     * Function to get the user info to start a new session on the website
     */
    public static function getLoginInfo()
    {
        $db = Database::getInstance();

        // Build the query
        $query = "SELECT * FROM users WHERE USERNAME = :username AND PASSWORD = :password";

        // Prepare the SQL query to avoid SQL injection
        $result = $db->prepare($query);

        // Get the form data without special characters to avoid code injection
        $username = htmlentities(addslashes($_POST["username"]));
        $password = htmlentities(addslashes(hash("sha256", $_POST["password"])));

        // Bind values of query with form data
        $result->bindValue(":username", $username);
        $result->bindValue(":password", $password);

        // Execute the query
        $result->execute();
        $user_data = $result->fetch();

        if (!empty($user_data)) {
            return new UserModel($user_data['ID'], $user_data['FIRST_NAME'],
                $user_data['LAST_NAME'], $user_data['USERNAME'],
                $user_data['PASSWORD'], $user_data['PROFILE_IMAGE']);
        } else {
            return null;
        }
    }

    /*
     * Function to add a new user to the database
     */
    public static function addNewUser()
    {
        $db = Database::getInstance();

        // Build the query
        $query = "INSERT INTO users (ID, FIRST_NAME, LAST_NAME, USERNAME, PASSWORD, PROFILE_IMAGE, `ONLINE`) VALUES (NULL, :first_name, :last_name, :username, :password, 'img/users/default-user.jpg', '0')";

        // Prepare the SQL query to avoid SQL injection
        $result = $db->prepare($query);

        // Get the form data without special characters to avoid code injection
        $first_name = htmlentities(addslashes($_POST["first-name"]));
        $last_name = htmlentities(addslashes($_POST["last-name"]));
        $username = htmlentities(addslashes($_POST["username"]));
        $password = htmlentities(addslashes(hash("sha256", $_POST["password"])));

        // Bind values of query with form data
        $result->bindValue(":first_name", $first_name);
        $result->bindValue(":last_name", $last_name);
        $result->bindValue(":username", $username);
        $result->bindValue(":password", $password);

        // Execute the query
        $good_registration = $result->execute();

        if ($good_registration) {
            $user_data = self::findUserByUsername($username);

            return new UserModel($user_data->id, $user_data->first_name,
                $user_data->last_name, $user_data->username,
                $user_data->password, $user_data->profile_image);
        } else {
            return null;
        }
    }

    public static function editUser()
    {
        $db = Database::getInstance();

        // Build the query
        $query = "UPDATE users SET FIRST_NAME = :first_name, LAST_NAME = :last_name, USERNAME = :username, PASSWORD = :password WHERE users.ID = :id";

        // Prepare the SQL query to avoid SQL injection
        $result = $db->prepare($query);

        // Get the form data without special characters to avoid code injection
        $first_name = htmlentities(addslashes($_POST["edit-first-name"]));
        $last_name = htmlentities(addslashes($_POST["edit-last-name"]));
        $username = htmlentities(addslashes($_POST["edit-username"]));
        $id = htmlentities(addslashes($_POST["user-id"]));
        $password = htmlentities(addslashes(hash("sha256", $_POST["edit-password"])));

        // Bind values of query with form data
        $result->bindValue(":first_name", $first_name);
        $result->bindValue(":last_name", $last_name);
        $result->bindValue(":username", $username);
        $result->bindValue(":id", $id);
        $result->bindValue(":password", $password);

        // Execute the query
        $result->execute();
        $rows_count = $result->rowCount();

        if ($rows_count != 0) {
            $user_data = self::findUserByUsername($username);

            return new UserModel($user_data->id, $user_data->first_name,
                $user_data->last_name, $user_data->username,
                $user_data->password, $user_data->profile_image);
        } else {
            return null;
        }
    }

    public static function setUserStatus($status, $user_info)
    {
        $db = Database::getInstance();

        // Make sure the status is an integer value
        $status = intval($status);

        // Build the query
        $query = "UPDATE users SET ONLINE = :status WHERE users.ID = :id";

        // Prepare the SQL query to avoid SQL injection
        $result = $db->prepare($query);

        // Get the data without special characters to avoid code injection
        $status = htmlentities(addslashes($status));
        $user_info->id = htmlentities(addslashes($user_info->id));

        // Bind values of query with form data
        $result->bindValue(":status", $status);
        $result->bindValue(":id", $user_info->id);

        // Execute the query
        $result->execute();
        $rows_count = $result->rowCount();

        if ($rows_count != 0) {
            return true;
        } else {
            return false;
        }
    }
}