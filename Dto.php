<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp;

class Dto
{
    /**
     * Входящая команда
     * @var string
     */
    private string $command = '';

    /**
     * Входящие аргументы
     * @var string[]
     */
    private array $arguments = [];

    /**
     * Входящие опции
     * @var string[]
     */
    private array $options = [];

    /**
     * Сообщение о не известном(ых) параметре(ах)
     * @var string
     */
    private string $errorRequest = '';

    /**
     * Сообщение об ошибке выполнения команды
     * @var string
     */
    private string $errorExecute = '';

    /**
     * Сообщение об ошибке в аргументе(ах)
     * @var string
     */
    private string $errorArguments = '';

    /**
     * Сообщение об ошибке в опции(ях)
     * @var string
     */
    private string $errorOptions = '';

    /**
     * Сообщение о не известной команде
     * @var string
     */
    private string $unknownCommand = '';

    /**
     * Help по команде
     * @var string
     */
    private string $helpCommand = '';

    /**
     * Сообщение о удачном выполнении команды
     * @var string
     */
    private string $commandExecutionInfo = '';

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @return string[]
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @return string[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return string
     */
    public function getErrorRequest(): string
    {
        return $this->errorRequest;
    }

    /**
     * @param string $command
     * @return Dto
     */
    public function setCommand(string $command): Dto
    {
        $this->command = $command;
        return $this;
    }

    /**
     * @param string[] $arguments
     * @return Dto
     */
    public function setArguments(array $arguments): Dto
    {
        $this->arguments = $arguments;
        return $this;
    }

    /**
     * @param string[] $options
     * @return Dto
     */
    public function setOptions(array $options): Dto
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @param string $errorRequest
     * @return Dto
     */
    public function setErrorRequest(string $errorRequest): Dto
    {
        $this->errorRequest = $errorRequest;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorExecute(): string
    {
        return $this->errorExecute;
    }

    /**
     * @param string $errorExecute
     * @return Dto
     */
    public function setErrorExecute(string $errorExecute): Dto
    {
        $this->errorExecute = $errorExecute;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommandExecutionInfo(): string
    {
        return $this->commandExecutionInfo;
    }

    /**
     * @param string $commandExecutionInfo
     * @return Dto
     */
    public function setCommandExecutionInfo(string $commandExecutionInfo): Dto
    {
        $this->commandExecutionInfo = $commandExecutionInfo;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnknownCommand(): string
    {
        return $this->unknownCommand;
    }

    /**
     * @param string $unknownCommand
     * @return Dto
     */
    public function setUnknownCommand(string $unknownCommand): Dto
    {
        $this->unknownCommand = $unknownCommand;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorArguments(): string
    {
        return $this->errorArguments;
    }

    /**
     * @param string $errorArguments
     * @return Dto
     */
    public function setErrorArguments(string $errorArguments): Dto
    {
        $this->errorArguments = $errorArguments;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorOptions(): string
    {
        return $this->errorOptions;
    }

    /**
     * @param string $errorOptions
     * @return Dto
     */
    public function setErrorOptions(string $errorOptions): Dto
    {
        $this->errorOptions = $errorOptions;
        return $this;
    }

    /**
     * @return string
     */
    public function getHelpCommand(): string
    {
        return $this->helpCommand;
    }

    /**
     * @param string $helpCommand
     * @return Dto
     */
    public function setHelpCommand(string $helpCommand): Dto
    {
        $this->helpCommand = $helpCommand;
        return $this;
    }

}