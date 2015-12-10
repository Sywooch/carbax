<?php
use common\models\db\RequestAddFieldValue;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Мои заявки";
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/bootstrap.min.css');
?>

<section class="main-container">
    <?=Html::a('Добавить заявку', ['/request_type'], ['class'=>'btn btn-success'])?>
    <h3>Мои заявки</h3>
    <table class="table table-bordered">
        <?php foreach($requests as $request): ?>
            <tr>
                <td>
                    <?= RequestAddFieldValue::find()->where(['request_id' => $request->id, 'key' => 'title'])->one()->value?>
                </td>
                <td>
                    <?= Html::a('Удалить', Url::to(['/request/default/delete', 'id' => $request->id]), ['class'=>'btn btn-danger'])?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>