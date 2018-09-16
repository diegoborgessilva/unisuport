<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mensagem".
 *
 * @property integer $idMensagem
 * @property integer $id_de
 * @property integer $id_para
 * @property string $mensagem
 * @property integer $time
 */
class MensagemModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mensagem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_de', 'id_para', 'mensagem', 'time'], 'required'],
            [['id_de', 'id_para', 'time'], 'integer'],
            [['mensagem'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMensagem' => 'Id Mensagem',
            'id_de' => 'Id De',
            'id_para' => 'Id Para',
            'mensagem' => 'Mensagem',
            'time' => 'Time',
        ];
    }
}
