<?php

class PostsController extends Controller {

    /*function view($nom){
        $this->set(array(
            'phrase' => 'Salut',
            'nom'    => 'Machin'
        ));
        $this->render('index');
    }*/

    function index(){
        $perPage = 3;
        $this->loadModel('Post');
        $condition = array('online' => 1,'type' => 'post');

        $d['posts'] = $this->Post->find(array(
            'conditions' => $condition,'limit' => ($perPage*($this->request->page-1)).','.$perPage
        ));
        $d['total'] = $this->Post->findCount($condition);
        $d['page'] = ceil($d['total']/$perPage);
        $this->set($d);
    }

    function view($id){
        if($id == NULL){
            $this->e404('Page Introuvable');
        }
        $this->loadModel('Post');
        $d['page'] = $this->Post->findFirst(array(
            'conditions' => array('online' => 1,'id' => $id,'type' => 'post')
        ));
        if(empty($d['page'])){
            $this->e404('Page Introuvable');
        }
        $this->set($d);
    }

    /**
     * ADMIN
     */
    function admin_index(){
        $perPage = 10;
        $this->loadModel('Post');
        $condition = array('type' => 'post');

        $d['posts'] = $this->Post->find(array(
            'conditions' => $condition,'limit' => ($perPage*($this->request->page-1)).','.$perPage
        ));
        $d['total'] = $this->Post->findCount($condition);
        $d['page'] = ceil($d['total']/$perPage);
        $this->set($d);
    }

    /**
     * Permet d'éditer un article
     */
    function admin_edit($id = null){
        $this->loadModel('Post');
        $d['id'] = '';

        if($this->request->data){
            //if($this->Post->validates($this->request->data)){
                $this->Post->save($this->request->data, 'page');
                $this->Session->setFlash('Le contenu à bien été modifié');
                $id = $this->Post->id;
            /*}else {
                $this->Session->setFlash('Merci de corriger vos informations','danger');
                
            }*/
        }
        if($id){
            $this->request->data = $this->Post->findFirst(array('conditions' => array('id'=>$id)));
            $d['id'] = $id;
        }
        $this->set($d);
        
    }


    /**
     * Permet de supprimer un article
     */
    function admin_delete($id){
        $this->loadModel('Post');
        $this->Post->delete($id);
        $this->Session->setFlash('Le contenu à bien été supprimée');

        $this->redirect('admin/posts/index');
    }
    

}
?>
