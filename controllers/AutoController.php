<?php

namespace app\controllers;
use app\models\Type;
use app\models\Auto;
use Yii;

class AutoController extends AppController
{
    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
        $auto = Auto::findOne($id);
        return $this->render('view', compact('auto'));
    }

}