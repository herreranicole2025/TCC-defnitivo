<?php include('../db.php'); ?>

<h2>Professor - Suas Turmas</h2>
<a href="nova_turma.php">Criar Nova Turma</a><br><br>

<?php
$stmt = $pdo->query("SELECT * FROM turmas ORDER BY criado_em DESC");
$turmas = $stmt->fetchAll();

foreach ($turmas as $turma):
?>
    <div style="border:1px solid #ccc; margin:10px; padding:10px;">
        <strong><?= htmlspecialchars($turma['titulo']) ?></strong><br>
        Link de Acesso: <input value="http://localhost/sistema/aluno/entrar.php?codigo=<?= $turma['codigo_acesso'] ?>" readonly>
        <br><a href="adicionar_atividade.php?turma_id=<?= $turma['id'] ?>">Adicionar Atividade</a>
    </div>
<?php endforeach; ?> 
