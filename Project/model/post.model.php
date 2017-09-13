<?php

class PostModel
{
    /*
     * We define the attributes of the Post model.
     * Since they're public, we can access them using e.g. $post->title directly
     */
    public $id;
    public $author_id;
    public $title;
    public $content;
    public $date;
    public $first_name;
    public $profile_image;

    /*
     * Constructor of the model.
     */
    public function __construct($id, $title, $content, $date, $author_id, $first_name, $profile_image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->author_id = $author_id;
        $this->first_name = $first_name;
        $this->profile_image = $profile_image;
    }

    public static function getLastPosts()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query(
            'SELECT
                posts.ID,
                posts.TITLE,
                posts.CONTENT,
                posts.DATE,
                posts.AUTHOR_ID,
                users.FIRST_NAME,
                users.PROFILE_IMAGE
            FROM
	            posts
		            JOIN users
			            ON posts.AUTHOR_ID=users.ID
            ORDER BY posts.DATE DESC');

        // we create a list of PostModel objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new PostModel($post['ID'], $post['TITLE'],
                $post['CONTENT'], $post['DATE'], $post['AUTHOR_ID'],
                $post['FIRST_NAME'], $post['PROFILE_IMAGE']);
        }

        return $list;
    }

    public static function getPostById($id)
    {
        $db = Database::getInstance();
        // Make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare(
            'SELECT
                posts.ID,
                posts.TITLE,
                posts.CONTENT,
                posts.DATE,
                posts.AUTHOR_ID,
                users.FIRST_NAME,
                users.PROFILE_IMAGE
            FROM
	            posts
		            JOIN users
			            ON posts.AUTHOR_ID=users.ID
            WHERE posts.ID = :id');
        // The query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $user = $req->fetch();

        if (!empty($user)) {
            return new PostModel($user['ID'], $user['TITLE'],
                $user['CONTENT'], $user['DATE'], $user['AUTHOR_ID'],
                $user['FIRST_NAME'], $user['PROFILE_IMAGE']);
        } else {
            return null;
        }
    }

    public static function getPostsOfUserById($id)
    {
        $list = [];
        $db = Database::getInstance();

        // Make sure $id is an integer
        $id = intval($id);

        $req = $db->prepare(
            'SELECT
                posts.ID,
                posts.TITLE,
                posts.CONTENT,
                posts.DATE,
                posts.AUTHOR_ID,
                users.FIRST_NAME,
                users.PROFILE_IMAGE
            FROM
	            posts
		            JOIN users
			            ON posts.AUTHOR_ID=users.ID
            WHERE
                posts.AUTHOR_ID = :id
            ORDER BY posts.DATE DESC'
        );

        // The query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        // We create a list of PostModel objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new PostModel($post['ID'], $post['TITLE'],
                $post['CONTENT'], $post['DATE'], $post['AUTHOR_ID'],
                $post['FIRST_NAME'], $post['PROFILE_IMAGE']);
        }

        return $list;
    }

    public static function addNewPost()
    {
        $db = Database::getInstance();

        // Build the query
        $query = "INSERT INTO posts (ID, AUTHOR_ID, TITLE, CONTENT, DATE) VALUES (NULL, :author_id, :title, :content, :date)";

        // Prepare the SQL query to avoid SQL injection
        $result = $db->prepare($query);

        // Get today's date
        $now = new DateTime();

        // Get the form data without special characters to avoid code injection
        $author_id = htmlentities(addslashes($_POST["user-id"]));
        $title = htmlentities(addslashes($_POST["title"]));
        $date = $now->format('Y-m-d H:i:s');
        $content = htmlentities(addslashes($_POST["content"]));

        // Bind values of query with form data
        $result->bindValue(":author_id", $author_id);
        $result->bindValue(":title", $title);
        $result->bindValue(":date", $date);
        $result->bindValue(":content", $content);

        // Execute the query
        $good_registration = $result->execute();

        if ($good_registration) {
            return true;
        } else {
            return false;
        }
    }
}