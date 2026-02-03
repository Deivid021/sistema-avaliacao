<?php
require_once __DIR__ . '/../../config/Conexao.php';

    class Usuario {

        private ?int $id = null;
        private string $usuario;
        private ?string $senha = null;
        private int $acesso;

        /* getters */
        public function getId(): ?int {
            return $this->id;
        }
        public function getUsuario(): string {
            return $this->usuario;
        }
        public function getSenha(): ?string {
            return $this->senha;
        }
        public function getAcesso(): int {
            return $this->acesso;
        }

        /* setters */
        public function setId(?int $id): void {
            $this->id = $id;
        }
        public function setUsuario(string $usuario): void {
            $this->usuario = $usuario;
        }
        public function setSenha(?string $senha): void {
            $this->senha = $senha;
        }
        public function setAcesso(int $acesso): void {
            $this->acesso = $acesso;
        }

        /* persistencia */

        public function inserir(): void {
            $conn = Conexao::getConexao();

            $sql = "INSERT INTO usuario (usuario, senha, acesso)
                    VALUES (:user, :pass, :access);";

            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':user'   => $this->usuario,
                ':pass'   => $this->senha,
                ':access' => $this->acesso
            ]);
        }

        public function atualizar(): void {
            $conn = Conexao::getConexao();

            if($this->senha) {
                
                $sql = "UPDATE usuario 
                        SET usuario = :user, senha = :pass, acesso = :access 
                        WHERE id = :id;";
                
                $params = [
                    ':id' => $this->id,
                    ':user' => $this->usuario,
                    ':pass' => $this->senha,
                    ':access' => $this->acesso
                ];
            } else {

                $sql = "UPDATE usuario 
                        SET usuario = :user, acesso = :access 
                        WHERE id = :id;";
                
                $params = [
                    ':id' => $this->id,
                    ':user' => $this->usuario,
                    ':access' => $this->acesso
                ];

            }

        $stmt = $conn->prepare($sql);
        $stmt->execute($params);

        }
    }
?>