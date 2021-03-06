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
 *
 * @property Cargo $cargo
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
            [['nome', 'cpf'], 'required'],
            [['cargo_id'], 'default', 'value' => null],
            [['cargo_id'], 'integer'],
            [['nome', 'logradouro', 'cidade', 'estado', 'numero', 'complemento'], 'string', 'max' => 255],
            [['cpf'], 'string', 'max' => 11],
            [['cep'], 'string', 'max' => 8],
            ['cpf', CpfValidator::className()],
            [['cargo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['cargo_id' => 'id']],
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

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['id' => 'cargo_id']);
    }
}
