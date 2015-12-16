<?php
use common\models\db\RequestAddFieldValue;
use common\models\db\RequestType;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<table class="table table-bordered">
    <?php

    foreach($requests as $request): ?>
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
            </td>
            <td>
                <div class="reset_request_wr">
                    <a href="" class="btn btn-info btn-xs reset_request" id="<?= $request->id; ?>">Попробую еще раз</a>
                </div>

            </td>
            <td>
                <a href="" class="btn btn-info btn-xs">Редактировать</a>
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