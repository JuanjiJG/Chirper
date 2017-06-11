<?php
require_once 'config/database.php';
require_once 'config/functions.php';

// Include all models, controllers and views
foreach(glob("model/*.php") as $file){
    require_once $file;
}
foreach(glob("view/*.php") as $file){
    require_once $file;
}
foreach(glob("controller/*.php") as $file){
    require_once $file;
}

session_start();
if (!isset($_SESSION["user"])) {
    $controller = 'index';
    $action = 'index';
} else {
    $controller = 'cover';
    $action = 'cover';
}

/*
 * Logic for a Front Controller.
 * This controller knows the controller
 * and action to be executed ordered by the user.
 *
 * If there's no controller set in the URL,
 * load the default controller.
 * Otherwise, load the specified controller and action.
 */

if (!isset($_REQUEST['c'])) {
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // If there's no defined controller, but there's a specified action, load it.
    // Otherwise, load the default action
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : $action;
    $controller->{$action}();
} else {
    // Get the controller to load
    $controller = $_REQUEST['c'];
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : $action;

    // Instantiate the controller
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Call to action
    $controller->{$action}();
}
?>