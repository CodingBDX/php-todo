<?php

class Database
{
    private SQLite3 $db;

    public function __construct(string $filename)
    {
        $this->db = new SQLite3($filename);
    }

    public function initialize(): void
    {
        $query = "
CREATE Table IF NOT EXISTS task (
	id INTEGER not NULL ,
	done boolean not null,
	name VARCHAR(255) not null,
    PRIMARY KEY ('id'  AUTOINCREMENT)
);";
        $this->exec($query);
    }

    public function getTasks(): array
    {
        $tasks = [];
        $query = 'SELECT * FROM task;';

        $data = $this->db->query($query);

        while ($row = $data->fetchArray()) {
            $tasks[] = $row;
        }

        return $tasks;
    }

    public function addTask(string $name): void
    {
        $query = "INSERT INTO TASK(`done`,`name`)
        VALUES
        (false, '{$name}')
        ;";

        $this->exec($query);
    }

    public function updateTask(int $id, int $done)
    {
        $query = "UPDATE task SET `done` = {$done} WHERE `id` = {$id};";

        $this->exec($query);
    }

    public function getdatabase(): SQLite3
    {
        return $this->db;
    }

    private function exec(string $query): void
    {
        $this->db->prepare($query);
        $this->db->exec($query);
    }
}
