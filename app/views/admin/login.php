<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Administrativo</title>
</head>
<body>

<h2>Login do Administrador</h2>

<?php if (!empty($_GET['erro'])): ?>
    <p style="color:red;">Credenciais inválidas</p>
<?php endif; ?>

<form action="/admin.php?route=login/autenticar" method="post">
    <input type="email" name="email" placeholder="E-mail" required><br><br>
    <input type="password" name="senha" placeholder="Senha" required><br><br>
    <button type="submit">Entrar</button>
</form>

</body>
</html>
