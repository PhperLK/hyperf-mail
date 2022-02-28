<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 */
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("Server Error！")
     */
    public const SERVER_ERROR = 500;

    /**
     * @Message("请登录后操作!")
     */
    public const LOGIN_ERROR = 401;

    /**
     * @Message("身份验证失败")
     */
    public const LOGIN_FAILED = 402;

    /**
     * @Message("ok")
     */
    public const SUCCESS = 200;

    /**
     * @Message ("请求参数错误")
     */
    public const BAD_REQUEST = 400;
}
