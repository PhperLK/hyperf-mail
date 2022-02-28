<?php


namespace App\Controller\Store;

use App\Constants\ErrorCode;
use App\Controller\AbstractController;
use App\Entity\Result;
use App\Entity\Store\LoginDto;
use App\Exception\BusinessException;
use App\Model\StoreUser;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Lcobucci\JWT\Token;
use Lcobucci\JWT\Token\Plain;
use Phper666\JWTAuth\JWT;
use Psr\SimpleCache\InvalidArgumentException;

/**
 * Class LoginController
 * @package App\Controller\Login
 * @AutoController(prefix="login")
 */
class LoginController extends AbstractController
{
    /**
     * @var JWT
     * @Inject
     */
    protected JWT $jwt;


    /**
     * @throws InvalidArgumentException
     */
    public function login(): Result
    {
        $loginDto = new LoginDto($this->request->all());

        /** @var StoreUser $user */
        $user = StoreUser::where('user_name', $loginDto->userName)->first();

        if (!$user) {
            return Result::error(ErrorCode::LOGIN_FAILED);
        }

        if (!$this->checkPassword($loginDto->password, $user->passwordSalt, $user->password)) {
            throw new BusinessException(ErrorCode::LOGIN_FAILED);
        }

        return Result::success([
            'token' => $this->generateToken($user)->toString()
        ]);
    }

    /**
     * 比对密码是否正确
     * @param string|null $password
     * @param string|null $salt
     * @param string|null $hash
     * @return bool
     */
    private function checkPassword(?string $password, ?string $salt, ?string $hash): bool
    {
        if (!$salt) {
            $salt = '';
        }
        if (!$password OR !$hash) {
            return false;
        }
        return sha1($password . $salt) == $hash;
    }

    /**
     * 生成token
     * @param StoreUser $model
     * @return Token|Plain|string
     * @throws InvalidArgumentException
     */
    public function generateToken(StoreUser $model)
    {
        return $this->jwt->getToken('default', [
            'userId' => $model->id,
            'isSuper' => $model->isSuper,
            'storeId' => $model->storeId
        ]);
    }
}