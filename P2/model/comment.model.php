<?php

class CommentModel
{
    /*
     * We define the attributes of the Comment model.
     * Since they're public, we can access them using e.g. $comment->content directly
     */
    public $id;
    public $author_id;
    public $post_id;
    public $content;
    public $date;
    public $first_name;
    public $profile_image;

    /*
     * Constructor of the model.
     */
    public function __construct($id, $author_id, $post_id, $content, $date, $first_name, $profile_image)
    {
        $this->id = $id;
        $this->author_id = $author_id;
        $this->post_id = $post_id;
        $this->content = $content;
        $this->date = $date;
        $this->first_name = $first_name;
        $this->profile_image = $profile_image;
    }

    public static function getCommentsOfPostById($id)
    {
        $list = [];
        $db = Database::getInstance();

        // Make sure $id is an integer
        $id = intval($id);

        $req = $db->prepare(
            'SELECT
                comments.ID,
                comments.AUTHOR_ID,
                comments.POST_ID,
                comments.DATE,
                comments.CONTENT,
                users.FIRST_NAME,
                users.PROFILE_IMAGE
            FROM
	            comments
		            JOIN users
			            ON comments.AUTHOR_ID=users.ID
            WHERE
                comments.POST_ID = :id
            ORDER BY comments.DATE ASC'
        );

        // The query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        // We create a list of PostModel objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new CommentModel($post['ID'], $post['AUTHOR_ID'],
                $post['POST_ID'], $post['CONTENT'], $post['DATE'],
                $post['FIRST_NAME'], $post['PROFILE_IMAGE']);
        }

        return $list;
    }

    public static function addNewComment()
    {
        $db = Database::getInstance();

        // Build the query
        $query = "INSERT INTO comments (ID, AUTHOR_ID, POST_ID, DATE, CONTENT) VALUES (NULL, :author_id, :post_id, :date, :content)";

        // Prepare the SQL query to avoid SQL injection
        $result = $db->prepare($query);

        // Get today's date
        $now = new DateTime();

        // Get the form data without special characters to avoid code injection
        $author_id = htmlentities(addslashes($_POST["user-id"]));
        $post_id = htmlentities(addslashes($_POST["post-id"]));
        $date = $now->format('Y-m-d H:i:s');
        $content = htmlentities(addslashes($_POST["content"]));

        // Bind values of query with form data
        $result->bindValue(":author_id", $author_id);
        $result->bindValue(":post_id", $post_id);
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

?>