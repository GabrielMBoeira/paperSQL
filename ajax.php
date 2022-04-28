<?php
require_once("db/conexao.php");

$conn = Connection::connectionDB();

$data = htmlspecialchars($_POST['data']);
$data = mysqli_real_escape_string($conn, $data);

$sql = "SELECT horario FROM agenda WHERE data = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $data);
$stmt->execute();

$result = $stmt->get_result();

$dados = [];

if ($result->num_rows > 0 ) {
   
    while ($data = $result->fetch_assoc()) {
        $dados[] =  $data['horario'];
    }
    
    echo json_encode($dados);
    
} else {
    echo json_encode('Erro no retorno de horários');
}

