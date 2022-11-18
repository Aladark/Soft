<?php

include_once("conexao.php");

class funcoes_sql extends conexao {

    private $consulta;
	private $ret;

    function setconsulta($sql) {
        $this->consulta = $sql;
    }

    function getconsulta() {
        return $this->consulta;
    }

    function selecionar() {
        try {

            $this->stmt = $this->conectar()->prepare($this->getconsulta());

            if ($this->stmt->execute()) {
                while ($this->rs = $this->stmt->fetch(PDO::FETCH_BOTH)) {
                    $this->ret[] = $this->rs;
                }
                return $this->ret;
            } else {
                echo "Erro: Não foi possível recuperar os dados do banco de dados";
            }
        } catch (Exception $geral) {
            echo "<h1>Erro: " . $geral->getMessage() . "<h1><pre>";
        } catch (PDOException $erro) {
            echo "<h1>Erro: " . $erro->getMessage() . "<h1><pre>";
        }
    }
	
	function inserir() {
        try {

            $this->stmt = $this->conectar()->prepare($this->getconsulta());

            if ($this->stmt->execute()) {
                
                return 1;
				
            } else {
				
                echo "Erro: Não foi possível inserir as informações no banco de dados";
            }
        } catch (Exception $geral) {
            echo "<h1>Erro: " . $geral->getMessage() . "<h1><pre>";
        } catch (PDOException $erro) {
            echo "<h1>Erro: " . $erro->getMessage() . "<h1><pre>";
        }
    }
	
	function alterar() {
        try {

            $this->stmt = $this->conectar()->prepare($this->getconsulta());

            if ($this->stmt->execute()) {
                
                return 1;
				
            } else {
				
                echo "Erro: Não foi possível alterar as informações no banco de dados";
            }
        } catch (Exception $geral) {
            echo "<h1>Erro: " . $geral->getMessage() . "<h1><pre>";
        } catch (PDOException $erro) {
            echo "<h1>Erro: " . $erro->getMessage() . "<h1><pre>";
        }
    }
	
	function excluir() {
        try {

            $this->stmt = $this->conectar()->prepare($this->getconsulta());

            if ($this->stmt->execute()) {
                
                return 1;
				
            } else {
				
                echo "Erro: Não foi possível excluir as informações no banco de dados";
            }
        } catch (Exception $geral) {
            echo "<h1>Erro: " . $geral->getMessage() . "<h1><pre>";
        } catch (PDOException $erro) {
            echo "<h1>Erro: " . $erro->getMessage() . "<h1><pre>";
        }
    }
}
?>


