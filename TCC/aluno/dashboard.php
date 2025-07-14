<?php include('../db.php');
session_start();

$turmas_aluno = $_SESSION['turmas_aluno'] ?? [];

foreach ($turmas_aluno as $turma_id):
    // Buscar turma
    $stmt = $pdo->prepare("SELECT * FROM turmas WHERE id = ?");
    $stmt->execute([$turma_id]);
    $turma = $stmt->fetch();

    // Buscar atividades
    $stmt = $pdo->prepare("SELECT * FROM atividades WHERE turma_id = ? ORDER BY criado_em DESC");
    $stmt->execute([$turma_id]);
    $atividades = $stmt->fetchAll();
?>
    <div style="border:1px solid #ccc; margin:10px; padding:10px;">
        <strong><?= htmlspecialchars($turma['titulo']) ?></strong><br><br>
        <u>Atividades:</u><br>
        <?php if (count($atividades)): ?>
            <ul>
                <?php foreach ($atividades as $at): ?>
                    <li>
                        <strong><?= htmlspecialchars($at['titulo']) ?></strong><br>
                        <?= nl2br(htmlspecialchars($at['legenda'])) ?><br>
                        <?php if ($at['arquivo']): ?>
                            <a href="<?= $at['arquivo'] ?>" target="_blank">Ver Arquivo</a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            Nenhuma atividade ainda.
        <?php endif; ?>
    </div>
<?php endforeach; ?>
