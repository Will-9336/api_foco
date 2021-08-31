<?php

require_once 'controllers/ProdutosController.php';

class Api {

    public static function open() {
        $url = explode('/', $_GET['url']);
        
        $class = ucfirst($url[0]) . 'Controller';
        array_shift($url);

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        try {
            if(class_exists($class)) {
                $resultado = call_user_func_array(array(new $class, $method), $url);
                echo json_encode(array('status' => 'sucesso', 'dados' => $resultado), JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(array('status' => 'erro', 'dados' => 'Classe inexistente!'));
            }
        } catch(Exception $e) {
            echo json_encode(array('status' => 'erro', 'dados' => $e->getMessage()), JSON_UNESCAPED_UNICODE);
        }
    }
    
}



if(isset($_GET['url'])) {
    Api::open();
} else {
    echo json_encode(array('status' => 'erro', 'dados' => 'Rota não inserida!'), JSON_UNESCAPED_UNICODE);
}

?>
