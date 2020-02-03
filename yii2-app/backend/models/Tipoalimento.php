<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipoalimento".
 *
 * @property int $id
 *
 * @property Alimento[] $alimentos
 */
class Tipoalimento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipoalimento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlimentos()
    {
        return $this->hasMany(Alimento::className(), ['Tipo_Alimento_id' => 'id']);
    }
}
