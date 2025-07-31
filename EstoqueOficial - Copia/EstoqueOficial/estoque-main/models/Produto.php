<?php
class Produto {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function listar() {
        $sql = "SELECT id, nome, quantidade, preco FROM produtos";
        $resultado = $this->conn->query($sql);
        $produtos = [];
        while ($linha = $resultado->fetch_assoc()) {
            $produtos[] = $linha;
        }
        return $produtos;
    }
    public function inserir($nome, $quantidade, $preco) {
        $stmt = $this->conn->prepare("INSERT INTO produtos (nome, quantidade, preco) VALUES (?, ?, ?)");
        $stmt->bind_param("sid", $nome, $quantidade, $preco);
        return $stmt->execute();
    }
    public function deletar($id) {
        $id = (int)$id;
        $stmt = $this->conn->prepare("DELETE FROM produtos WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public function update($id, $nome, $quantidade, $preco) {
        $id = (int)$id;
        $stmt = $this->conn->prepare("UPDATE produtos SET nome = ?, quantidade = ?, preco = ? WHERE id = ?");
        $stmt->bind_param("sidi", $nome, $quantidade, $preco, $id);
        return $stmt->execute();
    }
}
?>