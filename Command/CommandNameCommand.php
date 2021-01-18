<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp\Command;

use OlegMordvintsev\lenvendoApp\Dto;

/**
 * Class CommandNameCommand (Autoload in "Command/Command.php")
 * @package OlegMordvintsev\lenvendoApp\Command
 */
class CommandNameCommand extends AbstractCommands implements InterfaceCommand
{
    /**
     * Список аргументов
     * INFO Пока не используется, но может быть полезен в будущем и требуется интерфейсом
     * @var array
     */
    public array $arguments = [
        'verbose' => 'description of argument "verbose" ...',
        'overwrite' => 'description of argument "overwrite" ...',
        'unlimited' => 'description of argument "unlimited" ...',
        'log' => 'description of argument "log" ...',
    ];

    /**
     * Список опций
     * INFO Пока не используется, но может быть полезен в будущем и требуется интерфейсом
     * @var string[]
     */
    public array $options = [
        'log_file' => 'description of option "log_file" ...',
        'methods' => 'description of option "methods" ...',
        'paginate' => 'description of option "paginate" ...',
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

        $dto->setCommandExecutionInfo('Command success.');

        return $dto;
    }
}