<?php
use Migrations\AbstractMigration;

class CreateUsersInstituitions extends AbstractMigration
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
        $table = $this->table('users_instituitions');
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('institution_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('user_id', 'users', 'id', ['constraint' => 'fk_users_institutions_users']);
        $table->addForeignKey('institution_id', 'institutions', 'id', ['constraint' => 'fk_users_institutions_institutions']);
        $table->create();
    }
}
