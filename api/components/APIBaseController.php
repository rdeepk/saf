<?php

namespace api\components;

use yii;
use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\Response;
use yii\data\ActiveDataProvider;

/**
 * Description of APIBaseController
 *
 */
abstract class APIBaseController extends ActiveController
{

    protected $dataFetcher = 'find';
    protected $dataFetcherParams = Null;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'dataProvider'];
        $actions['index']['checkAccess'] = [$this, 'checkAccess'];
        $actions['view']['checkAccess'] = [$this, 'checkAccess'];
        $actions['create']['checkAccess'] = [$this, 'checkAccess'];
        $actions['delete']['checkAccess'] = [$this, 'checkAccess'];
        $actions['update']['checkAccess'] = [$this, 'checkAccess'];
        $actions['view']['findModel'] = [$this, 'findModel'];
        return $actions;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
          'class' => CompositeAuth::className(),
          'authMethods' => [
            QueryParamAuth::className(),
          ],
        ];
        $behaviors['bootstrap'] = [
          'class' => 'yii\filters\ContentNegotiator',
          'formats' => [
            'application/json' => Response::FORMAT_JSON,
          ],
        ];
        return $behaviors;
    }

//    protected function _signup()
//    {
//        $signup = new SignupForm();
//        if (!isset($this->login_attributes) || !count($this->login_attributes)) {
//            $this->setResponseMessage(array(
//              'status' => 400,
//              'message' => 'Login Data Missing',
//              'model' => $signup->errors
//            ));
//        }
//        foreach ($this->login_attributes as $key => $val) {
//            $signup->$key = $val;
//        }
//        if ($signup->signup()) {
//            $this->setResponseMessage([
//              'status' => 200,
//              'message' => ucfirst($signup->type) . " signed-up successfully"
//            ]);
//        } else {
//            $this->setResponseMessage([
//              'status' => 403,
//              'message' => 'Signup Data Missing',
//              'model' => $signup->errors
//            ]);
//        }
//    }
/**
 * 
 * @deprecated since version number
 * @return type
 */
    protected function getInput()
    {
        return yii::$app->getRequest()->getBodyParams();
    }
    protected function getBodyParams()
    {
        return yii::$app->getRequest()->getBodyParams();
    }

    public function setDataFetcher($name)
    {
        $this->dataFetcher = $name;
    }

    public function dataProvider($api_controller)
    {
        $model_class = $api_controller->modelClass;
        return new ActiveDataProvider([
          'query' => $model_class::{$this->dataFetcher}($this->dataFetcherParams),
          'pagination' => [
            'pageSize' => Yii::$app->request->get('per-page', 20),
          ]
        ]);
    }

    public function checkAccess($action, $model = null, $params = array())
    {
        $accessMethodName = 'apiAccess' . ucfirst($action);
        if (method_exists($this, $accessMethodName)) {
            call_user_func([$this, $accessMethodName], $model, $params);
        } else {
            return parent::checkAccess($action, $model, $params);
        }
    }

    public function findModel($id)
    {
        $modelClass = $this->modelClass;
        if (!Yii::$app->getRequest()->get('organization_id')) {
            return new IzapThrowException('BadRequestHttpException', new IzapApiExceptionMessages(02, end(explode('\\', $modelClass))));
        }
        $model = $modelClass::findByCondition(['id' => $id, 'organization_id' => Yii::$app->getRequest()->get('organization_id')])->one();
        if (isset($model)) {
            return $model;
        } else {
            return new IzapThrowException('NotFoundHttpException', new IzapApiExceptionMessages(null, end(explode('\\', $modelClass)), "Object not found: $id"));
        }
    }
}
