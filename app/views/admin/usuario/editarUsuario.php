<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Usuario</title>
</head>
<body>
    <form action="admin.php?route=usuario/atualizar" method="post">

    <label>Usuario:</label><br>
    <input type="text" name="user" id="user" value="<?= $dados['usuario']?>" required>
    <br>
    <label>Senha:</label><br>
    <input type="password" name="pass" id="pass">
    <br>
    <label>Acesso:</label>
    <br>
    <select name="access">
        <option value="1" <?= ($dados['acesso'] == 1) ? 'selected' : '' ?>>Administrador Geral</option>
        <option value="2" <?= ($dados['acesso'] == 2) ? 'selected' : '' ?>>Leitor</option>
    </select>
    <input type="hidden" name="id" id="id" value="<?= $dados['id']?>">
    <br><br>
    <button type="submit">Salvar</button>
    </form>
    
    <br>
    <a href="admin.php?route=usuario/listar">Voltar</a>
</body>
</html>