<?php

/**
 * Description of hrowException
 *
 */

namespace api\components;

use api\components\IzapApiExceptionMessages;

class ThrowException
{

    private $exception_classes = array(
      'BadRequestHttpException' => 'yii\web\BadRequestHttpException',
      'NotFoundHttpException' => 'yii\web\NotFoundHttpException',
      'ForbiddenHttpException' => 'yii\web\ForbiddenHttpException',
      'HttpException' => 'yii\web\HttpException',
      'ServerErrorHttpException' => 'yii\web\ServerErrorHttpException',
    );

    public function __construct($exception, IzapApiExceptionMessages $messageObj)
    {
        throw new $this->exception_classes[$exception]($messageObj->getMessage(), $messageObj->getCode());
    }
}
