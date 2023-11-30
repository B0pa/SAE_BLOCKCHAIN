<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quiz Entity
 *
 * @property int $id
 * @property string|null $question
 * @property string|null $answer1
 * @property string|null $answer2
 * @property string|null $answer3
 * @property string|null $questionform
 * @property string|null $category
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
        'question' => true,
        'answer1' => true,
        'answer2' => true,
        'answer3' => true,
        'questionform' => true,
        'category' => true,
    ];
}
