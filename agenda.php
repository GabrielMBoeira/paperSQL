<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="css/agenda.css">

<main>
    <div class="content-form">
        <form class="row g-3">
            <div class="title-form col-md-12 d-flex justify-content-center align-itens-center fs-2">Agenda</div>

            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">25/04/2022</th>
                        <td>08:00</td>
                        <td>Carlos da Silva</td>
                        <td>023.456.432-97</td>
                        <td>
                            <button class="btn btn-sm btn-success"><i class="fa-solid fa-alicorn"></i>Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>
</main>

<?php
require_once('template/footer.php');
?>
