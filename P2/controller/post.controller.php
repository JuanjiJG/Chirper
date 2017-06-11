<?php

/*
 * This class is the Controller of a Post page of Chirper
 */
class PostController
{
    public $all_users;
    public $connected_users;

    /*
     * Constructor of the class.
     * The constructor loads the lists of all users and connected users.
     * This is made because both lists are used in the post detail page.
     */
    function __construct()
    {
        $this->all_users = UserModel::getAllUsers();
        $this->connected_users = UserModel::getConnectedUsers();
    }

    /*
     * Default action when entering the Cover page.
     * This function calls the PostView class to create the layout.
     */
    public function detail()
    {
        $cover_user = UserModel::findUserById($_SESSION["user"]->id);
        $post_detail = PostModel::getPostById($_REQUEST["post_id"]);
        $comments = CommentModel::getCommentsOfPostById($_REQUEST["post_id"]);
        $photo = PhotoModel::getPhotoByPostId($_REQUEST["post_id"]);
        $post_view = new PostView($cover_user, $this->all_users, $this->connected_users, $comments, $post_detail, $photo);
        $post_view->viewPost();
    }

    /*
     * Action for publishing a new comment.
     */
    public function comment()
    {
        $good_result = CommentModel::addNewComment();

        if ($good_result) {
            header("location:index.php?c=post&a=detail&post_id=" . $_POST["post-id"]);
        } else {
            header("location:index.php?c=post&a=detail&post_id=" . $_POST["post-id"]);
        }
    }

    /*
     * Action for publishing a new post.
     */
    public function post()
    {
        $good_result = PostModel::addNewPost();

        if ($good_result) {
            header("location:index.php?c=cover&a=biography&user=" . $_SESSION["user"]->id);
        } else {
            header("location:index.php?c=cover&a=biography&user=" . $_SESSION["user"]->id);
        }
    }
}

?>