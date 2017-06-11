<?php

class CoverView
{
    private $connected_users;
    private $all_users;
    private $posts;
    private $cover_user;

    function __construct($cover_user, $all_users, $connected_users, $posts)
    {
        $this->cover_user = $cover_user;
        $this->connected_users = $connected_users;
        $this->all_users = $all_users;
        $this->posts = $posts;
    }

    public function viewCover()
    {
        $head_footer_view = new HeadFooterView();
        $head_footer_view->viewHead("Portada");
        $this->viewCoverHeader();
        $this->viewAllUsers();
        $this->viewPosts();
        $this->viewConnectedUsers();
        $head_footer_view->viewFooter();
    }

    public function viewBiography()
    {
        $head_footer_view = new HeadFooterView();
        $head_footer_view->viewHead("Biografía de " . $this->cover_user->first_name);
        $this->viewCoverHeader();
        $this->viewAllUsers();
        $this->viewPosts();
        $this->viewConnectedUsers();
        $head_footer_view->viewFooter();
    }

    public function viewPhotos()
    {
        $head_footer_view = new HeadFooterView();
        $head_footer_view->viewHead("Fotos de " . $this->cover_user->first_name);
        $this->viewCoverHeader();
        $this->viewAllUsers();
        $this->viewPhotosWall();
        $this->viewConnectedUsers();
        $head_footer_view->viewFooter();
    }

    public function viewProfile()
    {
        $head_footer_view = new HeadFooterView();
        $head_footer_view->viewHead("Información sobre " . $this->cover_user->first_name);
        $this->viewCoverHeader();
        $this->viewProfileInfo();
        $head_footer_view->viewFooter();
    }

    private function viewProfileInfo()
    {
        require_once "pages/profile.php";
    }

    private function viewAllUsers()
    {
        require_once "pages/all_users.php";
    }

    private function viewConnectedUsers()
    {
        require_once "pages/connected_users.php";
    }

    private function viewPosts()
    {
        require_once "pages/posts.php";
    }

    private function viewPhotosWall()
    {
        require_once "pages/photos.php";
    }

    private function viewCoverHeader()
    {
        require_once "pages/cover_header.php";
    }
}

?>