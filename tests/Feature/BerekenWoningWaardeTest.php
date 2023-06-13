<?php

namespace Tests\Feature;

use App\Enums\WoningOnderhoudEnum;
use App\Enums\WoningTypeEnum;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BerekenWoningWaardeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function woningwaarde_post_is_succesful_en_stores_woning_waarde()
    {
        $user = User::factory()->create();

        $this->assertDatabaseCount('woning_waardes', 0);

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

        $response = $this->actingAs($user)->postJson(
            '/woningwaarde',
               $data
        );

        $response->assertOk();

        $this->assertDatabaseCount('woning_waardes', 1);
    }

    /**
     * @test
     */
    public function woningwaarde_post_is_onsuccesful_wanneer_validatie_fails()
    {
        $user = User::factory()->create();

        $this->assertDatabaseCount('woning_waardes', 0);

        $data = [
            'naam' => $user->name,
            'email' => $user->email,
            'postcode' => '1363TRR',
            'huisnummer' => '57A',
            'woningtype' => WoningTypeEnum::Appartement->value,
            'onderhoud' => WoningOnderhoudEnum::Slecht->value,
            'woonoppervlakte' => 10.5,
            'perceeloppervlakte' => 10.5,
        ];

        $response = $this->actingAs($user)->postJson(
            '/woningwaarde',
            $data
        );

        $response->assertStatus(422);

        $this->assertDatabaseCount('woning_waardes', 0);
    }
}
