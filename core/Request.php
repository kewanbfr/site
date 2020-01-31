<?php
class Request{

    public $url; //URL appelé par l'utilsiateur
    public $page = 1;
    public $prefix = '';
    public $data = false;
    //public $PATH_INFO = $_SERVER['PATH_INFO'];

    function __construct(){
        $this->url = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/';
        //$this->url = $_SERVER['PATH_INFO'];

        if(isset($_GET['page'])){
            if(is_numeric($_GET['page'])){
                if($_GET['page'] > 0){
                    $this->page = round($_GET['page']);

                }
            }
        }

        if(!empty($_POST)){
            $this->data = new stdClass();
            foreach ($_POST as $k => $v) {
                $this->data->$k=$v;
            }
            //debug($this->data);
        }
    }
    
}

?>