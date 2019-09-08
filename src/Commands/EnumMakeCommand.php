<?php

namespace Konekt\Enum\Eloquent\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class EnumMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:enum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new enum class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Enum';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('labels')) {
            return __DIR__ . '/stubs/enum.labels.stub';
        }

        if ($this->option('boot')) {
            return __DIR__ . '/stubs/enum.boot.stub';
        }

        return __DIR__ . '/stubs/enum.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Enums';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['labels', 'l', InputOption::VALUE_NONE, 'Create an Enum class with predefined labels'],

            ['boot', 'b', InputOption::VALUE_NONE, 'Create an Enum class with [boot] method'],
        ];
    }
}
