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

namespace App\Middleware\Auth;

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Model\StoreUser;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Contract\ResponseInterface as HttpResponse;
use Hyperf\HttpServer\Request;
use Phper666\JWTAuth\Exception\JWTException;
use Phper666\JWTAuth\Exception\TokenValidException;
use Phper666\JWTAuth\JWT;
use Phper666\JWTAuth\Util\JWTUtil;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class LoginMiddleware
 * @package App\Middleware\Auth
 */
class LoginMiddleware implements MiddlewareInterface
{
    /**
     * @var HttpResponse
     */
    protected HttpResponse $response;

    protected JWT $jwt;

    public function __construct(HttpResponse $response, JWT $jwt)
    {
        $this->response = $response;
        $this->jwt = $jwt;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // 登录接口放行
        $path = $request->getUri()->getPath();
        if ($path == '/login/login') {
            return $handler->handle($request);
        }

        $token = $request->getHeaderLine('Authorization') ?? '';
        if ($token == "") {
            throw new BusinessException(ErrorCode::LOGIN_ERROR, '请先登录');
        }
        $token = JWTUtil::handleToken($token);
        if ($token !== false && $this->jwt->verifyToken($token)) {
            $claims = $this->jwt->getClaimsByToken($token);
            $userId = $claims['userId'];
            $storeId = $claims['storeId'];
            $isSuper = $claims['isSuper'];
            $changeAuthAt = $claims['iat'];

            $user = StoreUser::findFromCache($userId);
            if (!$user) {
                throw new BusinessException(ErrorCode::LOGIN_FAILED);
            }

            if ($user->changeAuthAt != null && strtotime($user->changeAuthAt) > $changeAuthAt) {
                throw new BusinessException(400, 'Token已失效，请重新登录');
            }

            $request->withAttribute('storeId', $storeId);
            $request->withAttribute('userId', $userId);
            $request->withAttribute('isSuper', $isSuper);

            return $handler->handle($request);
        }

        throw new TokenValidException('Token authentication does not pass', 400);
    }
}
