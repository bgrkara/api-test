<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json;charset=UTF8');
require_once 'config/database.php';
require_once 'System/Controller.php';
require_once 'Route/Router.php';
require_once 'Helper/helper.php';
$database = new Database();
//User Route
Router::start('/user/list', 'userController@getAllUser');
Router::start('/user/create', 'userController@store');
Router::start('/user/single/{param}', 'userController@info');
Router::start('/user/login', 'userController@login');
Router::start('/user/update', 'userController@update');
//Product Route
Router::start('/product/list', 'productController@getAllProduct');
Router::start('/product/add', 'productController@productAdd');
Router::start('/product/single/{param}', 'productController@productSingle');
Router::start('/product/update', 'productController@productUpdate');



//$token = md5(sha1('kara1453*'));
//

//
//// Message Array
//$returnStatus = [];
//$returnStatus['status'] = false;
//
//if (isset($_GET['token'])){
//
//    if ($_GET['token'] === $token){
//            $action = $_GET['action'];
//            $process = $_GET['process'];
//
//            $path = 'Api/'. $action . '/' . $process . '.php';
//            if (file_exists($path)){
//                require_once 'Api/'. $action . '/' . $process . '.php';
//                echo json_encode($returnStatus);
//            }else{
//                die('Page is Not Found');
//            }
//    }
//}else{
//    die('Token Hatalı');
//}
