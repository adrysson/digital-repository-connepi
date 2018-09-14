<?php
use Migrations\AbstractMigration;

class CreateRoles extends AbstractMigration
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
        $table = $this->table('roles');
        $table->addColumn('group_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addForeignKey('group_id', 'groups', 'id', ['constraint' => 'fk_groups_roles']);
        $table->create();
    }
}
