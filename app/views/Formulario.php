<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avaliação</title>
</head>
<body>
    <h1>Avaliação de Qualidade</h1>

    <form action="index.php?acao=salvar" method="POST">
        <?php foreach ($perguntas as $p): ?>
            <p><?= htmlspecialchars($p['texto']) ?></p>
            <?php for ($i = 0; $i <= 10; $i++): ?>
                <label>
                    <input type="radio" name="respostas[<?= $p['id'] ?>]" value="<?= $i ?>" required> <?= $i ?>
                </label>
            <?php endfor; ?>
            <hr>
        <?php endforeach; ?>

        <p>Feedback opcional:</p>
        <textarea name="feedback" cols="50" rows="4"></textarea>

        <p>
            <em>Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</em>
        </p>

        <button type="submit">Enviar Avaliação</button>
    </form>
</body>
</html>
