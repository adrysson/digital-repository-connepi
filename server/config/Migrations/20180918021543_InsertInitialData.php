<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class InsertInitialData extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $data = [
            'id'=>1,
            'name'=>'root',
            'created'=>date('Y-m-d H:i'),
            'modified'=>date('Y-m-d H:i')
        ];
        $this->table('groups')->insert($data)->save();

        $data = [
            'id'=>1,
            'group_id'=>1,
            'name'=>'Administrador',
            'created'=>date('Y-m-d H:i'),
            'modified'=>date('Y-m-d H:i')
        ];
        $this->table('roles')->insert($data)->save();

        $data = [
            'id'=>1,
            'group_id'=>1,
            'role_id'=>1,
            'username'=>'root',
            'password'=>(new DefaultPasswordHasher)->hash('con123'),
            'name'=>'Usuário Administrador',
            'email'=>'root@email.com',
            'cpf'=>rand(11111111111, 99999999999),
            'created'=>date('Y-m-d H:i'),
            'modified'=>date('Y-m-d H:i')
        ];
        $this->table('users')->insert($data)->save();
    }

    public function down()
    {
        $this->execute('DELETE FROM users WHERE id=1');
        $this->execute('DELETE FROM roles WHERE id=1');
        $this->execute('DELETE FROM groups WHERE id=1');
    }
}
