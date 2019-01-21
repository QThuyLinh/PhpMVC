<?php
class indexController{
    //đây là phương thức khởi tạo của 1 class
    //sẽ được chyaj ngay ngay khi class được khởi tạo qua từ khóa new
    // ví dụ $controller = new indexController();
    public function __construct()
    {

    }

    public function indexAction(){

        echo '<br> tôi là indexAction đây' ;
        echo '<br>'. __METHOD__;
    }
}