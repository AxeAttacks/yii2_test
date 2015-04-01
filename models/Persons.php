<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tst_persons}}".
 *
 * @property string $id
 * @property string $id_user
 * @property string $lastname
 * @property string $firstname
 * @property string $middlename
 *
 * @property TstUser $idUser
 */
class Persons extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    //public $persons;
    public static function tableName()
    {
        return '{{%tst_persons}}';
    }

    public static function primaryKey()
    {
        return array('id');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lastname', 'firstname', 'middlename'], 'required'],
            [['id', 'id_user', 'contract'], 'integer'],
            [['lastname', 'firstname', 'middlename'], 'string', 'max' => 30],
            [['job'], 'string', 'max' => 255],
            [['contract'], 'string', 'min' => 6,'max' => 6],
            //[['lastname','firstname','middlename'], 'match', 'pattern' => '/^[А-Яа-я\s]+$/'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'lastname' => 'Фамилия',
            'firstname' => 'Имя',
            'middlename' => 'Отчество',
            'job' => 'Организация',
            'contract' => 'Номер договора'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
