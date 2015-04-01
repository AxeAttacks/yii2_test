<?php
/**
 * Created by PhpStorm.
 * User: Marussia
 * Date: 31.03.2015
 * Time: 21:01
 */
namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\base\Model;
use app\models\Persons;

class UserSearch extends User{

    public $lastname;
    public $firstname;
    public $middlename;
    public function rules()
    {
        return [
            [['login', 'email', 'lastname', 'firstname', 'middlename'], 'safe'],
        ];
    }
    public function scenarios()
    {
        return Model::scenarios();
    }
    public function search($params)
    {
        $query = User::find();
        $query->joinWith(['persons']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['lastname'] = [
            'asc' => [Persons::tableName() . '.lastname' => SORT_ASC],
            'desc' => [Persons::tableName() . '.lastname' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['firstname'] = [
            'asc' => [Persons::tableName() . '.firstname' => SORT_ASC],
            'desc' => [Persons::tableName() . '.firstname' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['middlename'] = [
            'asc' => [Persons::tableName() . '.middlename' => SORT_ASC],
            'desc' => [Persons::tableName() . '.middlename' => SORT_DESC]
        ];
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'login', $this->login]);
        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['like', Persons::tableName() . '.lastname', $this->lastname]);
        $query->andFilterWhere(['like', Persons::tableName() . '.firstname', $this->firstname]);
        $query->andFilterWhere(['like', Persons::tableName() . '.middlename', $this->middlename]);
        return $dataProvider;
    }
}