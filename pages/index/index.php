<?php require_once '../../php/sessions/session_verifica.php'?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISGES | Início</title>
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
          <li class="active">
            <a href="index.php">
              <i class="fa fa-dashboard"></i> <span>Início</span>
            </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Bolsistas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../../pages/view/listar_bolsista.php"  data-toggle="tooltip" data-placement="right" title="Todos os Bolsistas cadastrados"><i class="fa fa-users"></i> Bolsistas Cadastrados</a></li>
              <li><a href="../forms/bolsista_cadastro.php"  data-toggle="tooltip" data-placement="right" title="Cadastrar Novo Bolsista"><i class="fa fa-user-plus"></i> Novo Bolsista</a></li>
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
              <li><a href="../../pages/view/listar_funcoes.php"  data-toggle="tooltip" data-placement="right" title="Funções cadastradas"><i class="fa fa-list"></i> Funções Cadastradas</a></li>
              <li><a href="../forms/funcao_cadastro.php"  data-toggle="tooltip" data-placement="right" title="Cadastrar uma nova Função"><i class="fa fa-indent"></i> Nova Função</a></li>
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
              <li><a href="../view/listar_escala.php" data-toggle="tooltip" data-placement="right" title="Todas as Escalas cadastradas"><i class="fa fa-table"></i> Escalas Cadastradas</a></li>
              <li><a href="../view/escala.php" data-toggle="tooltip" data-placement="right" title="Cadastrar uma nova escala"><i class="fa fa-table"></i> Nova Escala</a></li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="tooltip" data-placement="right" title="Configurar o Sistema">
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
      

      
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <img style="margin-left:40%;margin-top:15%" src="../../img/logo_index.png">
        <!-- /.box -->

      </section>
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

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    
   
  });
</script>
</body>

</html>
