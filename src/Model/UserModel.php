<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\NotFoundException;
use App\Exception\StorageException;
use DateTime;
use PDO;
use Throwable;

class UserModel extends AbstractModel
{
    /**
     * @return array
     * @throws StorageException
     */
    public function list(): array
    {
        try {
            $query = "SELECT * FROM users";
            $result = $this->conn->query($query, PDO::FETCH_ASSOC);
            return $result->fetchAll();
        } catch (Throwable $e) {
            throw new StorageException("Nie udało się pobrać notatek", 400, $e);
        }
    }

    /**
     * @param array $data
     * @return void
     * @throws StorageException
     */
    public function create(array $data): void
    {
        try {
            $username = $this->conn->quote($data['username']);
            $password = $this->conn->quote($data['password']);
            $first_name = $this->conn->quote($data['first_name']);
            $last_name = $this->conn->quote($data['last_name']);
            $birthdate = $this->conn->quote($data['birthdate']);
            $query = "
                INSERT INTO users (username, password, first_name, last_name, birthdate) 
                VALUES($username, $password, $first_name, $last_name, $birthdate)";
            $this->conn->exec($query);
        } catch (Throwable $e) {
            throw new StorageException("Nie udało się utworzyć notatki", 400, $e);
        }
    }

    public function get(int $id): array
    {
        try {
            $query = "SELECT * FROM users WHERE id = $id";
            $result = $this->conn->query($query, PDO::FETCH_ASSOC);
            $user = $result->fetch();
        } catch (Throwable $e) {
            throw new StorageException("Failed to download user.", 400, $e);
        }
        if (!$user) {
            throw new NotFoundException("User with id: $id does not exist.");
        }
        return $user;
    }

    public function update(int $id, array $data): void
    {
        try {
            $username = $this->conn->quote($data['username']);
            $password = $this->conn->quote($data['password']);
            $first_name = $this->conn->quote($data['first_name']);
            $last_name = $this->conn->quote($data['last_name']);
            $birthdate = $this->conn->quote($data['birthdate']);

            $query = "
                UPDATE users 
                SET username = $username, password = $password, first_name = $first_name, last_name = $last_name, birthdate = $birthdate 
                WHERE id = $id
                ";

            $this->conn->exec($query);
        } catch (Throwable $e) {
            throw new StorageException("Nie udało się zaktualizować notatki", 400, $e);
        }
    }


    /**
     * @param int $id
     * @return void
     * @throws StorageException
     */
    public function delete(int $id): void
    {
        try {
            $query = "DELETE FROM users WHERE id = $id";
            $this->conn->exec($query);
        } catch (Throwable $e) {
            throw new StorageException("Nie udało się usunąć notatki", 400, $e);
        }
    }


}

