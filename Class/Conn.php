<?php 


class Conn extends PDO {

    private $username;

    private $server;

    private $password; 

    private $db;

    public function __construct()
    {
        $this->server = 'localhost';
        $this->db = 'projeecp'; ;
        $this->username = 'root'; 
        $this->password = '';
        try{
        parent::__construct("mysql:host=".$this->server. ';dbname='.$this->db, $this->username, $this->password);
           $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
        } catch (PDOException $e) {
            print 'Erro no banco de dados';
        }
    }
}
