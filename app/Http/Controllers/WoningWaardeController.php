<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetWoningWaardeRequest;
use App\Services\WoningWaardeService;

class WoningWaardeController extends Controller
{
    public function __construct(private readonly WoningWaardeService $woningWaardeService)
    {
    }

    public function index(GetWoningWaardeRequest $request): string
    {
        return $this->woningWaardeService->berekenEnStoreWaarde($request->validated());
    }
}
