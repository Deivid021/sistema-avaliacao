<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários - Administração</title>
</head>
<body>
    <a href="admin.php?route=usuario/criar">Criar</a>
    <br>
<table>
    <thead>
        <tr>ID</tr>
        <tr>Usuário</tr>
        <tr>Senha</tr>
        <tr>Ações</tr>
    </thead>

    <tbody>
        <?php foreach ($dados as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['usuario'] ?></td>
                <td><?= $p['senha'] ?></td>
                <td><?= $p['acesso'] ?></td>
                <td>
                    <a href="admin.php?route=usuario/editar&id=<?= $p['id'] ?>">Editar</a>
                    <a href="admin.php?route=usuario/excluir&id=<?= $p['id'] ?>"
                        onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>