<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp\Command;

use OlegMordvintsev\lenvendoApp\Dto;

/**
 * Class CommandNameCommand (Autoload in "Command/Command.php")
 * @package OlegMordvintsev\lenvendoApp\Command
 */
class CommandErrorCommand extends AbstractCommands implements InterfaceCommand
{
    /**
     * Список аргументов
     * INFO Пока не используется, но может быть полезен в будущем и требуется интерфейсом
     * @var array
     */
    public array $arguments = [
        'overwrite' => 'description of argument "overwrite" for "command_error" ...',
        'unlimited' => 'description of argument "unlimited" for "command_error" ...',
    ];

    /**
     * Список опций
     * INFO Пока не используется, но может быть полезен в будущем и требуется интерфейсом
     * @var string[]
     */
    public array $options = [
        'log_file' => 'description of option "log_file" for "command_error" ...',
        'methods' => 'description of option "methods" for "command_error" ...',
    ];

    /**
     * @param Dto $dto
     * @return Dto
     */
    public function executeCommand(Dto $dto): Dto
    {
        // Проверки
        if (!$this->checkArguments($this->arguments, $dto) || !$this->checkOptions($this->options, $dto)) {
            return $dto;
        }

        /*
         * ТУТ ПРОВЕРКА/ЗАПУСК/ЗАГРУЗКА/ВЫПОЛНЕНИЕ КОМАНДЫ
         */

        $dto->setErrorExecute('Command error execute.');

        return $dto;
    }
}