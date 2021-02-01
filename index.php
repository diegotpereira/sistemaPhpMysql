<?php

    session_start();
?>

<html lang="pt-br">
    <head>
         <meta charset="utf-8">
         <meta name="author" content="Diego Pereira">
         <title>Sistema - PHP - Login</title>
    </head>
    <body>
          <form method="POST"action="valida.php">
            <h2>Área Restrita</h2>
            <label>Email</label>
            <input type="email" name="email" placeholder="Digite seu E-mail" required autofocus>
            <label>Senha</label>
            <input type="password" name='senha' placeholder="Digite sua senha" required>
            <button type="submit">Acessar</button>
            </h2>
          </form>
            <p>

                <?php
                if (isset($_SESSION['loginErro'])) {
                    # code...
                    echo $_SESSION['loginErro'];
                    unset($_SESSION['loginErro']);
                }
                ?>

            </p>
            
          
            <p>
                <?php
                    if(isset($_SESSION['logindeslogado'])){
                        echo $_SESSION['logindeslogado'];
                        unset($_SESSION['logindeslogado']);
                    }
                ?>
            </p>
    </body>
</html>
