<?php

namespace AtLab\Unisender\Utils;

class Helper
{
    public static function fillParams(array $params): array
    {
        return array_filter($params,
            function ($val) {
                return $val !== null;
            }, ARRAY_FILTER_USE_BOTH);
    }

}
