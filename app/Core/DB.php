<?php
/**
 * User: dmitriy
 * Date: 9/25/19
 * Time: 8:40 PM
 */

namespace App\Core;


use PDO;

class DB
{
    private static $instance;

    /** @var PDO */
    private $connection;

    public static function gi(): self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * @return PDO
     */
    private function connect(): PDO
    {
        if (null === $this->connection) {
            $config = Config::gi()->db();
            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->connection = new PDO(
                "mysql:dbname=$config[database];host=$config[host];port=$config[port];charset=utf8",
                $config['username'],
                $config['password'],
                $opt
            );
        }

        return $this->connection;
    }

    public function insert(string $table, array $attributes)
    {
        $query = "INSERT INTO `$table` (" . implode(', ', array_keys($attributes)) . ") VALUES (" . implode(', ', array_map(function ($key) {
                return ':' . $key;
            }, array_keys($attributes))) . ")";

        $p = $this->connect()->prepare($query);
        foreach ($attributes as $key => $value) {
            $p->bindValue(':' . $key, $value);
        }
        if ($p->execute()) {
            $id = $this->connect()->lastInsertId();
            $rows = $this->query("SELECT * FROM `$table` WHERE `id`='$id' LIMIT 1");
            foreach ($rows as $row) {
                return $row;
            }
        }
        return $this->connect()->errorInfo();
    }

    /**
     * @param string $queryString
     * @return bool|\PDOStatement
     */
    public function query(string $queryString)
    {
        $query = $this->connect()->prepare($queryString);
        $query->execute();
        return $query;
    }
}