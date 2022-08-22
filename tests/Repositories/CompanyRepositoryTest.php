<?php namespace Tests\Repositories;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CompanyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CompanyRepository
     */
    protected $companyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->companyRepo = \App::make(CompanyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_company()
    {
        $company = factory(Company::class)->make()->toArray();

        $createdCompany = $this->companyRepo->create($company);

        $createdCompany = $createdCompany->toArray();
        $this->assertArrayHasKey('id', $createdCompany);
        $this->assertNotNull($createdCompany['id'], 'Created Company must have id specified');
        $this->assertNotNull(Company::find($createdCompany['id']), 'Company with given id must be in DB');
        $this->assertModelData($company, $createdCompany);
    }

    /**
     * @test read
     */
    public function test_read_company()
    {
        $company = factory(Company::class)->create();

        $dbCompany = $this->companyRepo->find($company->id);

        $dbCompany = $dbCompany->toArray();
        $this->assertModelData($company->toArray(), $dbCompany);
    }

    /**
     * @test update
     */
    public function test_update_company()
    {
        $company = factory(Company::class)->create();
        $fakeCompany = factory(Company::class)->make()->toArray();

        $updatedCompany = $this->companyRepo->update($fakeCompany, $company->id);

        $this->assertModelData($fakeCompany, $updatedCompany->toArray());
        $dbCompany = $this->companyRepo->find($company->id);
        $this->assertModelData($fakeCompany, $dbCompany->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_company()
    {
        $company = factory(Company::class)->create();

        $resp = $this->companyRepo->delete($company->id);

        $this->assertTrue($resp);
        $this->assertNull(Company::find($company->id), 'Company should not exist in DB');
    }
}
