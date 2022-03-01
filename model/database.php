<?php
class database {
    private static $instance;
    private $type = 'mysql';
    private $host = '127.0.0.1';
    private $port = '3306';
    private $dbname = 'castelnau';
    private $username = 'root';
    private $password = '';
    private $dbh;

    private function __construct() {
        try {
            $this->dbh = new PDO(
                $this->type . ':host=' . $this->host . '; port=3306; dbname=' . $this->dbname,
                $this->username,
                $this->password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
            //$this->dbh->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
        } catch (PDOException $e) {
            echo 'Erreur' . $e->getMessage();
            die();
        }
    }

    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getDbh() {
        return $this->dbh;
    }

}