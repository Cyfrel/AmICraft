<?php

    class Conexao{
        function __construct(){
            $this->dbHost = 'localhost';
            $this->dbPort = 5432;
            $this->dbUsername = 'postgres';
            $this->dbPassword = 'admin';
            $this->dbName = 'postgres';
        }


        function conexaoPostgres(){
            $this->conexao = pg_connect("host=$this->dbHost port=$this->dbPort dbname=$this->dbName user=$this->dbUsername password=$this->dbPassword");
            if($this->conexao->connect_errno)
            {
                echo "ERRO de Conexão";
            }
            else
            {
                return $this->conexao;
            }
        }

        function testeClass(){
            echo "funcionando";
        }

    }


    //$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // $this->conexao = pg_connect("host=$dbHost port=$dbPort dbname=$dbName user=$dbUsername password=$dbPassword");

    // if($this->conexao->connect_errno)
    // {
    //     echo "ERRO de Conexão";
    // }
    // else
    // {
    //     echo "conexão efetuada com sucesso";

    // }

    //phpinfo();
    
?>
