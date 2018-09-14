<?php
use Migrations\AbstractMigration;

class CreateAuthorsArticles extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('authors_articles');
        $table->addColumn('author_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('article_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('author_id', 'authors', 'id', ['constraint' => 'fk_authors_articles_authors']);
        $table->addForeignKey('article_id', 'articles', 'id', ['constraint' => 'fk_authors_articles_articles']);
        $table->create();
    }
}
