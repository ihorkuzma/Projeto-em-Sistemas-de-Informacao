<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "linhavenda".
 *
 * @property int $id
 * @property int $id_alimento
 * @property int $quantidade
 * @property int $id_venda
 *
 * @property Vendas $venda
 * @property Alimento $alimento
 */
class Linhavenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linhavenda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alimento', 'quantidade', 'id_venda'], 'required'],
            [['id_alimento', 'quantidade', 'id_venda'], 'integer'],
            [['id_venda'], 'exist', 'skipOnError' => true, 'targetClass' => Vendas::className(), 'targetAttribute' => ['id_venda' => 'id']],
            [['id_alimento'], 'exist', 'skipOnError' => true, 'targetClass' => Alimento::className(), 'targetAttribute' => ['id_alimento' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_alimento' => 'Id Alimento',
            'quantidade' => 'Quantidade',
            'id_venda' => 'Id Venda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenda()
    {
        return $this->hasOne(Vendas::className(), ['id' => 'id_venda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlimento()
    {
        return $this->hasOne(Alimento::className(), ['id' => 'id_alimento']);
    }
}
