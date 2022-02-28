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

namespace App\Entity;

use Hyperf\Contract\ValidatorInterface;
use Hyperf\Utils\ApplicationContext;
use Hyperf\Utils\Context;
use Hyperf\Utils\Contracts\Jsonable;
use Hyperf\Utils\Str;
use Hyperf\Validation\Contract\ValidatorFactoryInterface as ValidationFactory;
use JsonSerializable;

class BaseEntity implements Jsonable, JsonSerializable
{
    private array $data = [];

    public function __construct($data = [])
    {
        $this->fillData($data);
    }

    public function __set($name, $value)
    {
        $this->data[$name] = is_string($value) ? trim($value) : $value;
    }

    public function __isset($name)
    {
        if (method_exists($this, "get{$name}")) {
            return true;
        }
        if (array_key_exists($name, $this->data)) {
            return true;
        }
        return isset($this->{$name});
    }

    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    public function __toString(): string
    {
        return json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
    }

    public function fillData($data)
    {
        $docCommentProperties = $this->getDocCommentProperties();
        foreach ($data as $key => $value) {
            if (in_array($key, $docCommentProperties)) {
                $this->data[Str::camel($key)] = is_string($value) ? trim($value) : $value;
            }
        }
    }

    public function &__get($name)
    {
        $result = null;
        if (method_exists($this, "get{$name}")) {
            $result = $this->{"get{$name}"}();
        }
        if (array_key_exists($name, $this->data)) {
            $result = $this->data[$name];
        }
        return $result;
    }

    public function getData(): array
    {
        return $this->data;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {
        return $this->getData();
    }

    /**
     * Get the validator instance for the request.
     */
    public function getValidator(): ValidatorInterface
    {
        return Context::getOrSet($this->getContextValidatorKey(), function () {
            $factory = ApplicationContext::getContainer()->get(ValidationFactory::class);

            return $this->createDefaultValidator($factory);
        });
    }

    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [];
    }

    /**
     * Get context validator key.
     */
    protected function getContextValidatorKey(): string
    {
        return sprintf('%s:%s', get_called_class(), ValidatorInterface::class);
    }

    /**
     * Create the default validator instance.
     */
    protected function createDefaultValidator(ValidationFactory $factory): ValidatorInterface
    {
        return $factory->make(
            $this->getData(),
            $this->rules(),
            $this->messages(),
            $this->attributes()
        );
    }

    protected function getDocCommentProperties(): array
    {
        $reflectionClass = new \ReflectionClass($this);
        $docComment = $reflectionClass->getDocComment();

        $array = explode('$', $docComment);

        unset($array[0]);

        foreach ($array as &$str) {
            $str = substr($str, 0, strpos($str, ' '));
            $str = str_replace(PHP_EOL, '', $str);
        }

        return $array;
    }
}
