<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "treinamento".
 *
 * @property integer $idTreinamento
 * @property string $codigo
 * @property string $nome
 * @property string $descricao
 * @property string $categoria
 */
class TreinamentoModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $url;
    public static function tableName()
    {
        return 'treinamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'nome', 'descricao', 'categoria'], 'required'],
            [['url'],'file'],
            [['codigo', 'nome', 'descricao', 'categoria', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTreinamento' => 'Id Treinamento',
            'codigo' => 'Codigo',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'categoria' => 'Categoria',
            'file' => 'Anexo',
        ];
    }
}
