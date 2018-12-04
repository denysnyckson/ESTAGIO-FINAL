<?php require_once '../../php/sessions/session_verifica.php'?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISGES | Novo Bolsista</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <?php include '../templates/navbar.php' ?>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php require_once '../../php/control/exib_nome.php'?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">NAVEGAÇÃO</li>
          <li>
            <a href="../index/index.php">
              <i class="fa fa-dashboard"></i> <span>Inicio</span>
            </a>
          </li>

          <li class="treeview active">
            <a href="#">
              <i class="fa fa-user"></i> <span>Bolsistas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../../pages/view/listar_bolsista.php"><i class="fa fa-circle-o"></i> Bolsistas Cadastrados</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Novo Bolsista</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Função</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../../pages/view/listar_funcoes.php"><i class="fa fa-circle-o"></i> Funções Cadastradas</a></li>
              <li><a href="funcao_cadastro.php"><i class="fa fa-circle-o"></i> Nova Função</a></li>
            </ul>
          </li>

         <li class="treeview">
            <a href="#">
              <i class="fa fa-list"></i> <span>Escala</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../view/listar_escala.php"><i class="fa fa-circle-o"></i> Escalas Cadastradas</a></li>
              <li><a href="../view/escala.php"><i class="fa fa-circle-o"></i> Nova Escala</a></li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-cog"></i> <span>Configuração</span>
            </a>
          </li>

          <?php include '../templates/bt_sair.php'; ?>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Bolsista</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="../../php/control/editar_bol.php">
            <?php include '../../php/control/setdados.php'; ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="ipNome">Nome</label>
                  <input name="nome" type="text" class="form-control" id="ipNome" placeholder="Digite o nome">
                </div>
                <div class="form-group">
                    <label for="ipEmail">Email</label>
                    <input name="email" type="email" class="form-control" id="ipEmail" placeholder="example@example.com">
                </div>
                <div class="row">    
                    <div class="form-group col-md-6">
                    <label for="exampleInputTel">Telefone</label>
                    <input name="telefone" id="ipTelefone" type="text" class="form-control" id="exampleInputTel" placeholder="(99) 99999-9999">
                    </div>
            
                    <div class="form-group col-md-6">
                    <label>Turno</label>
                    <select id="ipTurno" name="turno" class="form-control">
                        <option value='M'>Manhã</option>
                        <option value='T'>Tarde</option>
                        <option value='N'>Noite</option>
                    </select>
                    </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </form>
          </div>

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

  </div>
  <!-- ./wrapper -->
 
  <!-- jQuery 3 --> 
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>

  <script>
      var nome = document.getElementById('edNome').value;
      var email = document.getElementById('edEmail').value;
      var turno = document.getElementById('edTurno').value;
      var telefone = document.getElementById('edTelefone').value;
      document.getElementById('ipNome').value = nome;
      document.getElementById('ipEmail').value = email;
      document.getElementById('ipTurno').value = turno;
      document.getElementById('ipTelefone').value = telefone;
  </script>

</body>

</html>
