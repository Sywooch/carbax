<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 10.12.2015
 * Time: 8:31
 */

namespace common\classes;


use common\models\db\Msg;
use common\models\db\User;

class SendingMessages
{
    public static function send_message($user_to,$user_from,$subject,$message,$from_type='0',$to_type='0',$type_id=0){
        if(!is_int($user_to)){
            $user_to_id = User::find()->where(['username'=>$user_to])->one()->id;
        }
        else {
            $user_to_id = $user_to;
        }
        if(!is_int($user_from)){
            $user_from_id = User::find()->where(['username'=>$user_from])->one()->id;
        }
        else {
            $user_from_id = $user_from;
        }

        if(!empty($user_to_id) && !empty($user_from_id)){
            $msg = new Msg();
            $msg->subject = $subject;
            $msg->from_type = $from_type;
            $msg->to_type = $to_type;
            $msg->from = $user_from_id;
            $msg->to = $user_to_id;
            $msg->content = $message;
            $msg->dt_send = time();
            $msg->readed = 0;
            $msg->type_id = $type_id;
            $msg->save();
            //Debug::prn($msg);
            return $msg->id;
        }
        else{
            return false;
        }
    }
}