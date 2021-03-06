<?php

class User
{
    private $pdo;
    public function conectar ($name, $host, $user, $senha)
    {
        global $pdo;
        try {
            //code...
            $pdo = new PDO("msql:dbname=".$name.";host=".$host,$user,$senha);
        } catch (PDOException $e) {
            //throw $th;
            $msgError = $e->getMessage();
        }
    }

    public function cadastrar($name, $sobrenome, $email, $data_nascimento, $senha, $morada)
    {
        global $pdo;
        //Verificar se o email já existe
        $sql = $pdo->prepare("SELCET id_user FROM users WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            return false;
        }
        else{

            //Senão, cadastrar
            $sql = $pdo->prepare("INSERT INTO users (name, sobrenome, email, data_nascimento, senha, morada) VALUES (:n, :s, :e, :S, :d, :m)");
            
            $sql->bindValue(":n", $name);
            $sql->bindValue(":s", $sobrenome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":d", $data_nascimento);
            $sql->bindValue(":S", md5($senha));
            $sql->bindValue(":m", $morada);
            $spl->execute();
            return true();
        }
    }

    public function login($email, $password)
    {
        global $pdo;
        //Verificar de o email e a senha estão na database
        $spl =  $pdo->prepare("SELECT id user FROM users WHERE email = :e AND senha = :p");
        $spl->blindValue(":e", $email);
        $spl->blindValue(":p", md5($senha));
        $spl->execute();

        if($spl->rowCount() > 0);
        {
            //Se sim, iniciar sessão
            $dado = $spl->fetch();
            session_start();
            $_SESSION['id_user'] = $dado['is_user'];
            return true;

        }
        else()
        {
            return false;
        }
    }
}





?>