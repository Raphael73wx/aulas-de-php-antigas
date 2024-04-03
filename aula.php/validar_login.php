<?php
//VERIFICA SE ESTA VINDO INFORMAÇÕES PARA VALIDAÇÃO DE E-MAIL E SENHA
if ($_POST) {
    //VERIFICAR SE FOI ENVIADO OS CAMPOS OBRIGATORIOS
    if (empty($_POST["email"]) || empty($_POST["senha"])) {
        echo"
        <script>
             alert('Por favor, preecha todos os campos obrigatorios!');
             window.location='./tela_login.php';
        </script>
        ";
        exit;
    }
    else {
        include('conexao_mysqli.php');
        //recuperar informações do formulário login 
        $email = trim($_POST["email"]);
        $senha = trim($_POST["senha"]);

        //montar sintaxe sql para consultar no banco de dados 
        $sql = "
        SELECT pk_usuario,nome
        FROM usuarios
        WHERE email LIKE '$email'
        AND senha LIKE '$senha'
        ";

        $query = mysqli_query($conn,$sql);

        //verificar se encontrou algum registro na tabela
        if(mysqli_num_rows($query)>0){
         
            //CRIAR SESSÃO  PARA VARIÁVEL GLOBAL
          session_start();
            
          //declaro variável global informando que usuário 
          //está autenticando corretamente
            $_SESSION["autenticado"] = true;

          header('location: ../crud_mysqli');
          exit;
        }
        else{
            echo"
            <script>
            alert('E-mail e/ou senha inválidos!');
            window.location='./tela_login.php';
            </script>
            ";
            exit;
        }
    }
}else {
    header('Location: ../tela_login.php');
    exit;
}

?>