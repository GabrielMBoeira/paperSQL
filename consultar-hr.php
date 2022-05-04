<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="css/consultar-hr.css">

<main>
    <div class="cont-table">
        <div class="back-table">
            <div class="inputs">
                <input class="ipt1" type="date" name="date" id="date" onchange="data()">
                <input class="ipt2" type="time" name="time" id="time">
                <input class="btn btn-primary" type="button" value="Filtrar">
            </div>
            <div class="table-responsive">
                <table class="table text-light">
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Horário</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th valign="middle">21/12/2020</th>
                            <td valign="middle">16:00</td>
                            <td class="text-truncate" valign="middle">Eduardo da Silva</td>
                            <td valign="middle">123.456.789.10</td>
                            <th scope="col">
                                <button class="btn btn-sm btn-success" valign="middle">Editar</button>
                            </th>
                            <th scope="col">
                                <button class="btn btn-sm btn-danger" valign="middle">Excluir</button>
                            </th>
                        </tr>
                        <tr>
                            <th valign="middle">21/12/2020</th>
                            <td valign="middle">16:00</td>
                            <td class="text-truncate" valign="middle">Eduardo da Silva</td>
                            <td valign="middle">123.456.789.10</td>
                            <th scope="col">
                                <button class="btn btn-sm btn-success" valign="middle">Editar</button>
                            </th>
                            <th scope="col">
                                <button class="btn btn-sm btn-danger" valign="middle">Excluir</button>
                            </th>
                        </tr>
                        <tr>
                            <th valign="middle">21/12/2020</th>
                            <td valign="middle">16:00</td>
                            <td class="text-truncate" valign="middle">Eduardo da Silva</td>
                            <td valign="middle">123.456.789.10</td>
                            <th scope="col">
                                <button class="btn btn-sm btn-success" valign="middle">Editar</button>
                            </th>
                            <th scope="col">
                                <button class="btn btn-sm btn-danger" valign="middle">Excluir</button>
                            </th>
                        </tr>
                        
                       
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    var dt = document.getElementById('date')
    var res = document.getElementById('res')

    function data() {
        res.innerHTML = 'Horários Agendados do Dia: ' + dt.value
    }
</script>

</html>

<?php
require_once('template/footer.php');

?>