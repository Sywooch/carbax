<?php
use common\models\db\Address;
use common\models\db\Services;

$this->title = Services::getNameTypeServicec($_GET['service_type']);
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Выбор сервиса', 'url' => ['/select-service']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/bootstrap_btn.min.css');

?>
<section class="main-container">
    <button onclick="location.href='/add?service_type=<?=$serviceTypeId?>'" type="button" class="btn btn-success addServiceBtn">Добавить сервис</button>

    <table class="addAllServices">
        <?php
            foreach($service as $serv):
                $address = Address::find()->where(['service_id'=>$serv->id])->one();
        ?>
        <tr>
            <!--<td><a href="/services/services/view_service?service_id=<?/*=$serv->id;*/?>"><b><?/*=$serv->name;*/?></b></a>, <?/*=$address->address;*/?> </td>-->
            <!--<td><a href="<?/*= \yii\helpers\Url::to(['/view-service', 'service_id' => $serv->id, 'slug' => $serv->slug])*/?>"><b><?/*=$serv->name;*/?></b></a>, <?/*=$address->address;*/?> </td>-->
            <td><a href="/view-service/<?= $serv->id; ?>/<?= $serv->slug; ?>"><b><?=$serv->name;?></b></a>, <?=$address->address;?> </td>


            <td class="addAllServices__control">
                <a href="/services/services/edit_service?service_id=<?=$serv->id;?>&service_type=<?=$serviceTypeId?>">редактировать </a>/
                <a href="/services/services/del_service?service_id=<?=$serv->id;?>&service_type=<?=$serviceTypeId?>" data-confirm="Вы действительно хотите удалить?">удалить</a>
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
</section>
