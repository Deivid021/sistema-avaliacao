<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários - Administração</title>
</head>
<body>
    
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
                <td>
                    <a href="admin.php?route=pergunta/editar&id=<?= $p['id'] ?>">Editar</a>
                    <a href="admin.php?route=pergunta/excluir&id=<?= $p['id'] ?>"
                        onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>