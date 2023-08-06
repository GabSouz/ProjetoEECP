<?php 

require_once "Conn.php";

class Crud extends Conn{
    private string $tabela = "guia_ocorrencia";
    function __construct(
        public string $masp,
        public string $adimissao,
        public string $servidor,
        public string $exercicio,
        public string $afastamento,
        public string $descricao,
        public string $observacao,
    ) {
    }
    

    public function inserir() {
        $conn = new Conn;
        $insert = "INSERT INTO $this->tabela VALUES (null,?,?,?,?,?,?,?)";
        $sql = $conn->prepare($insert);
        return $sql->execute(array($this->masp, $this->adimissao, $this->servidor, $this->exercicio, $this->afastamento, $this->descricao,  $this->observacao));
        // return $sql->execute(array($this->masp, $this->adimissao, $this->servidor, $this->exercicio, $this->afastamento, $this->descricao, $this->observacao));
    }

}


?>