<?php

namespace App\Core\Database;
use App\Core\ExceptionHandler;
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
        if(empty($parameters['title']))
        {
            throw new ExceptionHandler("Input can't be empty!", 403, null);
        }
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
        } catch (\ExceptionHandler $exception)
        {
            $exception->handle();
        }
    }

    public function delete($id, $table)
    {
        try
        {
            $statement = $this->pdo->prepare("delete from {$table} where id = :id");
            $statement->execute([':id' => $id]);
        } catch (\ExceptionHandler $exception)
        {
            $exception->handle();
        }
    }

    public function complete($id, $table)
    {
        try
        {
            $statement = $this->pdo->prepare("update {$table} set completed = true where id = :id");
            $statement->execute([':id' => $id]);
        } catch (\ExceptionHandler $exception)
        {
            $exception->handle();
        }
    }

}
