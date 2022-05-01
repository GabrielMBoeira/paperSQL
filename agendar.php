<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="css/style-agendar.css">

<body class="background">

    <div class="cont">
        <div class="cont2">
            <br><h1>Agendar Horário</h1> <br>
            <input class="Text" type="text" name="Nome" id="nome" placeholder="Nome">
            <input class="Text" type="text" name="cpf" size="14" maxlength="14"  onkeypress="mascara_cpf()" id="cpf" placeholder="CPF">
            <div class="cont3" >
                <input class="date dt-mgn" type="date" name="data" id="data">
                <input class="date" type="time" name="Horario" id="hora">
            </div>
            <input class="marcar" type="button" value="Marcar" onclick="verificar()">
        </div>
    </div>
    <script src="script.js"></script>
</body>
    <script>
        function verificar(){

    let cpf = window.document.getElementById('cpf')
    let nome = window.document.getElementById('nome')
    let data = window.document.getElementById('data')
    let hora = window.document.getElementById('hora')


    if(cpf.value.length < 14 || nome.value == '' || data.value == '' || hora.value == ''){

        alert('Preencha todos os campos!')
    }
    }
    </script>
</html>

<?php
require_once('template/footer.php');

?>