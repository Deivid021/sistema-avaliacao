<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Pergunta</title>
</head>
<body>

<h2>Editar Pergunta</h2>

<form method="POST" action="admin.php?route=pergunta/atualizar">

    <input type="hidden" name="id" value="<?= $pergunta['id'] ?>">

    <label>Pergunta:</label><br>
    <input type="text" name="texto" value="<?= $pergunta['texto'] ?>" required><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="1" <?= $pergunta['status'] == 1 ? 'selected' : '' ?>>Ativa</option>
        <option value="0" <?= $pergunta['status'] == 0 ? 'selected' : '' ?>>Inativa</option>
    </select><br><br>

    <button type="submit">Salvar Alterações</button>
</form>

<br>
<a href="admin.php?route=pergunta/listar">Voltar</a>

</body>
</html>
