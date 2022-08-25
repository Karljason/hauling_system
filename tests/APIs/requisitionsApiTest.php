<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\requisitions;

class requisitionsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_requisitions()
    {
        $requisitions = factory(requisitions::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/requisitions', $requisitions
        );

        $this->assertApiResponse($requisitions);
    }

    /**
     * @test
     */
    public function test_read_requisitions()
    {
        $requisitions = factory(requisitions::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/requisitions/'.$requisitions->id
        );

        $this->assertApiResponse($requisitions->toArray());
    }

    /**
     * @test
     */
    public function test_update_requisitions()
    {
        $requisitions = factory(requisitions::class)->create();
        $editedrequisitions = factory(requisitions::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/requisitions/'.$requisitions->id,
            $editedrequisitions
        );

        $this->assertApiResponse($editedrequisitions);
    }

    /**
     * @test
     */
    public function test_delete_requisitions()
    {
        $requisitions = factory(requisitions::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/requisitions/'.$requisitions->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/requisitions/'.$requisitions->id
        );

        $this->response->assertStatus(404);
    }
}
