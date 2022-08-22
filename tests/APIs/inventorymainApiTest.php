<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\inventorymain;

class inventorymainApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_inventorymain()
    {
        $inventorymain = factory(inventorymain::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/inventorymains', $inventorymain
        );

        $this->assertApiResponse($inventorymain);
    }

    /**
     * @test
     */
    public function test_read_inventorymain()
    {
        $inventorymain = factory(inventorymain::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/inventorymains/'.$inventorymain->id
        );

        $this->assertApiResponse($inventorymain->toArray());
    }

    /**
     * @test
     */
    public function test_update_inventorymain()
    {
        $inventorymain = factory(inventorymain::class)->create();
        $editedinventorymain = factory(inventorymain::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/inventorymains/'.$inventorymain->id,
            $editedinventorymain
        );

        $this->assertApiResponse($editedinventorymain);
    }

    /**
     * @test
     */
    public function test_delete_inventorymain()
    {
        $inventorymain = factory(inventorymain::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/inventorymains/'.$inventorymain->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/inventorymains/'.$inventorymain->id
        );

        $this->response->assertStatus(404);
    }
}
