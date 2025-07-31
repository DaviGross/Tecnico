<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

$usuarioModel = new Usuario($conn);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    echo json_encode($usuarioModel->listar());
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    header('Content-Type: application/json');
    if ($usuarioModel->inserir($nome, $email)) {
        echo json_encode(["sucesso" => true, "mensagem" => "Usuário cadastrado com sucesso!"]);
    } else {
        echo json_encode(["erro" => "Erro ao cadastrar usuário."]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $put_vars);
    $id = $put_vars['id'] ?? null;
    $nome = $put_vars['nome'] ?? '';
    $email = $put_vars['email'] ?? '';

    header('Content-Type: application/json');

    if ($id === null) {
        echo json_encode(["erro" => "ID do usuário não fornecido para atualização."]);
    } elseif (empty($nome) || empty($email)) {
        echo json_encode(["erro" => "Nome e e-mail são obrigatórios para atualização."]);
    } else {
        if ($usuarioModel->update($id, $nome, $email)) {
            echo json_encode(["sucesso" => true, "mensagem" => "Usuário atualizado com sucesso!"]);
        } else {
            echo json_encode(["erro" => "Erro ao atualizar usuário. Verifique se o ID existe."]);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $delete_vars);
    $id = $delete_vars['id'] ?? null;
    header('Content-Type: application/json');
    if ($id !== null) {
        if ($usuarioModel->excluir($id)) {
            echo json_encode(["sucesso" => true, "mensagem" => "Usuário excluído com sucesso!"]);
        } else {
            echo json_encode(["erro" => "Erro ao excluir usuário. Verifique se o ID existe."]);
        }
    } else {
        echo json_encode(["erro" => "ID do usuário não fornecido para exclusão."]);
    }
} else {
    header('Content-Type: application/json', true, 405);
    echo json_encode(["erro" => "Método não permitido."]);
}
?>