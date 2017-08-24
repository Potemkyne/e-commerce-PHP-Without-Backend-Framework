<?php

class DB {

    private $host;
    private $username;
    private $password;
    private $database;
    public $db;

    public function __construct($host, $username, $password, $database, $db) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->db = $db;
        try {
            $this->db = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->database, $this->username, $this->password, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                    )
            );
        } catch (PDOEXception $e) {
            echo"<h1> Connexion impossible à la BD</h1>" . $e->getMessage();
        }
    }

    public function extract($query) {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchall(PDO::FETCH_OBJ);
        return $res;
    }

}
