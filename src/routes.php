<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
use Slim\Http\Request;
use Slim\Http\Response;
// Routes
$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
//LISTAR CONTATOS
$app->get('/lista_pessoa', function(Request $request, Response $response, array $args, $con){
    require_once ("DB_CONFIG.php");
    $result = mysqli_query($con, "SELECT * FROM `pessoa` ");
    $data = array();
    try{
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
    }catch (ErrorException $e){
        echo '"ERRO AO LISTAR":{"descricao": '. $e->getMessage() .'}}';
    }
    print json_encode($data);
});
//INSERT CONTATO
$app->post('/inserir_contato', function(Request $request, Response $response, array $args, $con){
    require_once ("DB_CONFIG.php");
    try{
    $data = json_decode(file_get_contents("php://input"));
    $nome = mysqli_real_escape_string($con, $data->nome);
    $contato = mysqli_real_escape_string($con, $data->contato);
    $ramal = mysqli_real_escape_string($con, $data->ramal);
    $result = mysqli_query($con, mysqli_query($con, "INSERT INTO `pessoa`(`nome`, `contato`, `ramal`) VALUES ('" . $nome . "','" . $contato . "','" . $ramal . "')"));
    }catch (ErrorException $e){
        echo '"ERRO AO INSERIR":{"descricao": '. $e->getMessage() .'}}';
    }
});
//DELETAR CONTATO
$app->post('/deletar_contato', function(Request $request, Response $response, array $args, $con){
    require_once ("DB_CONFIG.php");
    try{
        $data = json_decode(file_get_contents("php://input"));
        $query = mysqli_query($con, "DELETE FROM `pessoa` WHERE `id`='" . $data->id . "'");
        mysqli_query($con, $query);
    }catch(ErrorException $e){
        echo '"ERRO AO DELETAR":{"descricao": '. $e->getMessage() .'}}';
    }
});
//ATUALIZAR CONTATO
$app->post('/update_contato', function (Request $request, Response $response, array $args, $con){
    require_once ("DB_CONFIG.php");
    try{
        $data = json_decode(file_get_contents("php://input"));
        $id = mysqli_real_escape_string($con, $data->id);
        $nome = mysqli_real_escape_string($con, $data->nome);
        $contato = mysqli_real_escape_string($con, $data->contato);
        $ramal = mysqli_real_escape_string($con, $data->ramal);
        mysqli_query($con, "UPDATE `pessoa` SET nome='".$nome."', contato='".$contato."', ramal='".$ramal."' WHERE id='".$id."' ");
        mysqli_close($con);
    }catch(ErrorException $e){
        echo '"ERRO ATUALIZAR":{"descricao": '. $e->getMessage() .'}}';
    }
});
