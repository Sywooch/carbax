<?php
$this->title = "Мои сервисы";
$this->registerCssFile('/css/bootstrap_btn.min.css');
?>
<section class="main-container">
    <button onclick="location.href='/add?service_type=<?=$serviceTypeId?>'" type="button" class="btn btn-success addServiceBtn">Добавить сервис</button>

    <table class="addAllServices">
        <tr>
            <td><b>Автосервис «Мехника-3»</b>, г. Москва, ул. Дубровка д. 5. </td>
            <td class="addAllServices__control">
                <a href="#nowhere">редактировать </a>/
                <a href="#nowhere">удалить</a>
            </td>
        </tr>
        <tr>
            <td><b>Автосервис «Мехника-3»</b>, г. Москва, ул. Дубровка д. 5. </td>
            <td class="addAllServices__control">
                <a href="#nowhere">редактировать </a>/
                <a href="#nowhere">удалить</a>
            </td>
        </tr>
        <tr>
            <td><b>Автосервис «Мехника-3»</b>, г. Москва, ул. Дубровка д. 5. </td>
            <td class="addAllServices__control">
                <a href="#nowhere">редактировать </a>/
                <a href="#nowhere">удалить</a>
            </td>
        </tr>
    </table>
</section>
