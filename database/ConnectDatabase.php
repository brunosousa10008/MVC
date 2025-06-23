<?php
Helpers::loadEnv(__DIR__ . '/../.env');

class ConnectDatabase {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $pdo;

    // O construtor agora permite a personalização dos parâmetros de conexão
    public function __construct() {
        $this->host = getenv('DB_HOST');
        $this->db   = getenv('DB_NAME');
        $this->user = getenv('DB_USER');
        $this->pass = getenv('DB_PASS');

        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->handleError($e);
        }
    }

    // Método para obter a conexão PDO
    public function getPDO() {
        return $this->pdo;
        
    }

    // Método para tratar erros de conexão
    private function handleError(PDOException $e) {
        echo json_encode([
            'message' => 'Database connection error: ' . $e->getMessage(),
            'success' => false
        ]);
        exit;
    }
}
