<?php
require_once 'koneksi.php';

class Model
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function read($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function upload($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }
    public function update($table, $data, $where)
    {
        $setPart = "";
        foreach ($data as $column => $value) {
            $setPart .= "$column = :set_$column, ";
        }
        $setPart = rtrim($setPart, ", ");

        $wherePart = "";
        foreach ($where as $column => $value) {
            $wherePart .= "$column = :where_$column AND ";
        }
        $wherePart = rtrim($wherePart, " AND ");

        $sql = "UPDATE $table SET $setPart WHERE $wherePart";
        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $column => $value) {
            $stmt->bindValue(":set_$column", $value);
        }
        foreach ($where as $column => $value) {
            $stmt->bindValue(":where_$column", $value);
        }

        return $stmt->execute();
    }

    public function delete($table, $where)
    {
        $wherePart = "";
        foreach ($where as $column => $value) {
            $wherePart .= "$column = :$column AND ";
        }
        $wherePart = rtrim($wherePart, " AND ");

        $sql = "DELETE FROM $table WHERE $wherePart";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($where);
    }

    public function getById($table, $where)
    {
        $wherePart = "";
        foreach ($where as $column => $value) {
            $wherePart .= "$column = :$column AND ";
        }
        $wherePart = rtrim($wherePart, " AND ");

        $sql = "SELECT * FROM $table WHERE $wherePart LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($where);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>