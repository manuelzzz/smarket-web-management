<?php
class DBConnection
{
    public static $pdo;
    public $hostname;
    public $database;
    public $user;
    public $password;

    public function __construct()
    {
        $this->hostname = 'localhost';
        $this->database = 'smarket';
        $this->user = 'root';
        $this->password = 'mysql';
    }

    public function openConnection()
    {
        try {
            static::$pdo = null;

            if (!static::$pdo) {
                $dsn = 'mysql:host=' . $this->hostname . ';dbname=' . $this->database;
                $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

                static::$pdo = new PDO($dsn, $this->user, $this->password, $options);
                return static::$pdo;
            }
        } catch (PDOException $PDOerror) {
            die("Erro ao realizar a conexão com o banco de dados (PDO exception) " . $PDOerror->getMessage());
        } catch (Exception $error) {
            die("Erro ao realizar a conexão com o banco de dados (General exception) " . $error->getMessage());
        }
    }
}
?>