<?php

require_once 'models/Produtos.php';

class ProdutosController {

    public function getModel() {
        $produtos = new Produtos();
        return $produtos;
    }
    
    public function get($param1 = null, $param2 = null) {

        if($param1) {

            if($param2 AND is_numeric($param2)) {
                return $this->getModel()->select($param1, $param2);
            } else {
                return $this->getModel()->select($param1);
            }
            
        } else {
            return $this->getModel()->selectAll();
        }
       
    }

    public function post() {
        $data = $_POST;

        return $this->getModel()->insert($data);



    }

    public function update() {

    }

    public function delete() {

    }



}

?>