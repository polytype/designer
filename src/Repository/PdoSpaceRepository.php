<?php

namespace Polytype\Designer\Repository;

use Polytype\Designer\Model\Space;
use PDO;

class PdoSpaceRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getByAccountName($accountName)
    {
        $statement = $this->pdo->prepare(
            "SELECT *
            FROM space
            WHERE account_name=:account_name"
        );
        $statement->execute(array(
            'account_name' => $accountName,
        ));
        $rows = $statement->fetchAll();
        $objects = array();
        foreach ($rows as $row) {
            $objects[] = $this->rowToObject($row);
        }
        return $objects;
    }

    public function getByName($accountName, $spaceName)
    {
        $statement = $this->pdo->prepare(
            "SELECT *
            FROM space
            WHERE name=:space_name
            AND account_name=:account_name
            LIMIT 1"
        );
        $statement->execute(array(
            'space_name' => $spaceName,
            'account_name' => $accounName,
            
        ));
        $row = $statement->fetch();

        return $row ? $this->rowToObject($row) : null;
    }

    public function getAll()
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM space"
        );
        $statement->execute();
        $rows = $statement->fetchAll();
        $objects = array();
        foreach ($rows as $row) {
            $objects[] = $this->rowToObject($row);
        }

        return $objects;
    }

    public function add(Space $space)
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO space () VALUES ()'
        );
        $statement->execute();
        $space->setId($this->pdo->lastInsertId());
        $this->update($space);

        return true;
    }

    public function update(Space $space)
    {
        $statement = $this->pdo->prepare(
            "UPDATE space
             SET name=:name, account_name=:account_name, description=:description
             WHERE id=:id"
        );
        $statement->execute(
            [
                'id' => $space->getId(),
                'name' => $space->getName(),
                'account_name' => $space->getAccountName(),
                'email' => $space->getEmail(),
                'description' => $space->getDescription(),
            ]
        );

        return $space;
    }

    public function delete(Space $space)
    {
        $statement = $this->pdo->prepare(
            "DELETE FROM space WHERE id=:id"
        );
        $statement->execute(
            [
                'id' => $space->getId(),
            ]
        );
    }

    private function rowToObject($row)
    {
        if (!$row) {
            return null;
        }
        $obj = new Space();
        $obj->setId($row['id'])
            ->setName($row['name'])
            ->setAccountName($row['account_name'])
            ->setDescription($row['description']);

        return $obj;
    }
}
