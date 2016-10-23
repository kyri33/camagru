 <?php

    $DB_HOST = 'localhost';
    $DB_NAME = 'db_camagru';
    $DB_DSN = 'mysql:host='.$DB_HOST;
    $DB_USER = 'root';
    $DB_PASSWORD = '15891589';

    class Db {

    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        $DB_HOST = 'localhost';
        $DB_NAME = 'db_camagru';
        $DB_DSN = 'mysql:host='.$DB_HOST.';dbname='.$DB_NAME;
        $DB_USER = 'root';
        $DB_PASSWORD = '15891589';
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD,
                $pdo_options);
        }
        return self::$instance;
    }
}

 ?>
