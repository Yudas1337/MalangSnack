<?php

class Config
{
    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "db_toko";

    public $db;

    function __construct()
    {
        $this->connect_database();
    }

    public function connect_database(): void
    {
        $this->db = new mysqli($this->server, $this->user, $this->pass, $this->database);

        if (!$this->db) {
            die("failed connect to database " . $this->db->connect_error());
        }
    }
}
