<?php
class User
{
  private $pdo;
  public $msgError = "";

  public function conect($nome, $host, $usuario, $senha)
  {
    global $pdo;
    global $msgError;
    try {
      $pdo = new PDO("mysql:dbname=" . $nome . ";host=" . $host, $usuario, $senha);
    } catch (PDOException $e) {
      $msgError = $e->getMessage();
      exit();
    } catch (Exception $e) {
      echo "Erro generico: " . $e->getMessage();
      exit();
    }
  }

  public function register($nome, $email, $senha)
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT id_user FROM usuarios WHERE email = :e");
    $sql->bindValue(":e", $email);
    $sql->execute();
    if ($sql->rowCount() > 0) {
      return false;
    } else {
      $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)");
      $sql->bindValue(":n", $nome);
      $sql->bindValue(":e", $email);
      $sql->bindValue(":s", md5($senha));
      $sql->execute();
      return true;
    }
  }

  public function login($email, $senha)
  {
    global $pdo;
    $sql = $pdo->prepare("SELECT id_user FROM usuarios WHERE email = :e AND senha = :s");
    $sql->bindValue(":e", $email);
    $sql->bindValue(":s", md5($senha));
    $sql->execute();
    if ($sql->rowCount() > 0) {
      $dado = $sql->fetch();
      session_start();
      $_SESSION['id_user'] = $dado['id_user'];
      return true;
    } else {
      return false;
    }
  }
}
