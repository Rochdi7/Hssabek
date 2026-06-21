<?php

namespace Tests\Feature\Foundation;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class BackofficeErrorHandlingTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Route::middleware('web')->get('/__test/source', function () {
            return 'source';
        });

        Route::middleware('web')->post('/__test/boom', function () {
            throw new \RuntimeException('Debug page should never leak to users.');
        });
    }

    public function test_production_exception_on_web_post_redirects_back_with_friendly_message(): void
    {
        config(['app.debug' => false]);

        $response = $this->from('/__test/source')->post('/__test/boom');

        $response->assertRedirect('/__test/source');
        $response->assertSessionHas('error');
        $response->assertSessionMissing('exception');
    }

    public function test_production_exception_on_json_request_returns_safe_json(): void
    {
        config(['app.debug' => false]);

        $response = $this->postJson('/__test/boom');

        $response->assertStatus(500)
            ->assertJson([
                'success' => false,
                'message' => 'Une erreur inattendue est survenue. Veuillez reessayer plus tard.',
            ])
            ->assertJsonMissingPath('trace')
            ->assertJsonMissingPath('file');

        $response->assertDontSeeText('Debug page should never leak to users.');
    }
}
