<?php

namespace App\Repositories;

use App\Models\WoningWaarde;

class WoningWaardeRepository
{
    public function store(array $data): void
    {
        WoningWaarde::create($data);
    }
}
