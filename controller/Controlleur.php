<?php

class ControllerIndex extends Controller {

    /*function view($nom){
        $this->set(array(
            'phrase' => 'Salut',
            'nom'    => 'Machin'
        ));
        $this->render('index');
    }*/

    function index(){
        
        //$this->loadModel('index');
        /*$d['page'] = $this->Post->findFirst(array(
            'conditions' => array(
            'id' => $id,
            )
        ));*/
        /*if(empty($d['page'])){
            $this->e404('Page Introuvable');
        }*/
        //$this->set($d);
        echo 'hello';
        render('index');
    }

    

    
}
?>
