<?php

/*
 * This class is the Controller of the Cover page of Chirper
 */
class CoverController
{
    public $all_users;
    public $connected_users;

    /*
     * Constructor of the class.
     * The constructor loads the lists of all users and connected users.
     * This is made because both lists are used in every section of the cover
     */
    function __construct()
    {
        $this->all_users = UserModel::getAllUsers();
        $this->connected_users = UserModel::getConnectedUsers();
    }

    /*
     * Default action when entering the Cover page
     * If the user parameter is not specified, load the logged user cover.
     * Otherwise, load the biography of the specified user
     */
    public function cover()
    {
        if (isset($_REQUEST["user"])) {
            $this->biography();
        } else {
            $cover_user = UserModel::findUserById($_SESSION["user"]->id);
            $last_posts = PostModel::getLastPosts();
            $cover_view = new CoverView($cover_user, $this->all_users, $this->connected_users, $last_posts);
            $cover_view->viewCover();
        }
    }

    /*
     * Function to load the biography of the specified user
     */
    public function biography()
    {
        $cover_user = UserModel::findUserById($_REQUEST["user"]);
        $user_posts = PostModel::getPostsOfUserById($_REQUEST["user"]);
        $cover_view = new CoverView($cover_user, $this->all_users, $this->connected_users, $user_posts);
        $cover_view->viewBiography();
    }

    /*
     * Function to load the photo gallery of the specified user
     */
    public function photos()
    {
        $cover_user = UserModel::findUserById($_REQUEST["user"]);
        $user_photos = PhotoModel::getPhotosOfUserById($_REQUEST["user"]);
        $cover_view = new CoverView($cover_user, $this->all_users, $this->connected_users, $user_photos);
        $cover_view->viewPhotos();
    }

    /*
     * Function to load the profile page of the specified user
     */
    public function profile()
    {
        $cover_user = UserModel::findUserById($_REQUEST["user"]);
        $cover_view = new CoverView($cover_user, $this->all_users, $this->connected_users, "");
        $cover_view->viewProfile();
    }
}

?>