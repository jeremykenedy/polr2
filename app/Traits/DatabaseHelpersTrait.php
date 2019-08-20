<?php

namespace App\Traits;

trait DatabaseHelpersTrait
{
    /**
     * Get the database connection.
     */
    public function getConnectionName()
    {
        return $this->connection;
    }

    /**
     * Get the database table.
     */
    public function getTableName()
    {
        return $this->table;
    }
}




