<?php

class Conexao {

    public static function getConexao(){
        $host = 'localhost';
        $port = '5432';
        $dbname = 'sistema_avaliacao';
        $user = 'postgres';
        $pass = 'postgres';

        try {
            $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}
?>