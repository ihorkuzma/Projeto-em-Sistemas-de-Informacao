<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipovenda".
 *
 * @property int $id
 * @property string $descricao
 *
 * @property Vendas[] $vendas
 */
class Tipovenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipovenda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Vendas::className(), ['Tipo_venda_id' => 'id']);
    }
}
