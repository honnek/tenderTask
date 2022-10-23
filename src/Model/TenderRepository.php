<?php

class TenderRepository
{

    /**
     * Возвращает число записей
     *
     * @return int
     */
    public function getCount(): int
    {
        $pdo = PdoSingleton::getInstance();

        $sql = 'SELECT * FROM `test_task_data`';

        $query = $pdo->prepare($sql);
        $query->execute();

        return $query->rowCount();
    }

    public function findByCode(string $code): array|false
    {
        $pdo = PdoSingleton::getInstance();

        $sql = 'SELECT * FROM `test_task_data` WHERE `code` = :code';

        $params = [
            ':code' => $code
        ];

        $query = $pdo->prepare($sql);
        $query->execute($params);

        return $query->fetch();
    }

    /**
     * Возвращает массив тендеров с указными limit offset и упорядоченными по orderBy
     *
     * @param string $limit
     * @param string $offset
     * @param string|null $orderBy
     * @return bool|array
     */
    public function findWithLimitOffsetOrderBy(string $limit, string $offset, ?string $orderBy = null): bool|array
    {
        $pdo = PdoSingleton::getInstance();

        $sql = 'SELECT * FROM `test_task_data`';

        if ('' === $orderBy) {
            $sql .= ' ORDER BY `code` ASC';
        } else {
            $sql .= ' ORDER BY ' . $orderBy . ' DESC';
        }

        $sql .= ' LIMIT ' . $limit . ' OFFSET ' . $offset;

        $query = $pdo->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Добавить тендер в базу
     * @throws Exception
     */
    public function add(Tender $tender): void
    {
        $pdo = PdoSingleton::getInstance();

        $sql = 'INSERT INTO `test_task_data` (`code`, `number`, `status`, `name`, `date_edit`) 
                VALUES (:code, :number, :status, :name, :dateEdit)';

        $params = [
            ':code' => $tender->getCode(),
            'number' => $tender->getNumber(),
            ':status' => $tender->getStatus()->getValue(),
            ':name' => $tender->getName(),
            ':dateEdit' => $tender->getDateEdit()->format('d.m.Y H:i:s')
        ];

        $query = $pdo->prepare($sql);
        $query->execute($params);
    }


}