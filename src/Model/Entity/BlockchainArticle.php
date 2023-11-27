<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BlockchainArticle Entity
 *
 * @property int|null $niveau
 * @property int|null $id
 * @property string|null $titre
 * @property string|null $contenue
 * @property string|resource|null $image
 */
class BlockchainArticle extends Entity
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
        'niveau' => true,
        'id' => true,
        'titre' => true,
        'contenue' => true,
        'image' => true,
    ];
}
