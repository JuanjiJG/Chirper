<?php

class HeadFooterView
{
    public $title;

    public function viewHead($title)
    {
        $this->title = $title;
        require_once "pages/head.php";
    }

    public function viewFooter()
    {
        require_once "pages/footer.php";
    }
}

?>