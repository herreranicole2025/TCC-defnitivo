<?php include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $codigo = uniqid(); // Código de acesso para alunos

    $stmt = $pdo->prepare("INSERT INTO turmas (titulo, codigo_acesso) VALUES (?, ?)");
    $stmt->execute([$titulo, $codigo]);

    header("Location: dashboard.php");
}
?>

<form method="POST">
    <h3>Criar Turma</h3>
    Título: <input name="titulo" required><br>
    <button type="submit">Criar</button>
</form>
