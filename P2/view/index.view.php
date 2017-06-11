<?php

class IndexView
{
    public function viewIndex($section)
    {
        require_once "head_footer.view.php";
        $head_footer_view = new HeadFooterView();

        switch ($section) {
            case "index":
                $head_footer_view->viewHead("Página de inicio");
                $this->viewHeader();
                $this->viewIndexBase();
                $this->viewRegisterForm();
                $head_footer_view->viewFooter();
                break;
            case "contact":
                $head_footer_view->viewHead("Información de contacto");
                $this->viewHeader();
                $this->viewIndexBase();
                $this->viewContactInformation();
                $head_footer_view->viewFooter();
                break;
        }
    }

    private function viewIndexBase()
    {
        require_once "pages/index_base.php";
    }

    private function viewRegisterForm()
    {
        require_once "pages/register_form.php";
    }

    private function viewContactInformation()
    {
        require_once "pages/contact.php";
    }

    private function viewHeader()
    {
        if (isset($_SESSION["user"])) {
            require_once "pages/cover_header.php";
        } else {
            require_once "pages/index_header.php";
        }

    }
}

?>