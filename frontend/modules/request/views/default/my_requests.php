<?php
use common\models\db\RequestAddFieldValue;
use common\models\db\RequestType;
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
                    <?php $icon = RequestType::find()->where(['id'=>$request->request_type_id])->one()->icon; ?>
                    <span class="icon_b icon_b_autosalon" style="background-image: url('<?= $icon; ?>')">
				    </span>
                </td>
                <td>
                    <button class="btn btn-info btn-xs raply" type-request="<?= $request->id; ?>">
                        Ответы
                    </button>
                    <!--<a href="/message/reply?" class="btn btn-info btn-xs">Ответы</a>-->
                </td>
                <td>
                    <div class="reset_request_wr">
                        <a href="" class="btn btn-info btn-xs reset_request" id="<?= $request->id; ?>">Попробую еще раз</a>
                    </div>
                </td>
                <td>
                    <a href="/request/default/edit?id=<?=$request->id;?>" class="btn btn-info btn-xs">Редактировать</a>
                </td>
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

<!-- Modal -->
<div class="modal fade" id="raply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">На вашу заявку ответили</h4>
            </div>
            <div class="modal-body">
                <div class="my-raply">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>