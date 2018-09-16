<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procedimento".
 *
 * @property integer $idProcedimento
 * @property string $titulo
 * @property string $descricao
 * @property string $categoria
 * @property integer $status
 */
class ProcedimentoModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $url;
    public static function tableName()
    {
        return 'procedimento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'descricao', 'categoria', 'status'], 'required'],
            [['status'], 'integer'],
            [['url'],'file'],
            [['titulo', 'descricao', 'categoria','url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProcedimento' => 'Id Procedimento',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
            'categoria' => 'Categoria',
            'file' => 'Anexo',
        ];
    }
}
