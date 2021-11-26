<?php
require_once 'classes/users.php';
$u = new User;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
</head>

<body>
  <!-- Parte em HTML -->

  <div class="container">
    <div class="content first-content">
      <div class="first-column">
        <h2 class="title title-primary">Bem-vindo!</h2>
        <p class="description description-primary">Para conectar</p>
        <p class="description description-primary">
          por favor insira seus dados
        </p>
        <button id="signin" class="btn btn-primary">logar</button>
      </div>
      <div class="second-column">
        <h2 class="title title-second">Criar uma conta</h2>
        <div class="social-media">
          <ul class="list-social-media">
            <a class="link-social-media" href="#">
              <li class="item-social-media">
                <i class="fab fa-facebook-f"></i>
              </li>
            </a>
            <a class="link-social-media" href="#">
              <li class="item-social-media">
                <i class="fab fa-google-plus-g"></i>
              </li>
            </a>
            <a class="link-social-media" href="#">
              <li class="item-social-media">
                <i class="fab fa-linkedin-in"></i>
              </li>
            </a>
          </ul>
        </div>
        <!-- social media -->
        <p class="description description-second">
          use seu email para se registrar:
        </p>
        <form action="" class="form" method="POST">
          <label class="label-input" for="">
            <i class="far fa-user icon-modify"></i>
            <input type="text" name="nome" maxlength="30" placeholder="Nome" />
          </label>

          <label class="label-input" for="">
            <i class="far fa-envelope icon-modify"></i>
            <input type="email" name="email" maxlength="50" placeholder="Email" />
          </label>

          <label class="label-input" for="">
            <i class="fas fa-lock icon-modify"></i>
            <input type="password" name="senha" maxlength="32" placeholder="Senha" />
          </label>

          <button class="btn btn-second">criar</button>
        </form>
      </div>
      <!-- second column -->
    </div>

    <!-- first content -->
    <div class="content second-content">
      <div class="first-column">
        <h2 class="title title-primary">Olá, pessoa!</h2>
        <p class="description description-primary">Insira seus dados</p>
        <p class="description description-primary">e comece já</p>
        <button id="signup" class="btn btn-primary">criar</button>
      </div>
      <div class="second-column">
        <h2 class="title title-second">Faça login</h2>
        <div class="social-media">
          <ul class="list-social-media">
            <a class="link-social-media" href="#">
              <li class="item-social-media">
                <i class="fab fa-facebook-f"></i>
              </li>
            </a>
            <a class="link-social-media" href="#">
              <li class="item-social-media">
                <i class="fab fa-google-plus-g"></i>
              </li>
            </a>
            <a class="link-social-media" href="#">
              <li class="item-social-media">
                <i class="fab fa-linkedin-in"></i>
              </li>
            </a>
          </ul>
        </div>
        <!-- social media -->
        <p class="description description-second">
          use seu email para logar:
        </p>
        <form action="" class="form" method="POST">
          <label class="label-input" for="">
            <i class="far fa-envelope icon-modify"></i>
            <input type="email" name="email" maxlength="50" placeholder="Email" />
          </label>

          <label class="label-input" for="">
            <i class="fas fa-lock icon-modify"></i>
            <input type="password" name="senha" maxlength="32" placeholder="Senha" />
          </label>

          <a class="password" href="#">Esqueci minha senha</a>
          <button class="btn btn-second">logar</button>
        </form>
      </div>
      <!-- second column -->
    </div>
    <!-- second-content -->
  </div>
  <?php

  if (isset($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    if (!empty($nome) && !empty($email) && !empty($senha)) {
      $u->conect("crudlogin", "localhost", "root", "");

      if ($u->msgError == "") {
        if ($u->register($nome, $email, $senha)) {
          echo "Cadastrado com sucesso!";
          header("Location: home.html");
        } else {
          echo "Email já cadastrado!";
        }
      } else {
        echo "Erro: " . $u->$msgError;
      }
    } else {
      echo "Preencha todos os campos!";
    }
  }

  ?>
  <script src="js/app.js"></script>
</body>

</html>