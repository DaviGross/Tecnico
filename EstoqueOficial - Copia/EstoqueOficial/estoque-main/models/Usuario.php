<?php
class Usuario {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function listar() {
        $sql = "SELECT id, nome, email FROM usuarios";
        $resultado = $this->conn->query($sql);
        $usuarios = [];
        while ($linha = $resultado->fetch_assoc()) {
            $usuarios[] = $linha;
        }
        return $usuarios;
    }
    public function inserir($nome, $email) {
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $nome, $email);
        return $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public function update($id, $nome, $email) {
        $stmt = $this->conn->prepare("UPDATE usuarios SET nome = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $nome, $email, $id);
        return $stmt->execute();
    }
}
?>