<?php

class Produtos {

    private function getDb() {
        $db = new PDO('mysql: host=localhost; dbname=mercado;', 'root', '');
        return $db;
    }


    public function select($param1, $param2=null) {
        $query = 'SELECT nome, tipo, preco, imposto FROM tb_produtos WHERE nome LIKE :dado OR tipo LIKE :dado OR preco LIKE :dado';
        $stmt = $this->getDb()->prepare($query);

        $stmt->bindValue(':dado', '%'.$param1.'%');


        $stmt->execute();

        $resultado = $stmt->FetchAll(PDO::FETCH_ASSOC);
        
        if($stmt->rowCount() > 0) {
            if($param2) {
                
                foreach ($resultado as $key => $dado) {
                    $resultado[$key]['quantidade'] = $param2;
                    $resultado[$key]['total'] = number_format((float)$dado['preco'] * $param2, 2);
                    $resultado[$key]['total_imposto'] = number_format(((float)$dado['imposto']/100) * $resultado[$key]['total'], 2);

                } 
            }

            return $resultado;
        } else {
            return throw new Exception('Dados inexistentes');
        }
    }

    public function selectAll() {
        
        $query = 'SELECT nome, tipo, preco, imposto FROM tb_produtos';
        $stmt = $this->getDb()->prepare($query);

        $stmt->execute();

        $resultado = $stmt->FetchAll(PDO::FETCH_ASSOC);
        
        if($stmt->rowCount() > 0) {
            return $resultado;
        } else {
            return throw new Exception('Dados inexistentes');
        }
    }


    public function insert($data) {
        $query = 'INSERT INTO tb_produtos(nome, tipo, preco, imposto)VALUES(:nome, :tipo, :preco, :imposto)';
        $stmt = $this->getDb()->prepare($query);

        @$stmt->bindValue(':nome', $data['nome']);
        @$stmt->bindValue(':tipo', $data['tipo']);
        @$stmt->bindValue(':preco', $data['preco']);
        @$stmt->bindValue(':imposto', $data['imposto']);
        @$stmt->execute();
        
        
        if($stmt->rowCount() > 0) {
            return 'Dados inseridos com sucesso!';
        } else {
            return throw new Exception('Ocorreu um erro ao inserir os dados. Mensagem: ' . $e->getMessage());
        }
        
    }

}

?>