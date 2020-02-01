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
        $datapost = $this->request->data;
        //debug($this->request->data);

        if($datapost){
            if($this->Post->validates($datapost)){
                $datapost->type = 'post';

                if($datapost->online == 1){
                    $datapost->publicated = NULL;
                    
                }else if(isset($datapost->publicated)) {
                    if($datapost->publicated != 'aucune' && $datapost->publicated != NULL && $datapost->publicated != ''){
                        $datapost->online = 2;

                    }else {
                        $datapost->publicated = NULL;

                    }


                }
                //debug($datapost);
                $this->Post->save($datapost);
                $article = '<a target="_blank" href="'.Router::url("posts/view/id:{$this->Post->id}/slug:{$datapost->slug}").'">Voir l\'article<a>';
                $this->Session->setFlash("Le contenu à bien été modifié : $article");
                //$id = $this->Post->id;
                $this->redirect('admin/posts/index');



            }else {
                $this->Session->setFlash('Merci de corriger vos informations','danger');
            }
        }else {
            if($id){
                $this->request->data = $this->Post->findFirst(array('conditions' => array('id'=>$id)));
                $d['id'] = $id;
            }
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

    function admin_online($id){
        $this->loadModel('Post');
        $this->Post->save(array('online' => '0', 'id' => '3'));
        //$this->Session->setFlash('Le contenu à bien été édité');

        $this->redirect('admin/posts/index');
    }
    

}
?>
