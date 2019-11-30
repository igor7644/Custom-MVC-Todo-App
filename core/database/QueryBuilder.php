<?php

namespace App\Core\Database;
use PDO;

class QueryBuilder{

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function all($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function create($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
                    $table,
                    implode(', ', array_keys($parameters)),
                    ':'.implode(', :', array_keys($parameters))
        );

        try
        {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e)
        {
            die('Something went wrong!');
        }
    }

    public function delete($id, $table)
    {
        try
        {
            $statement = $this->pdo->prepare("delete from {$table} where id = :id");
            $statement->execute([':id' => $id]);
        } catch (Exception $e)
        {
            die('Something went wrong!');
        }
    }

}
