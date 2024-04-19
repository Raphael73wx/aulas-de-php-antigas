<?php
include('../verificar-autenticidade.php');
include('../conexao-pdo.php');

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../dist/plugins/fontawesome-free/css/all.min.css">
  <!-- bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- sweet Alert 2  -->
  <link rel="stylesheet" href="../dist/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->
    <!-- Main Sidebar Container -->
    <?php
    include('../aside.php');
    ?>

    <!-- Navbar -->
    <?php
    include('../nav.php');
    ?>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col">
              <div class="card card-danger card-outline">
                <div class="card-header">
                  <h3 class="card-title">Lista de Serviços</h3>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <td>CÓD</td>
                        <td>Serviços</td>
                        <td>opcões</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "
                     SELECT pk_servico,servico
                     FROM servicos
                     ORDER BY servico
                      ";
                      //prepara a sintaxe na conexão
                      $stmt = $conn->prepare($sql);
                      //executa o comando MYSQL
                      $stmt->execute();
                      //recebe as informações vindas do MYSQL
                      $dados = $stmt->fetchAll(PDO::FETCH_OBJ);
                      //laço de repetição para printar informações
                      foreach ($dados as $row) {
                        echo '
                      <tr>
                      <td>' . $row->pk_servico . '</td>
                      <td>' . $row->servico . '</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-default dropdown-toggle dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="bi bi-tools"></i>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="form.php?ref=' . base64_encode($row->pk_servico) . '">
                              <i class="bi bi-pencil"></i>Editar
                            </a>
                            <a class="dropdown-item" href="#">
                              <i class="bi bi-trash"></i>Remover
                            </a>
                          </div>
                        </div>
                      </td>
                      
                      </tr>
                      ';
                      }

                      ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- footer -->
    <?php
    include('../footer.php');
    ?>
    <!-- footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../dist/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../dist/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>
  <!-- SweetAlert2-->
  <script src="../dist/plugins/sweetalert2/sweetalert2.min.js"></script>

  <?php
  include("../sweet-alert-2.php");
  ?>

 
 
  <script>
    $(function() {

      $("#theme-mode").click(function() {
        //pegar atributo class objeto
        var classMode = $("#theme-mode").attr("class")
        if (classMode == "fas fa-sun") {
          $("body").removeClass("dark-mode");
          $("#theme-mode").attr("class", "fas fa-moon");
          $("#navtopo").attr("class", "main-header navbar navbar-expand navbar-white navbar-light");
          $("#asideMenu").attr("class", "main-sidebar sidebar-light-primary elevation-4");
        } else {
          $("body").addClass("dark-mode");
          $("#theme-mode").attr("class", "fas fa-sun");
          $("#navtopo").attr("class", "main-header navbar navbar-expand nav-black navbar-dark");
          $(" ").attr("class", "main-sidebar sidebar-dark-primary elevation-4")
        }
      });

    })
  </script>

</body>

</html>