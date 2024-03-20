<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Quiz> $quiz
 */
?>
<main class="navmarge index-main"  >
    <?= $this->Html->link(__('New Quiz'), ['action' => 'add'],  ['class' => 'index-btn-new grow']) ?>
    <h3 class="index-title" ><?= __('Quiz') ?></h3>
    <div class="index-conteneur-table">
        <table>
            <thead class="index-table-thead" >
                <tr>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('id') ?></th>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('level') ?></th>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('question') ?></th>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('realanswer') ?></th>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('questionform') ?></th>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('category') ?></th>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('csv_link') ?></th>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('csv_columne') ?></th>
                    <th class="actions index-table-th-td"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($quizzes as $quiz): ?>
                    <tr>
                        <td class="index-table-th-td"><?= $this->Number->format($quiz->id) ?></td>
                        <td class="index-table-th-td"><?= $quiz->level === null ? '' : $this->Number->format($quiz->level) ?></td>
                        <td class="index-table-th-td"><?= h($quiz->question) ?></td>
                        <!-- Vérifiez si les réponses ne sont pas null avant de les parcourir -->
                        <?php
                            foreach ($quizzes['answers'] as $answer) {

                                echo $answer['answer'];

                            }
                         ?>
                        <!-- Fin de l'affichage des réponses -->
                        <td class="index-table-th-td"><?= h($quiz->questionform) ?></td>
                        <td class="index-table-th-td"><?= h($quiz->category) ?></td>
                        <td  class="actions index-table-th-td">
                            <?= $this->Html->link(('View'), ['action' => 'view', $quiz->id]) ?>
                            <?= $this->Html->link(('Edit'), ['action' => 'edit', $quiz->id]) ?>
                            <?= $this->Form->postLink('Delete', ['action' => 'delete', $quiz->id], ['confirm' => 'Are you sure you want to delete # {0}?', $quiz->id]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator index-paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</main>