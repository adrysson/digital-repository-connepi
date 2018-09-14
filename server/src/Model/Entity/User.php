<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int $group_id
 * @property int $role_id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $email
 * @property string $cpf
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\UsersInstituition[] $users_instituitions
 */
class User extends Entity
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
        'group_id' => true,
        'role_id' => true,
        'username' => true,
        'password' => true,
        'name' => true,
        'email' => true,
        'cpf' => true,
        'created' => true,
        'modified' => true,
        'group' => true,
        'role' => true,
        'users_instituitions' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
