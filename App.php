<?php
require_once 'controller/Withdraw.php';

class App {

    private $withdraw = NULL;

    public function __construct() {
        $this->withdraw = new Withdraw();
    }

    public function handleRequest() {
        $action = isset($_GET['action'])?$_GET['action']:NULL;
        try {
            if ( !$action || $action == 'list' ) {
                $this->withdraw->lists();
            } elseif ( $action == 'add' ) {
                $this->withdraw->add();
            } elseif ( $action == 'check' ) {
                $this->withdraw->check();
            } elseif ( $action == 'create' ) {
                $this->withdraw->create();
            } else {
                $this->showError("Page not found", "Action for operation ".$action." was not found!");
            }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
        // $this->showPage($action, $res);
    }

    public function redirect($location) {
        header('Location: '.$location);
    }

    public function showPage($title, $data, $page = '') {
        include 'view/header.php';
        include 'view/'.$page.'.php';
        include 'view/footer.php';
    }

    public function showError($title, $message) {
        include 'view/error.php';
    }
}
?>