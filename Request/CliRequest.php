<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp\Request;

use OlegMordvintsev\lenvendoApp\Dto;

class CliRequest implements InterfaceRequest
{
    /**
     * Получение данных команды
     * @return Dto
     */
    public function getCommandData(): Dto
    {
        // Получаем аргументы командной строки
        $commandData = $_SERVER['argv'];

        // Получаем введенную команду
        $command = $this->getCommand($commandData);

        // Если нет команды, то и получать далее нечего
        if (is_null($command)) {
            return new Dto();
        } else {
            unset($commandData[0], $commandData[1]);
        }

        // Получаем аргументы
        $arguments = $this->getArguments($commandData);

        // Получаем опции
        $options = $this->getOptions($commandData);

        // Валидация на не обработанные данные команды
        if ($this->validation($commandData)) {
            $dto = new Dto();
            $dto->setCommand($command);
            $dto->setArguments($arguments);
            $dto->setOptions($options);
            return $dto;
        }

        // Собираем не известные параметры
        $error = implode(" ", $commandData);

        $dto = new Dto();
        $dto->setCommand($command);
        $dto->setArguments($arguments);
        $dto->setOptions($options);
        $dto->setErrorRequest($error);
        return $dto;
    }

    /**
     * Определяем команду
     * @param $commandData
     * @return string|null
     */
    private function getCommand($commandData): ?string
    {
        if (isset($commandData[1]) && $commandData[1] !== "") {
            return $commandData[1];
        }
        return null;
    }

    /**
     * Получаем аргументы
     * @param array $commandData
     * @return array
     */
    private function getArguments(array &$commandData): array
    {
        if (!empty($commandData)) {
            $arguments = [];
            foreach ($commandData as $key => $item) {
                // Нужны параметры, которые в фигурных скобках {...}
                if (mb_substr($item, 0, 1) === "{" && mb_substr($item, -1, 1) === "}") {
                    $item = mb_substr($item, 1, -1);
                    $item = explode(",", $item);
                    $item = array_map('trim', $item);
                    foreach ($item as $argument) {
                        if (!empty($argument)) {
                            $arguments[] = $argument;
                        }
                    }
                    unset($commandData[$key]);
                }
            }
            return !empty($arguments) ? $arguments : [];
        }
        return [];
    }

    /**
     * Получение опций и их значений
     * @param array $commandData
     * @return array
     */
    private function getOptions(array &$commandData): array
    {
        if (!empty($commandData)) {
            $options = [];
            foreach ($commandData as $key => $item) {
                // Нужны параметры, которые в квадратных скобках [...]
                if (
                    mb_substr($item, 0, 1) === "["
                    &&
                    mb_substr($item, -1, 1) === "]"
                    &&
                    strpos($item, "=") !== false
                ) {
                    // Срезаем []
                    $item = mb_substr($item, 1, -1);
                    // Разделяем название опции и значения
                    $item = explode("=", $item);
                    $opt = trim($item[0]);
                    unset($item[0]);
                    $val = trim(implode("=", $item));
                    // Если несколько значений в value
                    if (mb_substr($val, 0, 1) === "{" && mb_substr($val, -1, 1) === "}") {
                        $val = mb_substr($val, 1, -1);
                        $val = explode(",", $val);
                    } else {
                        $val = [$val];
                    }
                    // Собираем в массив
                    $options[$opt] = $val;
                    // Удаляем обработанное
                    unset($commandData[$key]);
                }
            }
            return !empty($options) ? $options : [];
        }
        return [];
    }

    /**
     * @param $commandData
     * @return bool|null
     */
    private function validation($commandData): ?bool
    {
        if (empty($commandData)) {
            return true;
        }
        return false;
    }
}