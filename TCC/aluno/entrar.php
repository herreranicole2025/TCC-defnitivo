<?php include('../db.php');

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    $stmt = $pdo->prepare("SELECT id FROM turmas WHERE codigo_acesso = ?");
    $stmt->execute([$codigo]);

    if ($turma = $stmt->fetch()) {
        $turma_id = $turma['id'];

        // Adiciona entrada do aluno
        $stmt = $pdo->prepare("INSERT INTO alunos (turma_id, email) VALUES (?, '')");
        $stmt->execute([$turma_id]);

        // Salva turma na sessão do aluno
        session_start();
        $_SESSION['turmas_aluno'][] = $turma_id;

        header("Location: dashboard.php");
        exit;
    } else {
        echo "Código de acesso inválido.";
    }
}
?>

<h3>Você precisa de um link de acesso para entrar em uma turma</h3>
