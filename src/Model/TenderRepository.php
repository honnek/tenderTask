<?php

class TenderRepository
{


    /**
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
            ':dateEdit' => $tender->getDateEdit()->format('d.M.y H:i:s')
        ];

        $query = $pdo->prepare($sql);
        $query->execute($params);
    }


}