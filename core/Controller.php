<?php
class Controller{

    public $request;
    private $vars     = array();
    public $layout    = 'default';
    private $rendered = false;

    function __construct($request = null){
        if($request){
            $this->request = $request;
            require(ROOT.DS.'config'.DS.'hook.php');

        }
    }

    /**
     * Permet de rendre une vue
     * @param $view Fichier à rendre (chemin depuis view ou nom de la vue)
     */
    public function render($view){
        if($this->rendered){ return false; }
        extract($this->vars);
        if(strpos($view, '/')===0){
            $view = ROOT.DS.'view'.$view.'.php';
        }else {
            $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
        }
        ob_start();
        require($view);
        $content_for_layout = ob_get_clean();
        require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
        $this->rendered = true;
    }

    /**
     * Permet de passer une ou plusieurs variables à la vue
     * @param $key nom de la variable Ou tableau de variables
     * @param $value Valeur de la variable
     */
    public function set($key, $value=null){
        if(is_array($key)){
            $this->vars += $key;
        }else {
        $this->vars[$key] = $value;
        }
    }

    /**
     * Permet de charger un model au niveau du controller
     */
    public function loadModel($name){
        if(!isset($this->$name)){
            $file = ROOT.DS.'model'.DS.$name.'.php';
            require_once($file);
            $this->$name = new $name();
            if(isset($this->Form)) {
                $this->$name->Form = $this->Form;
            }

        }
    }

    /**
     * Permet de gérer les erreurs 404
     */
    function e404($message){
        header("HTTP/1.0 404 Not Found");
        $this->set('message', $message);
        
        $this->render('/errors/404');
        die();
    }

    /**
     * Permet d'appeler un controleur depuis une vue
     */
    function request($controller, $action){
        $controller .= 'Controller';
        require_once ROOT.DS.'controller'.DS.$controller.'.php';
        $c = new $controller;
        return $c->$action();
    }

    /**
     * Redirect
     */
    function redirect($url, $code = null){
        if($code == 301){
            header("HTTP/1.0 301 Moved Permanently");
        }
        header("Location: ".Router::url($url));
    }

}

?>