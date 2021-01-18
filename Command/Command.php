<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp\Command;

use OlegMordvintsev\lenvendoApp\Dto;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'InterfaceCommand.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'AbstractCommands.php';

/**
 * Class Controller
 * @package OlegMordvintsev\lenvendoApp\Command
 */
class Command implements InterfaceCommand
{
    /**
     * Список реализуемых команд и имя php файла для подключения
     * INFO Файл php и класс должны назваться одинаково и быть в текущей директории
     * INFO Список аргументов и опций указываются непосредственно в контроллерах(файлах) выполняющих команду
     * @var string[]
     */
    private array $commandList = [
        'command_name' => [
            'class_file' => 'CommandNameCommand',
            'description' => 'Description for command_name ...',
        ],
        'command_error' => [
            'class_file' => 'CommandErrorCommand',
            'description' => 'Description for command_error ...',
        ],
    ];

    /**
     * @param Dto $dto
     * @return Dto
     */
    public function executeCommand(Dto $dto): Dto
    {
        $command = $dto->getCommand();

        // Если команда help, то это аналог запуска без указания команды
        if ($command === 'help') {
            $command = '';
        }

        if ($command !== '') {
            // Выполнение команды
            if (isset($this->commandList[$command]['class_file'])) {
                require_once __DIR__ . DIRECTORY_SEPARATOR . $this->commandList[$command]['class_file'] . '.php';
                $class = __NAMESPACE__ . '\\' . $this->commandList[$command]['class_file'];
                $command = new $class();
                // Нужен ли help по команде?
                if (in_array('help', $dto->getArguments())) {
                    $command->helpCommand($dto);
                } else {
                    $command->executeCommand($dto);
                }
            } else {
                $dto->setUnknownCommand('Unknown command');
            }
        } else {
            // Список команд
            $commandExecutionInfo = 'Command list: ';
            foreach ($this->commandList as $key => $info) {
                $commandExecutionInfo .= "\n  - " . $key . " - " . $info['description'];
            }
            $dto->setCommandExecutionInfo($commandExecutionInfo);
        }

        return $dto;
    }
}
