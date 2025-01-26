<?php

namespace app\controllers;

use app\models\Medico;
use app\models\MedicoSearch;
use app\models\Especialidade; // Importe o model de especialidades
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * MedicoController implements the CRUD actions for Medico model.
 */
class MedicoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function beforeAction($action)
    {
      if (parent::beforeAction($action)) {
          if (!Yii::$app->user->isGuest) {
              $usuario = Yii::$app->user->identity;
               if($action->id == 'index' || $action->id == 'view'){ // Permitir o acesso a action index e view para todos os usuarios
                  return true;
               }/**
                if ($usuario->tipo_usuario !== 'administrador') {
                   throw new \yii\web\ForbiddenHttpException('Você não tem permissão para acessar esta funcionalidade.');
                 } */
          }
          return true;
      }
      return false;
    }

    /**
     * Lists all Medico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MedicoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Medico model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Medico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
     public function actionCreate()
    {
      $model = new Medico();
      $especialidades = Especialidade::find()->all();


      if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->save()) {
                  return $this->redirect(['view', 'id' => $model->id]);
                  }
           }

      } else {
        $model->loadDefaultValues();
      }

        return $this->render('create', [
            'model' => $model,
            'especialidades' => $especialidades,
         ]);
    }


    /**
     * Updates an existing Medico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
       $model = $this->findModel($id);
       $especialidades = Especialidade::find()->all();


      if ($this->request->isPost) {
             if ($model->load($this->request->post())) {
                if ($model->save()) {
                   return $this->redirect(['view', 'id' => $model->id]);
                  }
                }

     } else {
          $model->loadDefaultValues();
     }

       return $this->render('update', [
          'model' => $model,
            'especialidades' => $especialidades,
        ]);
    }

    /**
     * Deletes an existing Medico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Medico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Medico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Medico::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}