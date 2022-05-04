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

<link rel="stylesheet" href="css/style-agendar.css">

<body class="background">

    <form id="frm">
        <div class="cont">
            <div class="cont2">
                <?php
                if (isset($_SESSION['msg_agend_horario'])) {
                    print_r($_SESSION['msg_agend_horario']);
                    unset($_SESSION['msg_agend_horario']);
                }
                ?>
                <h1>Agendar Horário</h1> <br>
                <input class="Text" type="text" name="nome" id="nome" placeholder="Nome">
                <input class="Text" type="text" name="cpf" size="14" maxlength="14" onkeypress="mascara_cpf()" id="cpf" placeholder="CPF">
                <div class="cont3">

                    <select id="data" name="data" class="form-select date dt-mgn" onchange="ajax()">
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

                    <select id="hora" name="hora" class="form-select date hora">
                        <option id="optionId">Hora</option>
                    </select>

                </div>
                <button class="marcar" name="salvar" id="salvar" onclick="return verificar()">Marcar</button>
            </div>
        </div>
    </form>

    <script src="script.js"></script>
</body>
<script>
    function verificar() {

        let salvar = document.getElementById('salvar')
        let cpf = document.getElementById('cpf')
        let nome = document.getElementById('nome')
        let data = document.getElementById('data')
        let hora = document.getElementById('hora')

        if (!nome.value) {
            alert('Insira um nome')
            data.focus()
            return false;
        }

        if (!cpf.value) {
            alert('Insira um CPF')
            cpf.focus()
            return false;
        }

        if (data.value == "Escolha uma data") {
            alert('Selecione uma data')
            data.focus()
            return false;
        }

        if (hora.value == "Hora" || hora.value == "") {
            alert('Selecione um horário')
            hora.focus()
            return false;
        }

        frm.method = "post"
        frm.action = "db/action_agend_horario.php"
        frm.submit()
    }

    function mascara_cpf() {
        let cpf = window.document.getElementById('cpf')

        if (cpf.value.length == 3 || cpf.value.length == 7) {
            cpf.value += '.'
        } else if (cpf.value.length == 11) {
            cpf.value += '-'
        }
    }


    function ajax() {
        let hora = document.querySelector('#hora');
        let optionId = document.querySelector('#optionId');
        let data = document.querySelector('#data').value;

        hora.innerHTML = "";

        if (data != "Escolha uma data") {
            var http = new XMLHttpRequest();
            var url = 'ajax.php';
            var params = `data=${data}`;
            http.open('POST', url, true);

            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            http.onreadystatechange = function() {
                if (http.readyState == 4 && http.status == 200) {

                    let resposta = JSON.parse(http.responseText);
                    let horaAjax = document.getElementById('horaAjax');

                    $('#hora').append($('<option>').html('<option selected>Hora</option>'));

                    for (var i = 0; i < resposta.length; i++) {
                        $('#hora').append($('<option>').text(resposta[i]));
                    }
                }
            }
            http.send(params);

        } else {
            $('#hora').append($('<option>').html('<option selected>Hora</option>'));
        }
    }
</script>

<?php
require_once('template/footer.php');
?>