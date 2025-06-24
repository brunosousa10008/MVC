<?php

class Model
{
    protected PDO $pdo;

    public function __construct() {
        $this->pdo = (new ConnectDatabase())->getPDO();
    }

    /**
     * __set é chamado quando se tenta atribuir um valor a uma
     * propriedade inacessível ou inexistente.
     *
     * @param string $nome O nome da propriedade.
     * @param mixed $valor O valor a ser atribuído.
     */
    public function __set(string $nome, mixed $valor): void
    {
        $this->$nome = $valor;
    }

    /**
     * __get é chamado quando se tenta ler o valor de uma
     * propriedade inacessível ou inexistente.
     *
     * @param string $nome O nome da propriedade.
     * @return mixed O valor da propriedade ou null se não existir.
     */
    public function __get(string $nome): mixed
    {
        return $this->$nome ?? null;
    }
}
