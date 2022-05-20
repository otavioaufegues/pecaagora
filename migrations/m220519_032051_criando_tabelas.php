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

        $this->createIndex(
            'idx-funcionario-cargo_id',
            'funcionario',
            'cargo_id'
        );

        $this->createTable('cargo', [
            'id' => Schema::TYPE_PK,
            'nome' => Schema::TYPE_STRING . ' NOT NULL',
        ]);

        $this->addForeignKey(
            'fk-funcionario-cargo_id',
            'funcionario',
            'cargo_id',
            'cargo',
            'id',
            'CASCADE'
        );



        $this->batchInsert('cargo', [
            'nome'
        ], [['Gerente'], ['Vendedor'], ['Estagiário']]);

        $this->insert('funcionario', [
            'nome' => "João Silva",
            'cpf' => "65450881061",
            'logradouro' => "Avenida Brasil",
            'cep' => "36036130",
            'cidade' => "Juiz de Fora",
            'estado' => "MG",
            'numero' => "12",
            'complemento' => "507 B",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-funcionario-cargo_id',
            'funcionario'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-funcionario-cargo_id',
            'funcionario'
        );


        $this->dropTable('funcionario');
        $this->dropTable('cargo');
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
