<?php

class PdoSingleton
{
    private const USER_NAME = 'root';

    private const PASSWORD = '123';

    private const DSN = 'mysql:host=localhost;dbname=mysql';

    private static ?PDO $pdoInstance = null;


    /**
     * Конструктор PdoSingleton. Если он вызывается, то запишет PDO в свойство $pdoInstance если до этого там был null
     */
    private function __construct()
    {
        if(null === self::$pdoInstance) {
            try {
                self::$pdoInstance = new PDO(self::DSN, self::USER_NAME, self::PASSWORD);
            } catch (PDOException $e) {
                die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
            }
        }
    }

    /**
     * @return PDO|null
     */
    public static function getInstance(): ?PDO
    {
        if (null === self::$pdoInstance) {
            new PdoSingleton();
        }

        return self::$pdoInstance;
    }

}