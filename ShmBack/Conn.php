<?php
use Exception;
use PDO;
use PDOException;
class Conn
{
    static $Connect = null;

    static $dbServer = [
         'host' => 'shm_dev.mysql.dbaas.com.br',
         'username' => 'shm_dev',    
         'password' => 'S4$DIAS#$%',    
         'database' => 'shm_dev'
    ];
    
    public function getConn()
    {
        return self::Conectar();
    }
    
    function Conectar()
    {
        try {
            if (self::$Connect == null) {

                $dsn = 'mysql:host=' . self::$dbServer['host'] . ';dbname=' . self::$dbServer['database'] . ';charset=utf8;default command timeout=9000;Connection Timeout=9000;';

                $options = [
                    1002 => "SET NAMES 'UTF8'",
                ];
                self::$Connect = new PDO($dsn, self::$dbServer['username'], self::$dbServer['password']);
                self::$Connect->setAttribute(PDO::ATTR_TIMEOUT, 9000);
                self::$Connect->exec('SET CHARACTER SET utf8mb4');
                self::$Connect->exec("SET NAMES utf8");
             //   self::$Connect->exec('SET time_zone = \'' . date_default_timezone_get() . '\'');

                self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }


        return self::$Connect;
    }
}
