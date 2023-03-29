<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\NotFoundException;
use App\Exception\StorageException;
use DateTime;
use PDO;
use Throwable;

class GroupModel extends AbstractModel
{
    public function listGroup(): array
    {
        try {
            $query = "SELECT * FROM User_groups";
            $result = $this->conn->query($query, PDO::FETCH_ASSOC);
            return $result->fetchAll();
        } catch (Throwable $e) {
            throw new StorageException("Nie udało się pobrać grup", 400, $e);
        }
    }
}