<?php

namespace app\controllers;

use app\models\Consulta;
use app\models\ConsultaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Paciente;
use app\models\Medico;
use app\models\Especialidade;
use app\models\Disponibilidadehorario;
use Yii;


/**
 * ConsultaController implements the CRUD actions for Consulta model.
 */
class ConsultaController extends Controller
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
                if ($usuario->tipo_usuario !== 'administrador' && $usuario->tipo_usuario !== 'recepcionista') {
                   throw new \yii\web\ForbiddenHttpException('Você não tem permissão para acessar esta funcionalidade.');
                 } */
          }
          return true;
      }
      return false;
    }

    /**
     * Lists all Consulta models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ConsultaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Consulta model.
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
     * Creates a new Consulta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
     {
        $model = new Consulta();
          $pacientes = Paciente::find()->all();
          $medicos = Medico::find()->all();
          $especialidades = Especialidade::find()->all();
          $disponibilidades = Disponibilidadehorario::find()->all();


         if ($this->request->isPost) {
              if ($model->load($this->request->post()) && $model->save()) {
               return $this->redirect(['view', 'id' => $model->id]);
             }
        } else {
              $model->loadDefaultValues();
        }
       return $this->render('create', [
          'model' => $model,
          'pacientes' => $pacientes,
            'medicos' => $medicos,
           'especialidades' => $especialidades,
           'disponibilidades' => $disponibilidades
      ]);
      }


    /**
     * Updates an existing Consulta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Consulta model.
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
     * Finds the Consulta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Consulta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Consulta::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}