<?php


namespace App\Entity;


use App\Constants\ErrorCode;

/**
 * @property int $code
 * @property string $message
 * @property object $data
 * @property string $timestamp
 */
class Result extends BaseEntity
{
    public function __construct(int $code, string $message, $payload = null)
    {
        parent::__construct([]);
        $this->code = $code;
        $this->message = $message;
        $this->timestamp = time();
        $this->data = $payload;
    }

    public static function respond(int $code, $payload, string $message = null): Result
    {
        if (empty($message)) {
            $message = ErrorCode::getMessage($code) ?? '服务器走丢啦，请稍后再试';
        }

        return new Result($code, $message, $payload);
    }

    public static function success($payload, string $message = null): Result
    {
        return self::respond(ErrorCode::SUCCESS, $payload, $message);
    }

    public static function error(int $code, string $message = null, $payload = null): Result
    {
        return self::respond($code, $payload, $message);
    }
}
