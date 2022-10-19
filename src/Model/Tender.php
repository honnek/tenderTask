<?php


/**
 * Модель тендера
 */
class Tender
{
    /** @var int|null $code - Внешний код */
    protected ?int $code;

    /** @var string|null $number - Номер */
    protected ?string $number;

    /** @var string|null $status - Статус */
    protected ?string $status;

    /** @var string|null $name - Название */
    protected ?string $name;

    /** @var string|null $dateEdit - Дата изменения */
    protected ?string $dateEdit;


    /**************************************** getters **********************************************************************/

    /**
     * Возвращает Внешний код
     *
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->code;
    }

    /**
     * Возвращает Номер
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * Возвращает статус
     *
     * @return TenderStatus|null
     */
    public function getStatus(): ?TenderStatus
    {
        if (null !== $this->status) {
            return new TenderStatus($this->status);
        }

        return null;
    }

    /**
     * Возвращает Название
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Возвращает дату изменения
     *
     * @return DateTimeInterface|null
     * @throws Exception
     */
    public function getDateEdit(): ?DateTimeInterface
    {
        return new DateTimeImmutable($this->dateEdit);
    }

    /**************************************** setters **********************************************************************/

    /**
     * Устанавливает значение поля Код
     *
     * @param int|null $code
     */
    public function setCode(?int $code): void
    {
        $this->code = $code;
    }

    /**
     * Устанавливает значение поля Номер
     *
     * @param string|null $number
     */
    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    /**
     * Устанавливает значение поля Статус
     *
     * @param TenderStatus|null $status
     */
    public function setStatus(?TenderStatus $status): void
    {
        $this->status = null;

        if (null !== $status) {
            $this->status = $status->getValue();
        }
    }

    /**
     * Устанавливает значение поля Название
     *
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Устанавливает значение поля Дата изменения
     *
     * @param DateTimeInterface|null $dateEdit
     */
    public function setDateEdit(?DateTimeInterface $dateEdit): void
    {
        $this->dateEdit = null;

        if (null !== $dateEdit) {
            $this->dateEdit = $dateEdit->format('d.M.y H:i:s');
        }
    }
}
