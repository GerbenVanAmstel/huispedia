<?php

namespace Tests\Unit;

use App\Enums\WoningOnderhoudEnum;
use App\Enums\WoningTypeEnum;
use App\Models\User;
use App\Repositories\WoningWaardeRepository;
use App\Services\WoningWaardeService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ResetTest
 * @package Tests\Unit
 */
class BerekenWoningWaardeTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function wanneer_berekening_appartment_woning_waarde_ensure_correct_waarde_returned()
    {
        $user = User::factory()->create();

        $data = [
            'naam' => $user->name,
            'email' => $user->email,
            'postcode' => '1363TR',
            'huisnummer' => '57A',
            'woningtype' => WoningTypeEnum::Appartement->value,
            'onderhoud' => WoningOnderhoudEnum::Slecht->value,
            'woonoppervlakte' => 10.5,
            'perceeloppervlakte' => 10.5,
        ];

        $woningWaardeRepository = new WoningWaardeRepository();

        $woningWaardeService = new WoningWaardeService($woningWaardeRepository);

        $this->actingAs($user)->assertEquals('53919,60',$woningWaardeService->berekenEnStoreWaarde($data));
    }

    /** @test */
    public function wanneer_berekening_geen_appartment_woning_waarde_ensure_correct_waarde_returned()
    {
        $user = User::factory()->create();

        $data = [
            'naam' => $user->name,
            'email' => $user->email,
            'postcode' => '1363TR',
            'huisnummer' => '57A',
            'woningtype' => WoningTypeEnum::Vrijstaandewoning->value,
            'onderhoud' => WoningOnderhoudEnum::Slecht->value,
            'woonoppervlakte' => 10.5,
            'perceeloppervlakte' => 10.5,
        ];

        $woningWaardeRepository = new WoningWaardeRepository();

        $woningWaardeService = new WoningWaardeService($woningWaardeRepository);

        $this->actingAs($user)->assertEquals('57212,40',$woningWaardeService->berekenEnStoreWaarde($data));
    }
}
