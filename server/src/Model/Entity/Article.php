<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $title
 * @property int $year
 * @property int $institution_id
 * @property string $archive
 * @property int $approved
 * @property int $area_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CategoryOfArticle $category_of_article
 * @property \App\Model\Entity\Institution $institution
 * @property \App\Model\Entity\Area $area
 * @property \App\Model\Entity\Author[] $authors
 * @property \App\Model\Entity\Keyword[] $keywords
 */
class Article extends Entity
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
        'category_id' => true,
        'title' => true,
        'year' => true,
        'institution_id' => true,
        'archive' => true,
        'approved' => true,
        'area_id' => true,
        'created' => true,
        'modified' => true,
        'category_of_article' => true,
        'institution' => true,
        'area' => true,
        'authors' => true,
        'keywords' => true
    ];
}
