<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mesa".
 *
 * @property int $id
 * @property int $Lugares
 * @property int $Reserva_id
 *
 * @property Vendas $id0
 * @property Reserva $reserva
 */
class Mesa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mesa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Lugares', 'Reserva_id'], 'required'],
            [['Lugares', 'Reserva_id'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Vendas::className(), 'targetAttribute' => ['id' => 'id_mesa']],
            [['Reserva_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['Reserva_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Lugares' => 'Lugares',
            'Reserva_id' => 'Reserva ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Vendas::className(), ['id_mesa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::className(), ['id' => 'Reserva_id']);
    }
}
