<?php
class Model{

    static $connections = array();

    public $conf = 'default';
    public $table = false;
    public $db;
    public $primaryKey = 'id';
    public $id;
    public $errors = array();
    public $form;

    public function __construct(){
        // J'initialise quelques variables
        if($this->table === false){
            $this->table = strtolower(get_class($this)).'s';
        }
        //Function servant a recuperer le nom de table en le mettant au pluriel -> changement dans classe model : public $table = ''
        
        // Je me connecte a la base
        $conf = Conf::$databases[$this->conf];
        if(isset(Model::$connections[$this->conf])){
            $this->db = Model::$connections[$this->conf];
            return true;
        }
        try{
            $pdo = new PDO(
                'mysql:host='.$conf['host'].$conf['port'].';dbname='.$conf['database'].';',
                $conf['login'],
                $conf['password'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
            if(Conf::$debug >= 1){
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }

            Model::$connections[$this->conf] = $pdo;
            $this->db = $pdo;
        }catch (PDOException $e){
            if(Conf::$debug >= 1){
                die(print_r($e->getMessage()));
            }else {
                die('Erreur lors de la connexion au système');
            }
        }
    }

    public function find($req){
        $sql = 'SELECT ';

        if(isset($req['fields'])){
            if(is_array($req['fields'])){
                $sql .= implode(', ',$req['fields']);
            }else {
                $sql .= $req['fields'];
            }
        }else {
            $sql .= '*';
        }
        $sql .= ' FROM '.$this->table.' as '.get_class($this).' ';


        //Construction de la condition
        if(isset($req['conditions'])){
            //$sql .= 'WHERE '.$req['conditions'];
            $sql .= 'WHERE ';
            if(!is_array($req['conditions'])){
                $sql .= $req['conditions']; 
            }else {
                $cond = array();
                foreach($req['conditions'] as $k => $v){
                    if(!is_numeric($v)){
                        $v = '"'.addslashes($v).'"';
                        //$cond[] = $k.'='.$v;
                    }
                    $cond[] = "$k=$v";
                    
                }
                $sql .= implode(' AND ', $cond);
            }
        }


        if(isset($req['limit'])){
            //$sql .= 'WHERE '.$req['conditions'];
            $sql .= 'LIMIT '.$req['limit'];
        }


        //die($sql);
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);
    }

    public function findCondDef(){
        $sql = "SELECT * FROM ".$this->table." WHERE online=1 AND type='page'";

        //Construction de la condition
        //die($sql);
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);
    }

    public function findFirst($req){
        return current($this->find($req));
    }

    public function findCount($conditions){
        $res =$this->findFirst(array(
            'fields' => 'COUNT('.$this->primaryKey.') as count',
            'conditions' => $conditions
        ));
        return $res->count; 
        
    }

    public function delete($id){
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = $id";
        $this->db->query($sql);
    }

    public function save($data, $type = null){
        $key = $this->primaryKey;
        $fields = array();
        $d = array();
        
        foreach ($data as $k => $v) {
            if($k!=$this->primaryKey){
                $fields[] = "$k=:$k";
                $d[":$k"] = $v;
            }elseif(!empty($v)) {
                $fields[] = "$k=:$k";
                $d[":$k"] = $v;
            }
            
        }
        /*debug($d);
        die();*/
        
        if(isset($data->$key) && !empty($data->$key)){
            $sql = 'UPDATE '.$this->table.' SET '.implode(',',$fields).' WHERE '.$key.'=:'.$key;
            $this->id = $data->$key;
            //$this->Session->setFlash('Le contenu a bien été édité');
            $action = 'update';

        }else{
            if($type == null){
                $sql = 'INSERT INTO '.$this->table.' SET '.implode(',',$fields);
            }else {
                $sql = 'INSERT INTO '.$this->table.' SET type="'.$type.'",'.implode(',',$fields);
            }
            //$this->Session->setFlash('Le contenu a bien été ajouté');
            $action = 'insert';


        }
        /*debug($data);
        debug($sql);
        die();*/
        $pre = $this->db->prepare($sql);
        $pre->execute($d);
        if ($action == 'insert') {
            $this->id = $this->db->lastInsertId();
        }
        //$this->id = $this->db->lastInsertId();
        //die($this->id);
        //return true;

    }
    

}

?>