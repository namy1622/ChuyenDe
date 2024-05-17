<?php

class DatabaseService
{
    private $serverName;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct()
    {
        require_once 'configs/database.config.php';

        $this->serverName = $DATABASE_CONFIGS["SERVER_NAME"];
        $this->username = $DATABASE_CONFIGS["USERNAME"];
        $this->password = $DATABASE_CONFIGS["PASSWORD"];
        $this->dbname = $DATABASE_CONFIGS["NAME"];

        $this->conn = new mysqli($this->serverName, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function executeQuery(string $query)
    {
        return $this->conn->query($query);
    }
}