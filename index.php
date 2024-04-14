<?php

// incluir os códigos no ficheiro connect.php
require 'connect.php';

// incluir os códigos no ficheiro post.php
require 'post.php';

?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRUD notas</title>
    <!-- folhas de estilo externas -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.datatables.net/v/bs4/jq-3.7.0/dt-2.0.3/datatables.min.css" rel="stylesheet">

    <!-- folhas de estilo internas -->

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Gerir <b>Notas</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addNotaModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar nota</span></a>
                        </div>
                    </div>
                </div>

                <table id="notaTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Disciplina</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Nota Final</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $sql = 'SELECT * FROM notas';

                        $stmt = $pdo->query($sql);

                        // get all notas
                        $notas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($notas) {
                            // show the notas
                            foreach ($notas as $nota) {
                        ?>
                                <tr>
                                    <td>
                                        <?= $nota['id'] ?>
                                    </td>
                                    <td><?= $nota['disciplina'] ?></td>
                                    <td><?= $nota['n1'] ?></td>
                                    <td><?= $nota['n2'] ?></td>
                                    <td><?= $nota['notafinal'] ?></td>
                                    <td>
                                        <a href="#editNotaModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                                        <a href="#deleteNotaModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Deletar">&#xE872;</i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addNotaModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="./index.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Adicionar Nota</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Disciplina</label>
                            <input name="disciplina" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nota 1</label>
                            <input name="nota1" type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nota 2</label>
                            <input name="nota2" type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nota Final</label>
                            <input name="notaFinal" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" name="Cancelar" value="Cancelar">
                        <input type="submit" class="btn btn-success" name="Adicionar" value="Adicionar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editNotaModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="./index.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Nota</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group d-none">
                            <label>Id</label>
                            <input id="editId" name="editId" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Disciplina</label>
                            <input id="disciplina" name="disciplina" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nota 1</label>
                            <input id="nota1" name="nota1" type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nota 2</label>
                            <input id="nota2" name="nota2" type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nota Final</label>
                            <input id="notafinal" name="notaFinal" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" name="Cancelar" value="Cancelar">
                        <input type="submit" class="btn btn-info" name="Editar" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteNotaModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="./index.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Deletar nota</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que quer deletar está nota?</p>
                        <p class="text-warning"><small>Está acção não pode ser revertida!</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" name="Cancelar" value="Cancelar">
                        <input type="submit" class="btn btn-danger" id="deleteConfirmar" name="Deletar" value="Deletar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<!-- scripts javascript externos -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/v/bs4/jq-3.7.0/dt-2.0.3/datatables.min.js"></script>

<!-- scripts javascript internos -->

<script src="script.js"></script>

</html>