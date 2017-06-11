<?php

class IndexController
{
    private $index_view;

    function __construct()
    {
        $this->index_view = new IndexView();
    }

    public function index() {
        $this->index_view->viewIndex('index');
    }

    public function contact() {
        $this->index_view->viewIndex('contact');
    }
}
?>