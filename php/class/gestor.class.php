<?php 
  require_once '../../php/bancodedados/connect.class.php';
  require_once '../../php/sessions/session_start.php';
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
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if($stmt->rowCount() == 1){
        $_SESSION['log'] = 'true';
        foreach($result as $value){
          $_SESSION['nome'] = $value['nome'];
          $_SESSION['id'] = $value['id'];
        }
        header('Location:../../pages/index/index.php');
      }else{
        header('Location: ../../pages/login/index.php');
        $_SESSION['msg'] = 'Conta invalida';
      }
    }
    public function nome(){
      echo $_SESSION['nome'];
    }
    public function setDados(){
      $id = $_SESSION['id'];
      $int = intval($id);
      $stmt = $this->conn->prepare("SELECT * FROM gestor WHERE id=$int");
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach($result as $value){
        echo '
        <input type="hidden" name="id" value='.$value['id'].'>
        <input type="hidden" id="edNome" value='.$value['nome'].'>
        <input type="hidden" id="edUsuario" value='.$value['user'].'>
        <input type="hidden" id="edSenha" value='.$value['pass'].'>
        ';
      }
    }
    public function editar($id,$nome,$user,$pass){
      $int = intval($id);
      $sql = "UPDATE gestor SET nome = '$nome', user ='$user', pass = '$pass' WHERE id = $id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $_SESSION['nome'] = $nome;
    }
  }

?>