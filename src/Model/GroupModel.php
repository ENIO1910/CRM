<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\NotFoundException;
use App\Exception\StorageException;
use PDO;
use Throwable;

class GroupModel extends AbstractModel
{


    public function get(int $id): array
    {
        try {
            $query = "SELECT * FROM `groups` WHERE id = $id";
            $result = $this->conn->query($query, PDO::FETCH_ASSOC);
            $group = $result->fetch();
        } catch (Throwable $e) {
            throw new StorageException("Failed to download group.", 400, $e);
        }
        if (!$group) {
            throw new NotFoundException("Group with id: $id does not exist.");
        }
        return $group;
    }

    public function list(): array
    {
        try {

            $query = "SELECT * FROM `groups`";
            $result = $this->conn->query($query, PDO::FETCH_ASSOC);
            return $result->fetchAll();
        } catch (Throwable $e) {
            throw new StorageException("Failed to download groups", 400, $e);
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
            throw new StorageException("Failed created group", 400, $e);
        }
    }


    public function delete(int $id): void
    {
        try {
            // First delete the related record from users_groups table
            $deleteQuery = "DELETE FROM users_groups WHERE group_id = $id";
            $this->conn->exec($deleteQuery);

            // Then delete the record from the users table
            $deleteQuery = "DELETE FROM `groups` WHERE id = $id";
            $this->conn->exec($deleteQuery);
        } catch (Throwable $e) {
            throw new StorageException("Failed to delete group", 400, $e);
        }
    }

    public function update(int $id, array $data): void
    {
        try {
            $name = $this->conn->quote($data['name']);
            $query = "UPDATE `groups` SET name = $name WHERE id = $id";

            $this->conn->exec($query);
        } catch (Throwable $e) {
            throw new StorageException("Nie udało się zaktualizować notatki", 400, $e);
        }
    }


}