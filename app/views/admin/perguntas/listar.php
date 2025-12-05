<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perguntas - Administração</title>
    <style>
        table {
            border-collapse: collapse;
            width: 500px;
        }
        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        a {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<h2>Perguntas cadastradas</h2>

<a href="admin.php?route=pergunta/criar">+ Criar nova pergunta</a>
<br><br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Pergunta</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($dados as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['texto'] ?></td>
                <td><?= $p['status'] == 1 ? 'Ativa' : 'Inativa' ?></td>
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
