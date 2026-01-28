<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserção de Usuario</title>
</head>
<body>
    <form action="admin.php?route=usuario/inserir" method="post">

    <label>Usuario:</label><br>
    <input type="text" name="user" id="user" required>
    <br>
    <label>Senha:</label><br>
    <input type="password" name="pass" id="pass" required>
    <br>
    <label>Acesso:</label>
    <br>
    <select name="access">
        <option value=1>Administrador Geral</option>
        <option value=2>Leitor</option>
    </select>
    <br><br>
    <button type="submit">Salvar</button>
    </form>
    
    <br>
    <a href="admin.php?route=usuario/listar">Voltar</a>
</body>
</html>