<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tst_user}}".
 *
 * @property string $id
 * @property string $login
 * @property string $password
 * @property string $email
 *
 * @property TstPersons[] $tstPersons
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return '{{%tst_user}}';
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
            [['login', 'password', 'email'], 'required'],
            [['id'], 'integer'],
            [['email'],'email'],
            [['login'], 'unique'],
            [['login', 'password', 'email'], 'string', 'max' => 255],
            [['login'], 'match', 'pattern' => '/^[A-Za-z_]+([0-9_])*$/'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Email',
            'lastname' => 'Фамилия',
            'firstname' => 'Имя',
            'middlename' => 'Отчество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersons()
    {
        return $this->hasOne(Persons::className(), ['id_user' => 'id']);
    }
}
