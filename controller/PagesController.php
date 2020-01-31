<?php

class PagesController extends Controller {

    /*function view($nom){
        $this->set(array(
            'phrase' => 'Salut',
            'nom'    => 'Machin'
        ));
        $this->render('index');
    }*/

    function view($id){
        if($id == NULL){
            $this->e404('Page Introuvable');
        }
        $this->loadModel('Post');
        $d['page'] = $this->Post->findFirst(array(
            'conditions' => array(
            'id' => $id,
            )
        ));
        if(empty($d['page'])){
            $this->e404('Page Introuvable');
        }
        
        /*$d['pages'] = $this->Post->find(array(
            'conditions' => array('type' => 'page')
        ));*/

        $this->set($d);
    }

    /**
     * Permet de récupérer les pages pour le menu
     */
    function getMenu(){
        $this->loadModel('Post');
        return $this->Post->findCondDef();
    }

    /**
     * ADMIN
     */
    function admin_index(){
        $perPage = 10;
        $this->loadModel('Post');
        $condition = array('type' => 'page');

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
            if($this->Post->validates($this->request->data)){
                //$this->Post->save($this->request->data, 'page');
                $this->Session->setFlash('Le contenu à bien été modifié');
                $id = $this->Post->id;
            }else {

            }
            
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
