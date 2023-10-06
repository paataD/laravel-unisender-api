<?php

namespace AtLab\Unisender\Services;

use AtLab\Unisender\Facades\Unisender;
use AtLab\Unisender\Utils\Helper;

class MailingLists
{

    public static function addEmail() {

    }

    public static function getLists(){
        return Unisender::getLists();
    }

    public static function deleteList(int|string $list_id){
        $params = [
          'list_id' => (int)$list_id,
        ];

        return Unisender::deleteList($params);
    }

    public static function createList($title, ?string $before_subscribe_url = null, ?string $after_subscribe_url = null) {
        $params = [
            'title' => $title,
            'before_subscribe_url' => $before_subscribe_url,
            'after_subscribe_url' => $after_subscribe_url,
        ];
        $fff =  Helper::fillParams($params);
        return Unisender::createList($params);
    }
}
