<?php

namespace app\models;

use Yii;
use yiibr\brvalidator\CpfValidator;

/**
 * This is the model class for table "funcionario".
 *
 * @property int $id
 * @property string $nome
 * @property string|null $cpf
 * @property string|null $logradouro
 * @property string|null $cep
 * @property string|null $cidade
 * @property string|null $estado
 * @property string|null $numero
 * @property string|null $complemento
 * @property int $cargo_id
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['cargo_id'], 'default', 'value' => 0],
            [['cargo_id'], 'integer'],
            [['nome', 'logradouro', 'cep', 'cidade', 'estado', 'numero', 'complemento'], 'string', 'max' => 255],
            ['cpf', 'string', 'max' => 11],
            ['cpf', CpfValidator::className()],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'logradouro' => 'Logradouro',
            'cep' => 'Cep',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'numero' => 'Número',
            'complemento' => 'Complemento',
            'cargo_id' => 'Cargo',
        ];
    }
}
