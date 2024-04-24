<?php
include('../verificar-autenticidade.php');
include('../conexao-pdo.php');

if (empty($_GET["ref"])) {
    $PK_CLIENTE = "";
    $NOME = "";
    $CPF = "";
    $WHATSAPP = "";
    $EMAIL = "";
} else {
    $PK_CLIENTE = base64_decode(trim($_GET["ref"]));
    $sql = "
    SELECT *
    FROM CLIENTES
    WHERE PK_CLIENTE =:PK_CLIENTE
    ";
    //prepara a sintaxe
    $stmt = $coon->prepare($sql);
    //substitui a string :pk+servico pela váriavel $pk_servico
    $stmt->bindParam(':PK_CLIENTE', $PK_CLIENTE);
    //executa a sintaxe final do MYSQL
    $stmt->execute();
    //verifica se encontrou algum registro no banco de dados
    if ($stmt->rowCount() > 0) {
        $dado = $stmt->fetch(PDO::FETCH_OBJ);
        $NOME = $dado->NOME;
        $CPF = $dado->CPF;
        $WHATSAPP = $dado->WHATSAPP;
        $EMAIL = $dado->EMAIL;
    } else {
        $_SESSION["tipo"] = 'error';
        $_SESSION["title"] = 'Ops!';
        $_SESSION["msg"] = 'Registro não encotrado.';
        header("location: ./");
        exit;
    }
};

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
../

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
                            <form action="salvar.php" method="post">
                                <div class="card card-danger card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Lista de O.S</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="pk_servico" class="form-label">Cód</label>
                                                <input readonly required type="text" class="form-control" name="PK_CLIENTE" id="PK_CLIENTE" value="<?php echo $PK_CLIENTE; ?>">
                                            </div>
                                            <div class="col-md-5">
                                                <label for="servico" class="form-label">CPF</label>
                                                <input type="text" required class="form-control" id="NOME" name="NOME" value="<?php echo $NOME; ?>">
                                            </div>
                                            <div class="col-md-5">
                                                <label for="servico" class="form-label">Nome</label>
                                                <input type="text" required class="form-control" id="CPF" name="CPF" value="<?php echo $CPF; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="pk_servico" class="form-label">Data O.S</label>
                                                <input required type="date" class="form-control" name="PK_CLIENTE" id="PK_CLIENTE" value="<?php echo $PK_CLIENTE; ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="servico" class="form-label">Data início</label>
                                                <input type="date" required class="form-control" id="NOME" name="NOME" value="<?php echo $NOME; ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="servico" class="form-label">Data fim</label>
                                                <input type="date" required class="form-control" id="CPF" name="CPF" value="<?php echo $CPF; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <form action="salvar.php" method="post">
                                            <div class="card card-warning card-outline">
                                                <div class="card-header">
                                                    <h3 class="card-title">Lista de Serviços</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="pk_servico" class="form-label">SERVIÇO</label><br>
                                                            <select class="form-select" aria-label="Disabled select example" >
                                                                <option selected>--selecione--</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="servico" class="form-label">Valor</label>
                                                            <input type="text" required class="form-control" id="NOME" name="NOME" value="<?php echo $NOME; ?>">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="servico" class="form-label">opcoes</label>
                                                            <input type="text" required class="form-control" id="CPF" name="CPF" value="<?php echo $CPF; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer text-right">
                                                    <a href="./" class="btn btn-outline-danger rounded-circle">
                                                        <i class="bi bi-arrow-left"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-primary rounded-circle">
                                                        <i class="bi bi-floppy"></i>
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->

                            </form>
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
    <script>
        var options = {
            onKeyPress: function(whatsapp, e, field, options) {
                var masks = ['(00) 0000-000#', '(00) 00000-0000'];
                var mask = (whatsapp.length > 14) ? masks[1] : masks[0];
                $('#whatsapp').mask(mask, options);
            }
        };
        $('#whatsapp').mask('(00) 0000-000#', options);
    </script>


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