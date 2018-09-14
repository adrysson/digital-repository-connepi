<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Institution Entity
 *
 * @property int $id
 * @property int $type_id
 * @property string $city
 * @property string $state
 *
 * @property \App\Model\Entity\TypeOfInstitution $type_of_institution
 * @property \App\Model\Entity\Article[] $articles
 * @property \App\Model\Entity\UsersInstituition[] $users_instituitions
 */
class Institution extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'type_id' => true,
        'city' => true,
        'state' => true,
        'type_of_institution' => true,
        'articles' => true,
        'users_instituitions' => true
    ];
}
