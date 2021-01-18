<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp\Command;

use OlegMordvintsev\lenvendoApp\Dto;

/**
 * Class AbstractCommands
 * @package OlegMordvintsev\lenvendoApp\Command
 */
abstract class AbstractCommands
{
    /**
     * Help по команде
     * @param $dto
     * @return Dto
     */
    public function helpCommand($dto): Dto
    {
        $helpCommand = 'Command help: ' . $dto->getCommand();

        if (!empty($this->arguments)) {
            $helpCommand .= "\n" . 'Argument(s):';
            foreach ($this->arguments as $argument => $description) {
                $helpCommand .= "\n" . "  - " . $argument . " - " . $description;
            }
        }

        if (!empty($this->options)) {
            $helpCommand .= "\n" . 'Option(s):';
            foreach ($this->options as $option => $description) {
                $helpCommand .= "\n" . "  - " . $option . " - " . $description;
            }
        }

        $dto->setHelpCommand($helpCommand);

        return $dto;
    }

    /**
     * Проверка аргументов
     * @param array $arguments
     * @param Dto $dto
     * @return bool
     */
    protected function checkArguments(array $arguments, Dto $dto): bool
    {
        // При отсутствии аргументов в вводимой команде пользователем
        if (empty($arguments)) {
            return true;
        }

        // Проверяем, что вводимые аргументы допустимы
        $arg = [];
        $dtoArguments = $dto->getArguments();
        foreach ($dtoArguments as $dtoArgument) {
            if (!isset($arguments[$dtoArgument])) {
                $arg[] = $dtoArgument;
            }
        }
        $arg = implode(", ", $arg);
        if (!empty($arg)) {
            $dto->setErrorArguments($arg);
            return false;
        }

        return true;
    }

    /**
     * Проверка опций
     * @param array $options
     * @param Dto $dto
     * @return bool
     */
    protected function checkOptions(array $options, Dto $dto): bool
    {
        // При отсутствии опций в вводимой команде пользователем
        if (empty($options)) {
            return true;
        }

        // Проверяем, что вводимые опции допустимы
        $opt = [];
        $dtoOptions = $dto->getOptions();
        foreach ($dtoOptions as $dtoOption => $noNeed) {
            if (!isset($options[$dtoOption])) {
                $opt[] = $dtoOption;
            }
        }
        $opt = implode(", ", $opt);
        if (!empty($opt)) {
            $dto->setErrorOptions($opt);
            return false;
        }

        return true;
    }
}
