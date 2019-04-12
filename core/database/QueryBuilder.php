<?php

namespace App\Core\Database;
use PDO;
use PDOException;

class QueryBuilder
{

  protected $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function selectAll($table)
  {
    $statement = $this->pdo->prepare("select * from {$table}");

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function select($sql, $parameters=[])
  {
    try{
      $statement = $this->pdo->prepare($sql);
      $statement->execute($parameters);
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }catch (\Exception $e){
      die($e->getMessage());
    }
  }

  //Temporary function for testing
  public function selectPassword($sql, $email)
  {
    try{
      $statement = $this->pdo->prepare($sql);
      $statement->bindParam(':email', $email, PDO::PARAM_STR);
      $statement->execute();
      return $statement->fetch();
    }catch (\Exception $e){
      die($e->getMessage());
    }
  }

  //TODO: refactor update
  public function update($sql, $parameters=[]){
    try{
      $statement = $this->pdo->prepare($sql);
      $statement->execute($parameters);
    }catch (\Exception $e){
      die($e->getMessage());
    }
  }

  public function insert($table, $parameters)
  {
    $sql =  sprintf(
      'insert into %s (%s) values (%s)',
      $table,
      implode(', ', array_keys($parameters)),
      ':' . implode(', :', array_keys($parameters))
    );

    try{
      $statement = $this->pdo->prepare($sql);
      $statement->execute($parameters);
    }catch (Exception $e){
      die($e->getMessage());
    }
  }
}

?>