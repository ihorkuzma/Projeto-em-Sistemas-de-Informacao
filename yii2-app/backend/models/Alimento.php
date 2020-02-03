<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "alimento".
 *
 * @property int $id
 * @property string $Nome_alimento
 * @property double $Preco
 * @property int $Stock
 * @property int $Tipo_Alimento_id
 *
 * @property Tipoalimento $tipoAlimento
 * @property Linhavenda[] $linhavendas
 */
class Alimento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alimento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome_alimento', 'Preco', 'Stock', 'Tipo_Alimento_id'], 'required'],
            [['Preco'], 'number'],
            [['Stock', 'Tipo_Alimento_id'], 'integer'],
            [['Nome_alimento'], 'string', 'max' => 45],
            [['Tipo_Alimento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoalimento::className(), 'targetAttribute' => ['Tipo_Alimento_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nome_alimento' => 'Nome Alimento',
            'Preco' => 'Preco',
            'Stock' => 'Stock',
            'Tipo_Alimento_id' => 'Tipo  Alimento ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoAlimento()
    {
        return $this->hasOne(Tipoalimento::className(), ['id' => 'Tipo_Alimento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhavendas()
    {
        return $this->hasMany(Linhavenda::className(), ['id_alimento' => 'id']);
    }
}
