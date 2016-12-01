<?php

class DB {

    public $host = '',
            $db_name = '',
            $password = '',
            $user = '',
            $charset = 'utf8',
            $pdo = null,
            $error = null,
            $debug = false,
            $last_id = null;

    public function __construct($host = null, $db_name = null, $password = null, $user = null, $charset = null, $debug = null) {

        $this->host = defined('HOSTNAME') ? HOSTNAME : $this->host;
        $this->db_name = defined('DB_NAME') ? DB_NAME : $this->db_name;
        $this->password = defined('DB_PASSWORD') ? DB_PASSWORD : $this->password;
        $this->user = defined('DB_USER') ? DB_USER : $this->user;
        $this->charset = defined('DB_CHARSET') ? DB_CHARSET : $this->charset;
        $this->debug = defined('DEBUG') ? DEBUG : $this->debug;

        $this->connect();
    }

    final protected function connect() {

        $pdo_details = "mysql:host={$this->host};";
        $pdo_details .= "dbname={$this->db_name};";
        $pdo_details .= "charset={$this->charset};";

        try {

            $this->pdo = new PDO($pdo_details, $this->user, $this->password);

            if ($this->debug === true) {
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }

            unset($this->host);
            unset($this->db_name);
            unset($this->password);
            unset($this->user);
            unset($this->charset);
        } catch (PDOException $e) {

            if ($this->debug === true) {
                echo "Erro: " . $e->getMessage();
            }

            die();
        }
    }

    public function query($stmt, $data_array = null) {

        $query = $this->pdo->prepare($stmt);
        $check_exec = $query->execute($data_array);

        if ($check_exec) {
            return $query;
        } else {

            $error = $query->errorInfo();
            $this->error = $error[2];

            return false;
        }
    }

    public function insert($object) {

        if (is_object($object)) {

            $tabela = get_class($object); // nome da tabela / objeto
            $parametros = ""; // variavel q irá receber a quantidade de parametros em ?
            $colunas = array(); // colunas que irão ser inseridas
            $valores = array(); // valores a serem inseridos

            $continua = false;
            // percorre o objeto buscando o nome da coluna e o valor
            foreach ($object as $key => $value) {
                if (!is_null($value)) { 
                    $continua = true;
                    $colunas[] = $key;
                    $valores[] = $value;
                    $parametros .= "?, ";
                }
            }

            if ($continua) {

                // para cada posição, troca por "," para montar os campos
                $campos = implode(', ', $colunas);
                // remove a última vírgula que sobra
                $parametros = substr($parametros, 0, -2);
                $query = $this->query("INSERT INTO " . $tabela . " (" . $campos . ") VALUES ($parametros)", $valores);

                if ($query) {
                    if ($this->pdo->lastInsertId()) {
                        $this->last_id = $this->pdo->lastInsertId();
                    }
                    return true;  
                }else{
                    return $this->error;
                } 
            }

            return;
        }
    }

    public function update($object) {

        if (is_object($object)) {

            $tabela = get_class($object); // nome da tabela / objeto
            $colunas = array(); // colunas que irão ser inseridas
            $valores = array(); // valores a serem inseridos

            $continua = false;

            // percorre o objeto buscando o nome da coluna e o valor
            foreach ($object as $key => $value) {
                if (!is_null($value)) {
                    $continua = true;
                    $colunas[] = $key;
                    $valores[] = $value;
                }
            }

            if ($continua) {

                $valores_update = array();

                //monta o sql

                $colunas_update = null;

                // ignora a posição 0 por ser o ID                        
                for ($i = 1; $i < count($colunas); $i++) {
                    $valores_update[] = $valores[$i];
                    $colunas_update .= $colunas[$i] . " = ?, ";
                }

                $valores_update[] = $valores[0]; // o ID coloca por último para entrar na posição do WHERE

                $colunas_update = substr($colunas_update, 0, -2);

                $query = $this->query("UPDATE " . $tabela . " SET " . $colunas_update . " WHERE " . $colunas[0] . " = ? ", $valores_update);

                if($query){
                    return true;
                } else {
                    return $this->error;
                }               
            }
        }
    }

    public function delete($object) {

        return;
    }

}
