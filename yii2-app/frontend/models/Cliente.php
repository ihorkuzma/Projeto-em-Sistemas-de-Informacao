<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $Nome
 * @property int $Telemovel
 * @property string $Morada
 *
 * @property User $id0
 * @property Reserva[] $reservas
 * @property Vendas[] $vendas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Telemovel', 'Morada'], 'required'],
            [['Telemovel'], 'integer'],
            [['Nome'], 'string', 'max' => 20],
            [['Morada'], 'string', 'max' => 45],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nome' => 'Nome',
            'Telemovel' => 'Telemovel',
            'Morada' => 'Morada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['Cliente_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Vendas::className(), ['Cliente_id' => 'id']);
    }
}
