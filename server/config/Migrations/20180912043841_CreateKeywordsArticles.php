<?php
use Migrations\AbstractMigration;

class CreateKeywordsArticles extends AbstractMigration
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
        $table = $this->table('keywords_articles');
        $table->addColumn('keyword_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('article_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('keyword_id', 'keywords', 'id', ['constraint' => 'fk_keywords_articles_keywords']);
        $table->addForeignKey('article_id', 'articles', 'id', ['constraint' => 'fk_keywords_articles_articles']);
        $table->create();
    }
}
