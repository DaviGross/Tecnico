<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Produto.php';

$produtoModel = new Produto($conn);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($produtoModel->listar());
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $quantidade = $_POST['quantidade'] ?? 0;
    $preco = $_POST['preco'] ?? 0;

    if ($produtoModel->inserir($nome, $quantidade, $preco)) {
        echo json_encode(["sucesso" => true, "mensagem" => "Produto cadastrado com sucesso!"]);
    } else {
        echo json_encode(["erro" => "Erro ao cadastrar produto."]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $id = $data['id'] ?? 0;
    $nome = $data['nome'] ?? '';
    $quantidade = $data['quantidade'] ?? 0;
    $preco = $data['preco'] ?? 0;

    if ($id > 0) {
        if ($produtoModel->update($id, $nome, $quantidade, $preco)) {
            echo json_encode(["sucesso" => true, "mensagem" => "Produto atualizado com sucesso!"]);
        } else {
            echo json_encode(["erro" => "Erro ao atualizar produto. Verifique se o ID existe ou os dados estão corretos."]);
        }
    } else {
        echo json_encode(["erro" => "ID do produto inválido para atualização."]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $id = $data['id'] ?? 0;

    if ($id > 0) {
        if ($produtoModel->deletar($id)) {
            echo json_encode(["sucesso" => true, "mensagem" => "Produto excluído com sucesso!"]);
        } else {
            echo json_encode(["erro" => "Erro ao excluir produto. Verifique se o ID existe."]);
        }
    } else {
        echo json_encode(["erro" => "ID do produto inválido."]);
    }
}
?>