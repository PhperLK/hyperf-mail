<?php

declare(strict_types=1);

namespace App\Command;

use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Hyperf\Database\Commands\ModelOption;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * @Command
 */
#[Command]
class MakeSRCommand extends HyperfCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('make:service');
    }

    public function configure()
    {
        parent::configure();
        $this->addArgument('path', InputArgument::REQUIRED, '文件夹名');
        $this->addArgument('name', InputArgument::REQUIRED, '模型名');
    }

    public function handle()
    {
        $name = $this->input->getArgument('name');
        $pathName = $this->input->getArgument('path');

        $servicePath = BASE_PATH.'/app/Service/'.$pathName;

        if (! file_exists($servicePath)) {
            $this->mkdir($servicePath);
        }
        file_put_contents($servicePath.'/'. $name .'Service.php', $this->buildServiceClass($name, $pathName));

        $repoPath = BASE_PATH.'/app/Repo/'.$pathName;
        if (! file_exists($repoPath)) {
            $this->mkdir($repoPath);
        }
        file_put_contents($repoPath.'/'. $name .'Repo.php', $this->buildRepoClass($name, $pathName));



    }

    protected function mkdir(string $path): void
    {
        $dir = dirname($path);

        if (! is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }
    }


    /**
     * Build the class with the given name.
     */
    protected function buildServiceClass(string $name, string $pathName)
    {
        $stub = file_get_contents(__DIR__ . '/stubs/service.stub');

        $stub = str_replace(
            ['%NAMESPACE%'],
            ['App\\Service\\'.$pathName],
            $stub
        );
        $stub =str_replace(
            ['%CLASS%'],
            [$name.'Service'],
            $stub
        );
        $stub =str_replace(
            ['%INJECT_NAME%'],
            [$name.'Repo'],
            $stub
        );

        $stub = str_replace(
            ['%QO%'],
            [lcfirst($name).'Qo'],
            $stub
        );

        $stub = str_replace(
            ['%PATH%'],
            [$pathName],
            $stub
        );

        return $stub;
    }


    /**
     * Build the class with the given name.
     */
    protected function buildRepoClass(string $name, string $pathName)
    {
        $stub = file_get_contents(__DIR__ . '/stubs/repo.stub');

        $stub = str_replace(
            ['%NAMESPACE%'],
            ['App\\Repo\\'.$pathName],
            $stub
        );
        $stub = str_replace(
            ['%CLASS%'],
            [$name.'Repo'],
            $stub
        );
        $stub = str_replace(
            ['%QO%'],
            [$name.'Qo'],
            $stub
        );


        $stub = str_replace(
            ['%MODEL%'],
            [$name],
            $stub
        );

        return $stub;
    }

}
