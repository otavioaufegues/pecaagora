<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220519_032051_criando_tabelas
 */
class m220519_032051_criando_tabelas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('funcionario', [
            'id' => Schema::TYPE_PK,
            'nome' => Schema::TYPE_STRING . ' NOT NULL',
            'cpf' => Schema::TYPE_STRING,
            'logradouro' => Schema::TYPE_STRING,
            'cep' => Schema::TYPE_STRING,
            'cidade' => Schema::TYPE_STRING,
            'estado' => Schema::TYPE_STRING,
            'numero' => Schema::TYPE_STRING,
            'complemento' => Schema::TYPE_STRING,
            'cargo_id' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 1',
        ]);

        $this->createTable('cargo', [
            'id' => Schema::TYPE_PK,
            'nome' => Schema::TYPE_STRING . ' NOT NULL',
        ]);

        $this->batchInsert('cargo', [
            'nome'
        ], [['Gerente'], ['Vendedor'], ['Estagiário']]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220519_032051_criando_tabelas cannot be reverted.\n";
        $this->delete('noticias', ['id' => 1]);
        $this->dropTable('noticias');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220519_032051_criando_tabelas cannot be reverted.\n";

        return false;
    }
    */
}
