<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>
                [
                    'type' => 'INT',
                    'auto_increment' => true
                ],
            'username' =>
                [
                    'type' => 'VARCHAR',
                    'constraint' => 100
                ],
            'email' =>
                [
                    'type' => 'VARCHAR',
                    'constraint' => 150
                ],
            'password' =>
                [
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user');

        $data = [
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
        ];
        $db = \Config\Database::connect();
        $db->table('user')->insert($data);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}