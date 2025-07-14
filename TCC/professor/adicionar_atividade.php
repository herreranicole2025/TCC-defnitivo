<?php include('../db.php');

$turma_id = $_GET['turma_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $legenda = $_POST['legenda'];
    $arquivo = null;

    if ($_FILES['arquivo']['tmp_name']) {
        $upload_dir = "../turmas/$turma_id/atividades/";
        if (!file_exists($upload_dir)) mkdir($upload_dir, 0777, true);
        $arquivo = $upload_dir . basename($_FILES["arquivo"]["name"]);
        move_uploaded_file($_FILES["arquivo"]["tmp_name"], $arquivo);
    }

    $stmt = $pdo->prepare("INSERT INTO atividades (turma_id, titulo, legenda, arquivo) VALUES (?, ?, ?, ?)");
    $stmt->execute([$turma_id, $titulo, $legenda, $arquivo]);

    header("Location: dashboard.php");
}
?>

<form method="POST" enctype="multipart/form-data">
    <h3>Nova Atividade</h3>
    Título: <input name="titulo" required><br>
    Legenda: <textarea name="legenda"></textarea><br>
    Arquivo: <input type="file" name="arquivo"><br>
    <button type="submit">Postar</button>
</form>
