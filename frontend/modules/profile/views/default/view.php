<?php
use yii\helpers\Html;


$this->title = "Профиль " . $user['username'];
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/bootstrap.min.css');
?>

<section class="main-container">
    <div class="profileWrap">
        <?php if(!empty($user['avatar'])): ?>
        <div class="profileAvatar">
            <?= Html::img('/'.$user['avatar'], ['width' => '200'])?>
        </div>
        <?php endif; ?>
        <?php if(!empty($user['name'])): ?>
        <div class="profileName profileElement">
            <?=$user['name']?> <?=$user['last_name']?>
        </div>
        <?php endif; ?>
        <div class="profileLogin profileElement">
            Логин: <?=$user['username']?>
        </div>
        <div class="profileEmail profileElement">
            Email: <?=$user['email']?>
        </div>
        <?php if(!empty($user['skype'])): ?>
            <div class="profileSkype profileElement">
                Skype: <?=$user['skype']?>
            </div>
        <?php endif; ?>
        <?php if(!empty($user['telephon'])): ?>
            <div class="profileName profileElement">
                Телефон: <?=$user['telephon']?>
            </div>
        <?php endif; ?>
        <?php if(!empty($user['icq'])): ?>
            <div class="profileName profileElement">
                ICQ: <?=$user['icq']?>
            </div>
        <?php endif; ?>
        <?php if(!empty($user['link_vk'])): ?>
            <div class="profileName profileElement">
                ВК: <?=$user['link_vk']?>
            </div>
        <?php endif; ?>

        <?php if($user['id'] == Yii::$app->user->id): ?>
            <div class="profileEditLink profileElement">
                <div class="addContent--save">
                    <?=Html::a('Редактировать', ['/profile/default/edit_contacts'])?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php if($user['id'] != Yii::$app->user->id): ?>
        <a href="/message/default/send_message?from=<?=$_GET['id'];?>" class="btn btn-info btn-xs">Написать сообщение</a>
    <?php endif; ?>
</section>