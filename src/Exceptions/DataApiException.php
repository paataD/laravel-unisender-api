<?php
namespace AtLab\Unisender\Exceptions;

use Illuminate\Support\Facades\Log;

class DataApiException extends \Exception
{
    private array $errorsArr;

    public function __construct($responseBody)
    {

        $this->errorsArr = [
            //Общие ошибки
            ['mnemo' => 'unspecified', 'description' => 'Тип ошибки не указан. Подробности смотрите в сообщении.'],
            ['mnemo' => 'invalid_api_key', 'description' => 'Указан неправильный ключ доступа к API. Проверьте, совпадает ли значение api_key со значением, указанным в личном кабинете.'],
            ['mnemo' => 'access_denied', 'description' => 'Доступ запрещён. Проверьте, включён ли доступ к API в личном кабинете и не обращаетесь ли вы к методу, прав доступа к которому у вас нет..'],
            ['mnemo' => 'unknown_method', 'description' => 'Указано неправильное имя метода.'],
            ['mnemo' => 'invalid_arg', 'description' => 'Указано неправильное значение одного из аргументов метода.'],
            ['mnemo' => 'not_enough_money', 'description' => 'Не хватает денег на счету для выполнения метода.'],
            ['mnemo' => 'retry_later', 'description' => 'Временный сбой. Попробуйте ещё раз позднее.'],
            ['mnemo' => 'api_call_limit_exceeded_for_api_key', 'description' => 'Сработало ограничение по вызову методов API в единицу времени. На данный момент это 1200 вызовов в минуту. Для метода sendEmail — 60.'],
            ['mnemo' => 'api_call_limit_exceeded_for_ip', 'description' => 'Сработало ограничение по вызову методов API в единицу времени. На данный момент это 1200 вызовов в минуту. Для метода sendEmail — 60.'],
        ];

        $error_description = $this->getDescription($responseBody);
        $message = "
        ОШИБКА ОТПРАВКИ ДАННЫХ В UNISENDER
        Тип ошибки: $responseBody->code
        Ошбика: $responseBody->error
        Описание: $error_description
        ";
        parent::__construct($message);
    }

    private function getDescription($responseBody): string
    {
        foreach ($this->errorsArr as $error) {
            if ($responseBody->error && $error['mnemo'] === $responseBody->code) {
                $errorContexDesc = $error['description'];
                break;
            }
        }

        return $errorContexDesc ?? 'Dynamic Error';
    }
}
