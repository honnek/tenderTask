<?php

/**
 * Примитивный Value object для статуса тендера
 */
class TenderStatus
{
    private const EMPTY = '';

    private const CANCELED = 'Отменено';

    private const OPEN = 'Открыто';

    private const CLOSE = 'Закрыто';

    /** @var string $value - Значение статуса */
    private string $value;

    /**
     * @param string|null $value
     * @throws Exception
     */
    public function __construct(?string $value = self::EMPTY)
    {
        if (!in_array($value, self::getList())) {
            throw new Exception(message: 'Такого статуса не существует');
        }

        $this->value = $value;
    }

    /**
     * Вернет значение текущего объекта статуса
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Возвращает список возможных статусов тендера
     * @return string[]
     */
    public static function getList(): array
    {
        return [
            self::EMPTY,
            self::CANCELED,
            self::OPEN,
            self::CLOSE,
        ];
    }

    /**
     * Факторка для объекта Статуса с пустым значением
     * @return static
     */
    public static function makeEmpty(): self
    {
        return new self(self::EMPTY);
    }

    /**
     * Факторка для объекта статуса со значением "Отменен"
     * @return static
     */
    public static function makeCanceled(): self
    {
        return new self(self::CANCELED);
    }

    /**
     * Факторка для объекта статуса со значением "Открыт"
     * @return static
     */
    public static function makeOpen(): self
    {
        return new self(self::OPEN);
    }

    /**
     * Факторка для объекта статуса со значением "Закрыт"
     * @return static
     */
    public static function makeClose(): self
    {
        return new self(self::CLOSE);
    }
}
