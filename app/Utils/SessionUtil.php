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
namespace App\Utils;

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use Hyperf\Context\Context;
use Psr\Http\Message\ServerRequestInterface;

class SessionUtil
{
    public static function getUserId()
    {
        /** @var ServerRequestInterface $request */
        $request = Context::get(ServerRequestInterface::class);

        if (empty($request)) {
            return 0;
        }
        $userId = $request->getAttribute('userId');

        if (empty($userId) || $userId == 0) {
            throw new BusinessException(ErrorCode::LOGIN_ERROR);
        }

        return $userId;
    }

    public static function getStoreId()
    {
        /** @var ServerRequestInterface $request */
        $request = Context::get(ServerRequestInterface::class);

        if (empty($request)) {
            return 0;
        }
        $storeId = $request->getAttribute('storeId');

//        if (empty($userId) || $userId == 0) {
//            throw new BusinessException(ErrorCode::LOGIN_ERROR);
//        }

        return $storeId ?? 1;
    }
}
