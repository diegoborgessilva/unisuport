<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $autor
 * @property string $conteudo
 * @property string $data
 */
class PostModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'autor', 'conteudo'], 'required'],
            [['conteudo'], 'string'],
            [['data'], 'safe'],
            [['titulo', 'autor'], 'string', 'max' => 255],
            [['titulo'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'autor' => 'Autor',
            'conteudo' => 'Conteudo',
            'data' => 'Data',
        ];
    }
}
