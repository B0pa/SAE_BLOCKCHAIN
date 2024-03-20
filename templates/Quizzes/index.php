<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Quiz> $quiz
 */
?>
<body class="" >

<main class="" >
    <div class="" style = "color:#FFF">
        <?= $this->Html->link(__('New Quiz'), ['action' => 'add'],  ['class' => 'btn btn-warning']) ?>
        <h3><?= __('Quiz') ?></h3>
        <div class="">
            <table style = "color:#FFF">
                <?php foreach ($quizzes as $quiz): ?>
                    <tr>
                        <td><?= $this->Number->format($quiz->id) ?></td>
                        <td><?= $quiz->level === null ? '' : $this->Number->format($quiz->level) ?></td>
                        <td><?= h($quiz->question) ?></td>
                        <!-- Vérifiez si les réponses ne sont pas null avant de les parcourir -->
                        <?php if (!empty($quiz->answers)): ?>
                            <?php foreach ($quiz->answers as $answers): ?>
                                <?php foreach ($answers as $answer): ?>
                                    <td><?= h($answer->answer) ?></td>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <!-- Fin de l'affichage des réponses -->
                        <td><?= h($quiz->questionform) ?></td>
                        <td><?= h($quiz->category) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $quiz->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quiz->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quiz->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>
    </div>
</main>
</body>
