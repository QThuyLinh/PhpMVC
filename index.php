<?php
//Lấy ra được đường dẫn vật lý trên ổ đĩa của file hiện tại
$site_path = dirname(__FILE__);

//định nghĩa các hằng số ở phần site dùng cho ứng dụng ở ngoiaf fontend
define('APP_PATH',$site_path. '/app');
define('CONTROLLER_PATH', $site_path. '/app/controllers');
define('MODEL_PATH',$site_path. '/app/models');
define('VIEW_PATH',$site_path. '/app/views');
define('CORE_PATH',$site_path. '/core');
define('DB_PATH',$site_path. '/core/database');
define('HELPER_PATH',$site_path. '/core/helpers');
define('URL', 'http://localhost:8888/PhpMVC/');
define('URL_ASSETS', 'http://localhost:8888/PhpMVC/assets/');

spl_autoload_register(function ($class_name){
    /**
     * tôi là spl autoload đây
     * tôi sẽ được chạy ngay khi bạn khởi tạo
     * một class hoặc bạn sử dụng hàm class_exists
     */
    $class_file = $class_name . '.php';
    $paths = array(CONTROLLER_PATH, MODEL_PATH, VIEW_PATH, CORE_PATH, DB_PATH, HELPER_PATH);
    if(is_array($paths) && count($paths)){
        foreach ($paths as $path){
            $class_file_path = $path. '/' . $class_file;
            //echo '<br>' . $class_file_path;
            if(file_exists($class_file_path)){
                require $class_file_path;
            }
        }
    }
});

$controller = isset($_REQUEST['controller'])? $_REQUEST['controller'] : 'index';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';

$controller = strtolower($controller);
$action = strtolower($action);

$controllerClass = $controller . 'Controller';
$actionName = $action. 'Action';



echo '<br>Tên class Controller: '. $controllerClass;
echo '<br>Tên action : '. $actionName;


$check = class_exists($controllerClass);
if(class_exists($controllerClass)){
    //class_exists($controllerClass) có tồn tại
    //new indexController()
    //new articleController()
    //new productController()
    $instanceController = new $controllerClass();

    if(method_exists($instanceController, $actionName)){
        $instanceController->$actionName();

    }else{
        $instanceController->indexAction();
    }

}
else{
    $controllerClass = 'errorController';
    $instanceController = new $controllerClass();
    $instanceController->indexAction();

}




