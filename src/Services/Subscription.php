<?php

namespace AtLab\Unisender\Services;

use AtLab\Unisender\Facades\Unisender;
use AtLab\Unisender\Utils\Helper;

class Subscription
{
    public static function subscribe(string $list_ids, array $fields)
    {
        $params = [
            'list_ids' => $list_ids,
            'fields' => $fields
        ];
        return Unisender::subscribe(Helper::fillParams($params));
    }

    public static function unsubscribe(string $contact_type, string $contact, string $list_ids)
    {
        $params = [
            'contact_type' => $contact_type,
            'contact' => $contact,
            'list_ids' => $list_ids
        ];
        return Unisender::unsubscribe(Helper::fillParams($params));
    }
}
