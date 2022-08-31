<?php namespace Tests\Repositories;

use App\Models\reports;
use App\Repositories\reportsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class reportsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var reportsRepository
     */
    protected $reportsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->reportsRepo = \App::make(reportsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_reports()
    {
        $reports = factory(reports::class)->make()->toArray();

        $createdreports = $this->reportsRepo->create($reports);

        $createdreports = $createdreports->toArray();
        $this->assertArrayHasKey('id', $createdreports);
        $this->assertNotNull($createdreports['id'], 'Created reports must have id specified');
        $this->assertNotNull(reports::find($createdreports['id']), 'reports with given id must be in DB');
        $this->assertModelData($reports, $createdreports);
    }

    /**
     * @test read
     */
    public function test_read_reports()
    {
        $reports = factory(reports::class)->create();

        $dbreports = $this->reportsRepo->find($reports->id);

        $dbreports = $dbreports->toArray();
        $this->assertModelData($reports->toArray(), $dbreports);
    }

    /**
     * @test update
     */
    public function test_update_reports()
    {
        $reports = factory(reports::class)->create();
        $fakereports = factory(reports::class)->make()->toArray();

        $updatedreports = $this->reportsRepo->update($fakereports, $reports->id);

        $this->assertModelData($fakereports, $updatedreports->toArray());
        $dbreports = $this->reportsRepo->find($reports->id);
        $this->assertModelData($fakereports, $dbreports->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_reports()
    {
        $reports = factory(reports::class)->create();

        $resp = $this->reportsRepo->delete($reports->id);

        $this->assertTrue($resp);
        $this->assertNull(reports::find($reports->id), 'reports should not exist in DB');
    }
}
