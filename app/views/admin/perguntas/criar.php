<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Pergunta</title>
</head>
<body>

<h2>Adicionar nova pergunta</h2>

<form method="POST" action="admin.php?route=pergunta/salvar">

    <label>Pergunta:</label><br>
    <input type="text" name="texto" required><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="1">Ativa</option>
        <option value="0">Inativa</option>
    </select><br><br>

    <button type="submit">Salvar</button>
</form>

<br>
<a href="admin.php?route=pergunta/listar">Voltar</a>

</body>
</html>
