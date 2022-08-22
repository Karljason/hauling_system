<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Company;

class CompanyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_company()
    {
        $company = factory(Company::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/companies', $company
        );

        $this->assertApiResponse($company);
    }

    /**
     * @test
     */
    public function test_read_company()
    {
        $company = factory(Company::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/companies/'.$company->id
        );

        $this->assertApiResponse($company->toArray());
    }

    /**
     * @test
     */
    public function test_update_company()
    {
        $company = factory(Company::class)->create();
        $editedCompany = factory(Company::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/companies/'.$company->id,
            $editedCompany
        );

        $this->assertApiResponse($editedCompany);
    }

    /**
     * @test
     */
    public function test_delete_company()
    {
        $company = factory(Company::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/companies/'.$company->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/companies/'.$company->id
        );

        $this->response->assertStatus(404);
    }
}
