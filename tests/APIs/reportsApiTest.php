<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\reports;

class reportsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_reports()
    {
        $reports = factory(reports::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/reports', $reports
        );

        $this->assertApiResponse($reports);
    }

    /**
     * @test
     */
    public function test_read_reports()
    {
        $reports = factory(reports::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/reports/'.$reports->id
        );

        $this->assertApiResponse($reports->toArray());
    }

    /**
     * @test
     */
    public function test_update_reports()
    {
        $reports = factory(reports::class)->create();
        $editedreports = factory(reports::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/reports/'.$reports->id,
            $editedreports
        );

        $this->assertApiResponse($editedreports);
    }

    /**
     * @test
     */
    public function test_delete_reports()
    {
        $reports = factory(reports::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/reports/'.$reports->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/reports/'.$reports->id
        );

        $this->response->assertStatus(404);
    }
}
