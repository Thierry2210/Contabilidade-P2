<?php
session_start();
require_once('conexao.php');

$contabilidade = [];

if (!isset($_GET['id_mes']) || empty($_GET['id_mes'])) {
    header('Location: lista.php');
    exit();
} else {
    $id_mes = mysqli_real_escape_string($conn, $_GET['id_mes']);
    $sql = "SELECT * FROM contabilidade WHERE id_mes = '{$id}'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        $contabilidade = mysqli_fetch_array($query);
    } else {
        echo "Categoria não encontrada no banco de dados.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Finanças - Meses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edição da Meses</h1>
        <?php if (!empty($contabilidade)): ?>
            <form action="acoes_mes.php" method="POST">
                <input type="hidden" name="id_mes" value="<?= $contabilidade['id_mes']; ?>">
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-striped">
                            <div class="mb-3">
                                <label for="nome_categoria" class="form-label">Nome do Mês</label>
                                <input type="text" id="nome_categoria" name="nome_categoria" class="form-control"  value="<?= $contabilidade['nome_mes'] ?>"required>
                            </div>
                            <div class="mb-3">
                                <label for="numero_categoria" class="form-label">Ano</label>
                                <input type="number" id="numero_categoria" name="numero_categoria" class="form-control"  value="<?= $contabilidade['ano'] ?>"required>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </table>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Categoria não encontrada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>