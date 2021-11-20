<?php
session_start();

require_once('db/conexao.php');

$conn = conexao();
$sql = "SELECT * FROM registros";
$result = $conn->query($sql);

$dados = array();

while ($row = $result->fetch_assoc()) {
    $dados[] = $row;
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <title>Paper SQL</title>
</head>

<body class="body">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main class="main">
        <div class="p-5">
            <div class="mensagem d-flex justify-content-center align-items-center mb-3">
                <?php
                if (isset($_SESSION['mensagem'])) {
                    print_r($_SESSION['mensagem']);
                    unset($_SESSION['mensagem']);
                }
                ?>
            </div>
            <div class="table-content overflow-auto">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><i>ID</i></th>
                            <th scope="col"><i>Nome</i></th>
                            <th scope="col"><i>Idade</i></th>
                            <th scope="col"><i>Editar</i></th>
                            <th scope="col"><i>Deletar</i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados as $dado) { ?>
                            <tr>
                                <td scope="row"><?= $dado['id'] ?></td>
                                <td class="text-truncate"><?= $dado['nome'] ?></td>
                                <td class="text-truncate"><?= $dado['idade'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $dado['id']  ?>" class="btn btn-sm btn-success">Editar</a>
                                </td>
                                <td>
                                    <a href="db/delete.php?id=<?= $dado['id'] ?>" name="deletar" class="btn btn-sm btn-danger">Deletar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer class="footer d-flex justify-content-end align-items-center">
        <div class="footer-content m-3">
            Uniasselvi Team &copy;
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>