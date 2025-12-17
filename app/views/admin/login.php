<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Administrativo</title>
</head>
<body>

<h2>Login do Administrador</h2>

<form action="/../../admin.php?route=login/autenticar" method="post">
    <input type="user" name="user" placeholder="User" required><br><br>
    <input type="password" name="pass" placeholder="Senha" required><br><br>
    <button type="submit">Entrar</button>
</form>

</body>
</html>
