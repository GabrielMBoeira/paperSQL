<?php

function getIdAgenda($data, $hora) {

    $conn = Connection::connectionDB();
    
    $sql = "SELECT id FROM agenda WHERE data = ? AND horario = TIME(?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $data, $hora);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return "Erro ao obter ID Agenda";
    }

}