<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SSS - Senac System Service</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="dist/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h4"><b>S³<br>Senac System Service</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Informe seu e-mail de acesso</p>

                <form action="recuperar-senha.php" method="post">
                    <div class="input-group mb-3">
                        <input required  type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <!-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    lembrar-me
                                </label>
                            </div>
                        </div> -->
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Recuperar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
<!-- 
                <div class="social-auth-links text-center mt-2 mb-3">
                     <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> entre usando facebook
                    </a> -->
                    <!-- <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google mr-2"></i> entre usando Google
                    </a> -->
                <!-- </div> -->
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="esqueceu-senha.php">Fazer login?</a>
                </p>
                <!-- <p class="mb-0">
                    <a href="register.html" class="text-center">fazer cadastro</a>
                </p> -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="dist/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>