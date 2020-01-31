<?php

class IndexController extends Controller {

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
        //echo 'hello';
        $this->render('index');
    }

    function admin_index(){
        /*$perPage = 10;
        $this->loadModel('Post');
        $condition = array('type' => 'post');

        $d['posts'] = $this->Post->find(array(
            'conditions' => $condition,'limit' => ($perPage*($this->request->page-1)).','.$perPage
        ));
        $d['total'] = $this->Post->findCount($condition);
        $d['page'] = ceil($d['total']/$perPage);
        $this->set($d);*/
        //$this->render('admin_index');

        
    }

    
}
?>