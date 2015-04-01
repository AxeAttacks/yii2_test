<?php
/**
 * Created by PhpStorm.
 * User: Marussia
 * Date: 31.03.2015
 * Time: 11:44
 */

namespace app\controllers;

use Yii;
use app\models\Persons;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;


class UserController extends Controller {
    public function actionIndex(){
        $searchModel = new UserSearch();
        $provider = $searchModel->search(Yii::$app->request->queryParams);
        echo $this->render('index', array(
            'provider' => $provider,
            'searchModel' => $searchModel,
        ));
    }
    public function actionCreate(){
        $model = new User();
        $person = new Persons();
        if ($model->load(Yii::$app->request->post()) && $person->load(Yii::$app->request->post())) {
            if ($model->validate() && $person->validate()) {
                if ($model->save(false)) {
                    $person->id_user = $model->id;
                    $person->save(false);
                    return $this->redirect(['index']);
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'person' => $person,
        ]);
    }
    public function actionUpdate($id){
        $model = User::findOne((int)$id);
        if ($model) {
            $person = $model->persons;
            if ($model->load(Yii::$app->request->post()) && $person->load(Yii::$app->request->post())) {
                if ($model->save(false) && $person->save(false)) {
                    return $this->redirect(['index']);
                }
            }
            return $this->render('create', [
                'model' => $model,
                'person' => $person,
            ]);
        }
        return $this->redirect(['index']);
    }
    public function actionDelete($id){
        $model = User::findOne((int)$id);
        if ($model) {
            $model->delete();
        }
        return $this->redirect(['index']);
    }
} 