<?php
session_start();
require_once('conexao.php');

$contabilidades = [];

$sql = "SELECT * FROM meses";
$categorias = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Finanças - Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Categorias</h1>
        <div class="table">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="mes_create.php" class="btn btn-success">Adicionar Mês</a>
            </div>
        </div>

        <div class="card mb-4">
            <?php foreach ($contabilidades as $contabilidade): ?>
                <div class="card-body">
                    <table class="table table-bordered tablestriped">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Categoria</th>
                                <th class="text-center">Ações</th>
                            <tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><?php echo $contabilidades['nome_mes']; ?></td>
                                <td><?php echo $contabilidades['ano']; ?></td>
                                <td>
                                    <div class="aling-items-center gap-2 ">
                                        <a href="edit_mes.php?id=<?= $contabilidade['id_mes'] ?>" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-fill"></i> Editar
                                        </a>
                                        <form action="acoes_mes.php" method="POST" class="d-inline">
                                            <button onclick="return confirm('Excluir mês ?')" name="delete_mes" type="submit" value="<?= $contabilidade['id_mes']; ?>" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash-fill"></i> Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    </table>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>