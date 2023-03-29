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
            $query = "SELECT * FROM Users";
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
            $nazwa = $this->conn->quote($data['nazwa']);
            $password = $this->conn->quote($data['password']);
            $imie = $this->conn->quote($data['imie']);
            $nazwisko = $this->conn->quote($data['nazwisko']);
            $data_urodzenia = $this->conn->quote($data['data_urodzenia']);
            $query = "
                INSERT INTO Users (Nazwa, password, imie, nazwisko, data_urodzenia) 
                VALUES($nazwa, $password, $imie, $nazwisko, $data_urodzenia)";
            $this->conn->exec($query);
        } catch (Throwable $e) {
            throw new StorageException("Nie udało się utworzyć notatki", 400, $e);
        }
    }

    public function get(int $id): array
    {
        try {
            $query = "SELECT * FROM Users WHERE id = $id";
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
            $nazwa = $this->conn->quote($data['nazwa']);
            $password = $this->conn->quote($data['password']);
            $imie = $this->conn->quote($data['imie']);
            $nazwisko = $this->conn->quote($data['nazwisko']);
            $data_urodzenia = $this->conn->quote($data['data_urodzenia']);

            $query = "
                UPDATE Users 
                SET Nazwa = $nazwa, password = $password, imie = $imie, nazwisko = $nazwisko, data_urodzenia = $data_urodzenia 
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
            $query = "DELETE FROM Users WHERE id = $id";
            $this->conn->exec($query);
        } catch (Throwable $e) {
            throw new StorageException("Nie udało się usunąć notatki", 400, $e);
        }
    }


}

