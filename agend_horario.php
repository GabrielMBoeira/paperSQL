<?php
session_start();
require_once('db/conexao.php');
require_once('template/header.php');

$conn = Connection::connectionDB();

$sql = "SELECT DISTINCT data FROM agenda";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<link rel="stylesheet" href="css/agend_horario.css">

<main>
    <div class="content-form">
        <?php
        if (isset($_SESSION['msg_agend_horario'])) {
            print_r($_SESSION['msg_agend_horario']);
            unset($_SESSION['msg_agend_horario']);
        }
        ?>
        <form class="row g-3" id="frm">
            <div class="title-form col-md-12 d-flex justify-content-center align-itens-center fs-2">Agendar cliente</div>
            <div class="col-md-6">
                <label for="data" class="form-label">Data:</label>
                <select id="data" name="data" class="form-select" onchange="ajax()">
                    <option selected>Escolha uma data</option>

                    <?php
                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                            $dia = $data['data'];

                            $dataConvertida = date('d/m/Y', strtotime($dia));
                    ?>
                            <option value="<?= $data['data'] ?>"><?= $dataConvertida ?></option>
                    <?php
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="col-md-6">
                <label for="hora" class="form-label">Hora:</label>
                <select id="hora" name="hora" class="form-select">
                    <option id="optionId">Escolha um horário</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome...">
            </div>
            <div class="col-md-8">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF...">
            </div>
            <div class="content-button d-flex justify-content-end">
                <button class="btn btn-primary" name="salvar" onclick="return validarForm()">Salvar</button>
            </div>
        </form>
    </div>
</main>

<?php
require_once('template/footer.php');
?>

<script>
    function ajax() {

        let hora = document.querySelector('#hora');
        let optionId = document.querySelector('#optionId');
        let data = document.querySelector('#data').value;

        hora.innerHTML = "";

        var http = new XMLHttpRequest();
        var url = 'ajax.php';
        var params = `data=${data}`;
        http.open('POST', url, true);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {
            if (http.readyState == 4 && http.status == 200) {

                let resposta = JSON.parse(http.responseText);
                let horaAjax = document.getElementById('horaAjax');

                $('#hora').append($('<option>').html('<option selected>Escolha um horário</option>'));

                for (var i = 0; i < resposta.length; i++) {
                    $('#hora').append($('<option>').text(resposta[i]));
                }
            }
        }
        http.send(params);
    }

    function validarForm() {
        let frm = document.getElementById("frm");
        let data = document.getElementById("data");
        let hora = document.getElementById("hora");
        let nome = document.getElementById("nome");
        let cpf = document.getElementById("cpf");

        if (data.value == "Escolha uma data") {
            alert('Selecione uma data')
            data.focus()
            return false;
        }

        if (hora.value == "Escolha um horário") {
            alert('Selecione um horário')
            hora.focus()
            return false;
        }
        
        if (nome.value == "") {
            alert('Insira um nome')
            nome.focus()
            return false;
        }

        if (cpf.value == "") {
            alert('Insira um CPF')
            cpf.focus()
            return false;
        }

        frm.method = "post"
        frm.action = "db/action_agend_horario.php"
        frm.submit()

    }
</script>