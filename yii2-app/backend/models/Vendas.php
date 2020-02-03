<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vendas".
 *
 * @property int $id
 * @property int $Cliente_id
 * @property int $Tipo_venda_id
 * @property int $id_mesa
 *
 * @property Linhavenda[] $linhavendas
 * @property Mesa $mesa
 * @property Tipovenda $tipoVenda
 * @property User $cliente
 */
class Vendas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Cliente_id', 'Tipo_venda_id', 'id_mesa'], 'required'],
            [['Cliente_id', 'Tipo_venda_id', 'id_mesa'], 'integer'],
            [['Tipo_venda_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipovenda::className(), 'targetAttribute' => ['Tipo_venda_id' => 'id']],
            [['Cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Cliente_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Cliente_id' => 'Cliente ID',
            'Tipo_venda_id' => 'Tipo Venda ID',
            'id_mesa' => 'Id Mesa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhavendas()
    {
        return $this->hasMany(Linhavenda::className(), ['id_venda' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMesa()
    {
        return $this->hasOne(Mesa::className(), ['id' => 'id_mesa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoVenda()
    {
        return $this->hasOne(Tipovenda::className(), ['id' => 'Tipo_venda_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(User::className(), ['id' => 'Cliente_id']);
    }
}
