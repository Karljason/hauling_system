<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TestIdType;

class TestIdTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_test_id_type()
    {
        $testIdType = factory(TestIdType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/test_id_types', $testIdType
        );

        $this->assertApiResponse($testIdType);
    }

    /**
     * @test
     */
    public function test_read_test_id_type()
    {
        $testIdType = factory(TestIdType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/test_id_types/'.$testIdType->id
        );

        $this->assertApiResponse($testIdType->toArray());
    }

    /**
     * @test
     */
    public function test_update_test_id_type()
    {
        $testIdType = factory(TestIdType::class)->create();
        $editedTestIdType = factory(TestIdType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/test_id_types/'.$testIdType->id,
            $editedTestIdType
        );

        $this->assertApiResponse($editedTestIdType);
    }

    /**
     * @test
     */
    public function test_delete_test_id_type()
    {
        $testIdType = factory(TestIdType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/test_id_types/'.$testIdType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/test_id_types/'.$testIdType->id
        );

        $this->response->assertStatus(404);
    }
}
