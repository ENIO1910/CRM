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

    public function delete($id)

}
