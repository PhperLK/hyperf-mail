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
namespace App\Exception\Handler;

use App\Entity\Result;
use App\Exception\BusinessException;
use App\Utils\Logger;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer\Response;
use Hyperf\Validation\ValidationException;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppExceptionHandler extends ExceptionHandler
{
    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function __construct(StdoutLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $response = new Response($response);
        $logData = [
            'exception' => get_class($throwable),
            'errorCode' => $throwable->getCode(),
            'trace' => $throwable->getTraceAsString(),
            'file' => $throwable->getFile(),
            'line' => $throwable->getLine(),
        ];

        if ($throwable instanceof ValidationException) {
            $this->stopPropagation();
            Logger::get()->warning($throwable->getMessage(), $logData);
            $errorBody = $throwable->validator->errors()->first();
            return $response->withStatus(422)->json(
                Result::error(
                    422,
                    $errorBody
                )
            );
        }

        if ($throwable instanceof BusinessException) {
            $this->stopPropagation();
            Logger::get()->warning($throwable->getMessage(), $logData);
            return $response->withStatus(400)->json(
                Result::error(
                    $throwable->getCode(),
                    $throwable->getMessage()
                )
            );
        }

        $this->logger->error(sprintf('%s[%s] in %s', $throwable->getMessage(), $throwable->getLine(), $throwable->getFile()));
        $this->logger->error($throwable->getTraceAsString());
        return $response->withHeader('Server', 'Hyperf')->withStatus(500)->withBody(new SwooleStream('Internal Server Error.'));
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
