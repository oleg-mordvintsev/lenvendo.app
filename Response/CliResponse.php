<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp\Response;

use OlegMordvintsev\lenvendoApp\Dto;

class CliResponse implements InterfaceResponse
{
    /**
     * Ошибочный запрос
     * @param Dto $dto
     * @return Dto
     */
    public function errorRequest(Dto $dto): Dto
    {
        echo 'Error Request: ' . $dto->getErrorRequest();
        $this->showCalledCommand($dto);
        return $dto;
    }

    /**
     * Ошибочное выполнение
     * @param Dto $dto
     * @return Dto
     */
    public function errorExecute(Dto $dto): Dto
    {
        echo 'Error Execute: ' . $dto->getErrorExecute();
        $this->showCalledCommand($dto);
        return $dto;
    }

    /**
     * Не известная команда
     * @param Dto $dto
     * @return Dto
     */
    public function unknownCommand(Dto $dto): Dto
    {
        if ($dto->getUnknownCommand() !== '') {
            echo 'Unknown Command: ' . $dto->getUnknownCommand();
        } elseif ($dto->getErrorArguments() !== '') {
            echo 'Error Argument(s): ' . $dto->getErrorArguments();
        } elseif ($dto->getErrorOptions() !== '') {
            echo 'Error Option(s): ' . $dto->getErrorOptions();
        }
        $this->showCalledCommand($dto);
        return $dto;
    }

    /**
     * Не известная команда
     * @param Dto $dto
     * @return Dto
     */
    public function helpCommand(Dto $dto): Dto
    {
        echo $dto->getHelpCommand();
        return $dto;
    }


    /**
     * Команда выполнена
     * @param Dto $dto
     * @return Dto
     */
    public function ok(Dto $dto): Dto
    {
        //echo 'Success: ' . $dto->getCommandExecutionInfo();
        echo $dto->getCommandExecutionInfo();
        return $dto;
    }

    /**
     * Вывод текущей команды с аргументами, опциями и их значениями
     * @param Dto $dto
     */
    private function showCalledCommand(Dto $dto)
    {
        echo "\n\n";
        echo 'Called command: ' . $dto->getCommand();

        $dtoArguments = $dto->getArguments();
        if (!empty($dtoArguments)) {
            echo "\n\n";
            echo 'Arguments:';
            foreach ($dtoArguments as $arg) {
                echo "\n  - " . $arg;
            }
        }

        $dtoOptions = $dto->getOptions();
        if (!empty($dtoOptions)) {
            echo "\n\n";
            echo 'Options:';
            foreach ($dto->getOptions() as $opt => $values) {
                echo "\n  - " . $opt;
                foreach ((array)$values as $val) {
                    echo "\n    - " . $val;
                }
            }
        }
    }
}