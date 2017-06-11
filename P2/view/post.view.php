<?php

class PostView
{
    private $cover_user;
    private $connected_users;
    private $all_users;
    private $comments;
    private $post_detail;
    private $photo;

    function __construct($cover_user, $all_users, $connected_users, $comments, $post_detail, $photo)
    {
        $this->cover_user = $cover_user;
        $this->connected_users = $connected_users;
        $this->all_users = $all_users;
        $this->comments = $comments;
        $this->post_detail = $post_detail;
        $this->photo = $photo;
    }

    public function viewPost()
    {
        $head_footer_view = new HeadFooterView();
        $head_footer_view->viewHead($this->post_detail->title);
        $this->viewCoverHeader();
        $this->viewAllUsers();
        $this->viewPostDetail();
        $this->viewConnectedUsers();
        $head_footer_view->viewFooter();
    }

    private function viewPostDetail()
    {
        require_once "pages/post_detail.php";
    }

    private function viewAllUsers()
    {
        require_once "pages/all_users.php";
    }

    private function viewConnectedUsers()
    {
        require_once "pages/connected_users.php";
    }

    private function viewCoverHeader()
    {
        require_once "pages/cover_header.php";
    }
}

?>