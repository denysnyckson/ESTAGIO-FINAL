<?php 
  require_once '../bancodedados/connect.class.php';
  require_once '../sessions/session_start.php';
  //$instance = ConnectDb::getInstance();
  //$call = $instance->getConnection();

  class Gestor{
    private $instance;
    private $nome;
    private $conn;
    function __construct(){
      $this->instance = ConnectDb::getInstance();
      $this->conn = $this->instance->getConnection();
    }
    public function logar($user,$pass){
      $stmt = $this->conn->prepare('SELECT * FROM gestor where user ="'.$user.'" and pass = "'.$pass.'"');
      $stmt->execute();
      if($stmt->rowCount() == 1){
        $_SESSION['log'] = 'true';
        header('Location:../../pages/index/index.php');
      }else{
        header('Location: ../../pages/login/index.php');
        $_SESSION['msg'] = 'Conta invalida';
      }
    }
  }

?>