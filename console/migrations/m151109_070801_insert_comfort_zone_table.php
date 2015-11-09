<?php

use yii\db\Schema;
use yii\db\Migration;

class m151109_070801_insert_comfort_zone_table extends Migration
{
    public function up()
    {
        $this->insert('comfort_zone', [
            'name' => 'Туалет',
            'img_ulr' => '/media/img/wc-1.png',
        ]);
        $this->insert('comfort_zone', [
            'name' => 'Банкомат',
            'img_ulr' => '/media/img/banck.png',
        ]);
        $this->insert('comfort_zone', [
            'name' => 'Wi-Fi',
            'img_ulr' => '/media/img/wifi-1.png',
        ]);
        $this->insert('comfort_zone', [
            'name' => 'Кафе',
            'img_ulr' => '/media/img/cafe-1.png',
        ]);
        $this->insert('comfort_zone', [
            'name' => 'Подкачка шин',
            'img_ulr' => '/media/img/shiny.png',
        ]);
        $this->insert('comfort_zone', [
            'name' => 'Постоплата',
            'img_ulr' => '/media/img/postpay.png',
        ]);
        $this->insert('comfort_zone', [
            'name' => 'Кофе-автомат',
            'img_ulr' => '/media/img/coffemachine.png',
        ]);
        $this->insert('comfort_zone', [
            'name' => 'Магазин',
            'img_ulr' => '/media/img/store.png',
        ]);
        $this->insert('comfort_zone', [
            'name' => 'Оплата картой',
            'img_ulr' => '/media/img/payment.png',
        ]);
        $this->insert('comfort_zone', [
            'name' => 'Парковка для клиентов',
            'img_ulr' => '/media/img/parking.png',
        ]);
        $this->insert('comfort_zone', [
            'name' => 'Терминал оплаты',
            'img_ulr' => '/media/img/terminal.png',
        ]);
        $this->insert('comfort_zone', [
            'name' => 'Зона отдыха',
            'img_ulr' => '/media/img/restzone.png',
        ]);
    }

    public function down()
    {
        $this->delete('comfort_zone');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
