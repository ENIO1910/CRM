<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\StorageException;
use PDO;
use Throwable;

class GroupModel extends AbstractModel
{

    public function list(): array
    {
        try {

            $query = "SELECT * FROM `groups`";
            $result = $this->conn->query($query, PDO::FETCH_ASSOC);
            return $result->fetchAll();
        } catch (Throwable $e) {
            throw new StorageException("Nie udało się pobrać notatek", 400, $e);
        }
    }

    public function create(array $data): void
    {
        try {
            $name = $this->conn->quote($data['name']);
            $query = "
                INSERT INTO `groups` (name) 
                VALUES($name)";
            $this->conn->exec($query);
        } catch (Throwable $e) {
            throw new StorageException("Nie udało się utworzyć notatki", 400, $e);
        }
    }

}