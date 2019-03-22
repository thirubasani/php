<?php
/**
 * @author Thiru Basani <thiru.basani@gmail.com>
 * @purpose Controller for live auctions listing for admin.
 */

namespace backend\controllers;

use Yii;
use common\controllers\BaseController;
use yii\filters\AccessControl;
/**
 * Auction controller for the `admin` module
 */
class DownloadController extends BaseController {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'download-image'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    /**
     * @author Thiru Basani <thiru.basani@gmail.com>
     * @purpose to download the image
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($id, $image) {
      return $this->render('index');
    }
    /**
     * @author Thiru Basani <thiru.basani@gmail.com>
     * @purpose to download the image
     * Renders the index view for the module
     * @return string
     */
    public function actionDownloadImage($id, $image) {
        $upload_path = \Yii::getAlias('@frontend') . '/web/uploads/' . $id . '/';
        if (file_exists($upload_path.$image)) {
            Yii::$app->response->SendFile($upload_path.$image);
            return 1;
        }
        return 0;
    }
}
