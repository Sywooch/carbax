<?php
use common\models\db\RequestAddFieldValue;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Мои заявки";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/bootstrap.min.css');
?>

<section class="main-container">
    <?=Html::a('Добавить заявку', ['/request_type'], ['class'=>'btn btn-success'])?>

    <div class = "filtr_request_type">
        <?php foreach($requestType as $rt): ?>

            <a href="<?= Url::to(['#']) ?> " data-id="<?= $rt->id; ?>" class="link-request-type">
				<span class="icon_b icon_b_autosalon" style="background-image: url('<?= $rt->icon ?>')">
				</span>
            </a>
        <?php endforeach; ?>
    </div>
<div>
    <h3>Мои заявки</h3>
    <div class="my-request">
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
    </div>
</div>
</section>