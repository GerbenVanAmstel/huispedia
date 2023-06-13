<?php

namespace App\Services;

use App\Enums\WoningOnderhoudEnum;
use App\Enums\WoningTypeEnum;
use App\Repositories\WoningWaardeRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class WoningWaardeService
{
    public function __construct(private readonly WoningWaardeRepository $woningWaardeRepository)
    {
    }

    public function berekenEnStoreWaarde(array $data): string
    {
        $waarde = $data['woonoppervlakte'] * 5240;

        if ($data['woningtype'] != WoningTypeEnum::Appartement->value) {
            $waarde += $data['perceeloppervlakte'] * 320;
        }

        match ($data['onderhoud']) {
            WoningOnderhoudEnum::Uitstekend->value => $waarde = $waarde * 1.02,
            WoningOnderhoudEnum::Goed->value => $waarde = $waarde * 1.01,
            WoningOnderhoudEnum::ToeAanOnderhoud->value => $waarde = $waarde * 0.99,
            WoningOnderhoudEnum::Slecht->value => $waarde = $waarde * 0.98,
        };

        $data = Arr::add($data, 'waarde', $waarde);

        $this->woningWaardeRepository->store($data);

        $this->saveToTxtFile($data);

        $waarde = number_format($waarde, 2, ",", "");

        return $waarde;
    }

    private function saveToTxtFile(array $data): void
    {
        Storage::append('woningwaardelog.txt', implode("|", $data));
    }
}
