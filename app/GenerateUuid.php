<?php

namespace App;

use Webpatser\Uuid\Uuid;

trait GenerateUuid
{
    /**
     * Get a new version 4 (random) UUID.
     */
    public function generateNewId()
    {
        return Uuid::generate();
    }
}
