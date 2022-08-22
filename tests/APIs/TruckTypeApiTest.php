<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TruckType;

class TruckTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_truck_type()
    {
        $truckType = factory(TruckType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/truck_types', $truckType
        );

        $this->assertApiResponse($truckType);
    }

    /**
     * @test
     */
    public function test_read_truck_type()
    {
        $truckType = factory(TruckType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/truck_types/'.$truckType->id
        );

        $this->assertApiResponse($truckType->toArray());
    }

    /**
     * @test
     */
    public function test_update_truck_type()
    {
        $truckType = factory(TruckType::class)->create();
        $editedTruckType = factory(TruckType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/truck_types/'.$truckType->id,
            $editedTruckType
        );

        $this->assertApiResponse($editedTruckType);
    }

    /**
     * @test
     */
    public function test_delete_truck_type()
    {
        $truckType = factory(TruckType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/truck_types/'.$truckType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/truck_types/'.$truckType->id
        );

        $this->response->assertStatus(404);
    }
}
