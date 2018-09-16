<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idUsuario
 * @property string $nome
 * @property string $sobrenome
 * @property string $email
 * @property string $dasId
 * @property string $telefone
 */
class UsuarioModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sobrenome', 'email', 'dasId', 'telefone'], 'required'],
            [['nome', 'sobrenome', 'email'], 'string', 'max' => 255],
            [['dasId'], 'string', 'max' => 10],
            [['telefone'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'nome' => 'Nome',
            'sobrenome' => 'Sobrenome',
            'email' => 'Email',
            'dasId' => 'Das ID',
            'telefone' => 'Telefone',
        ];
    }
}
