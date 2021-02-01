<?php
    session_start();
    include_once("conexao.php");

    if ((isset($_POST['email'])) && (isset($_POST['senha']))) {
        # code...
        $usuario = mysqli_real_escape_string($conn, $_POST['email']);
        $senha =   mysqli_real_escape_string($conn, $_POST['senha']);
        $senha = md5($senha);

        $result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' && senha= '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        

        if (isset($resultado)) {
            # code...
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
            if ($_SESSION['usuarioNiveisAcessoId'] == "1") {
                # code...
                header('Location: administrativo.php');
            }elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
                header("Location: colaborador.php");

            }else{
                header("Location: cliente.php");
            }
        }else{
            $_SESSION['loginErro'] = "Usuário ou Senha Inválido";
            header("Location: index.php");
        }
    }else{
        $_SESSION['loginErro'] = "Usuário ou Senha Inválido";
        header("Location: index.php");
    }
?>