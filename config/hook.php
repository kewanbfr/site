<?php
if(isset($this->request->prefix)){
    /*if($this->request->prefix == 'admin'){
        $this->layout = 'admin';
    }*/

    $this->layout = $this->request->prefix;

}
?>