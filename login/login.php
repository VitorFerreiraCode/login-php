<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>

  <body>
    <main class="login-wrapper">
      <form class="login-panel" action="autenticar.php" method="post">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" autocomplete="username" required />

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" autocomplete="current-password" required />

        <button type="submit" aria-label="Entrar">Entrar</button>
      </form>
    </main>

    <footer>
      &copy; <script>document.write(new Date().getFullYear())</script>
      VitorFerreiraCode. Todos os direitos reservados.
    </footer>
  </body>
</html>
