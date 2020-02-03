<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $id
 * @property int $Numero_pessoas
 * @property int $Cliente_id
 * @property string $Data_reserva
 *
 * @property Mesa[] $mesas
 * @property Cliente $cliente
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Numero_pessoas', 'Cliente_id', 'Data_reserva'], 'required'],
            [['Numero_pessoas', 'Cliente_id'], 'integer'],
            [['Data_reserva'], 'safe'],
            [['Cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['Cliente_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Numero_pessoas' => 'Numero Pessoas',
            'Cliente_id' => 'Cliente ID',
            'Data_reserva' => 'Data Reserva',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMesas()
    {
        return $this->hasMany(Mesa::className(), ['Reserva_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'Cliente_id']);
    }
}
