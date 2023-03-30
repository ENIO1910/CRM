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
            $query = "SELECT u.*, g.name AS group_name 
                  FROM users u 
                  JOIN users_groups ug ON u.id = ug.user_id 
                  JOIN `groups` g ON ug.group_id = g.id";
            $result = $this->conn->query($query, PDO::FETCH_ASSOC);
            return $result->fetchAll();
        } catch (Throwable $e) {
            throw new StorageException("Failed to download users", 400, $e);
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
            dump($data);
            $username = $this->conn->quote($data['username']);
            $password = $this->conn->quote($data['password']);
            $first_name = $this->conn->quote($data['first_name']);
            $last_name = $this->conn->quote($data['last_name']);
            $birthdate = $this->conn->quote($data['birthdate']);
            $group_id = $this->conn->quote($data['group_id']);

            // Wstawianie użytkownika do tabeli users
            $query = "
            INSERT INTO users (username, password, first_name, last_name, birthdate) 
            VALUES($username, $password, $first_name, $last_name, $birthdate)";
            $this->conn->exec($query);

            // Pobieranie identyfikatora dodanego użytkownika
            $user_id = $this->conn->lastInsertId();

            // Wstawianie wpisu do tabeli users_groups
            $query = "
            INSERT INTO `users_groups` (user_id, group_id)
            VALUES($user_id, $group_id)";
            $this->conn->exec($query);

        } catch (Throwable $e) {
            throw new StorageException("Nie udało się utworzyć użytkownika", 400, $e);
        }
    }

    /**
     * @param int $userId
     * @return mixed|null
     * @throws StorageException
     */
    public function get(int $id)
    {
        try {
            $query = "SELECT u.*, g.name AS group_name 
                  FROM users u 
                  JOIN users_groups ug ON u.id = ug.user_id 
                  JOIN `groups` g ON ug.group_id = g.id
                  WHERE u.id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user ? $user : null;
        } catch (Throwable $e) {
            throw new StorageException("Nie udało się pobrać użytkownika", 400, $e);
        }
    }

    public function update(int $id, array $data): void
    {
        try {
            // Escape input values to prevent SQL injection attacks
            $username = $this->conn->quote($data['username']);
            $password = $this->conn->quote($data['password']);
            $first_name = $this->conn->quote($data['first_name']);
            $last_name = $this->conn->quote($data['last_name']);
            $birthdate = $this->conn->quote($data['birthdate']);
            $group_id = $this->conn->quote($data['group_id']);

            // Begin a transaction to ensure data consistency
            $this->conn->beginTransaction();

            // Update the user's information in the users table
            $query = "
            UPDATE users 
            SET username = $username, password = $password, first_name = $first_name, last_name = $last_name, birthdate = $birthdate 
            WHERE id = $id
        ";

            $this->conn->exec($query);

            // Update the user's group in the users_groups table
            $query = "
            REPLACE INTO users_groups 
            SET user_id = $id, group_id = $group_id
        ";

            $this->conn->exec($query);

            // Commit the transaction
            $this->conn->commit();
        } catch (Throwable $e) {
            // Rollback the transaction if an error occurred
            $this->conn->rollBack();
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
            // First delete the related record from users_groups table
            $deleteQuery = "DELETE FROM users_groups WHERE user_id = $id";
            $this->conn->exec($deleteQuery);

            // Then delete the record from the users table
            $deleteQuery = "DELETE FROM users WHERE id = $id";
            $this->conn->exec($deleteQuery);
        } catch (Throwable $e) {
            throw new StorageException("Failed to delete user", 400, $e);
        }
    }


}

