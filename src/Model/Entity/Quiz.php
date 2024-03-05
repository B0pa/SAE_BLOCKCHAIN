<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quiz Entity
 *
 * @property int $id
 * @property int|null $level
 * @property string|null $question
 * @property string|null $realanswer
 * @property string|null $questionform
 * @property string|null $category
 * @property string|null $csv_link
 * @property string|null $csv_columne
 */
class Quiz extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
    */
    protected array $_accessible = [
        'level' => true,
        'question' => true,
        'realanswer' => true,
        'questionform' => true,
        'category' => true,
        'csv_link' => true,
        'csv_columne' => true,
        'answers' => true, // il faut cette ligne là pour autoriser l'édition de l'entity answers depuis le model Quizzes
        // D'accord je n'avais pas compris sa comme sa ^^'
        // sinon vous pouvez complétement commenter cette propriété et vous en occuper en dernier ;)
        // D'accord je ne savais pas du tout
    ]; 
}
