<?php
require_once('template/header.php');
?>


    <link rel="stylesheet" href="css/consultar-hr.css">


    <div class="cont-table over">
        <div class="back-table">
        <div class="inputs">
            <input class="ipt1" type="date" name="date" id="date" onchange="data()">
            <input class="ipt2" type="time" name="time" id="time">
            <input class="btn" type="button" value="Filtrar">
        </div>
            <table border="1" class="table-round-corner">
                <caption>Horários</caption>
                <tr>
                    <td class="title">NOME</td>
                    <td class="title">CPF</td>
                    <td class="title">DATA</td>
                    <td class="title">HORÁRIO</td>
                </tr>
                <tr>
                    <td>Marcia souza</td>
                    <td>123.456.789-10</td>
                    <td>25-05-2022</td>
                    <td>16:25</td>
                </tr>
                <!-- teste -->
                <tr>
                    <td>Marcia souza</td>
                    <td>123.456.789-10</td>
                    <td>25-05-2022</td>
                    <td>16:25</td>
                </tr>
                <tr>
                    <td>Marcia souza</td>
                    <td>123.456.789-10</td>
                    <td>25-05-2022</td>
                    <td>16:25</td>
                </tr>
                <tr>
                    <td>Marcia souza</td>
                    <td>123.456.789-10</td>
                    <td>25-05-2022</td>
                    <td>16:25</td>
                </tr>
                <tr>
                    <td>Marcia souza</td>
                    <td>123.456.789-10</td>
                    <td>25-05-2022</td>
                    <td>16:25</td>
                </tr>
                <tr>
                    <td>Marcia souza</td>
                    <td>123.456.789-10</td>
                    <td>25-05-2022</td>
                    <td>16:25</td>
                </tr>
                <tr>
                    <td>Marcia souza</td>
                    <td>123.456.789-10</td>
                    <td>25-05-2022</td>
                    <td>16:25</td>
                </tr>
                <tr>
                    <td>Marcia souza</td>
                    <td>123.456.789-10</td>
                    <td>25-05-2022</td>
                    <td>16:25</td>
                </tr>
                <tr>
                    <td>Marcia souza</td>
                    <td>123.456.789-10</td>
                    <td>25-05-2022</td>
                    <td>16:25</td>
                    <tr>
                        <td>Marcia souza</td>
                        <td>123.456.789-10</td>
                        <td>25-05-2022</td>
                        <td>16:25</td>
                    </tr>
                    <tr>
                        <td>Marcia souza</td>
                        <td>123.456.789-10</td>
                        <td>25-05-2022</td>
                        <td>16:25</td>
                    </tr>
                    <tr>
                        <td>Marcia souza</td>
                        <td>123.456.789-10</td>
                        <td>25-05-2022</td>
                        <td>16:25</td>
                    </tr>
                    <tr>
                        <td>Marcia souza</td>
                        <td>123.456.789-10</td>
                        <td>25-05-2022</td>
                        <td>16:25</td>
                    
                <!-- teste -->
                <tfoot>
                    <tr>
                        <td id="res" colspan="4" class="ft">
                            Selecione Uma Data...
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script>
        var dt = document.getElementById('date')
        var res = document.getElementById('res')
        function data(){
            res.innerHTML = 'Horários Agendados do Dia: ' + dt.value
        }
    </script>

</html>

<?php
require_once('template/footer.php');

?>