<?php

namespace backend\models;

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
            [['id', 'Nome', 'Telemovel', 'Morada'], 'required'],
            [['id', 'Telemovel'], 'integer'],
            [['Nome'], 'string', 'max' => 20],
            [['Morada'], 'string', 'max' => 45],
            [['id'], 'unique'],
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
}
