<?php namespace Tests\Repositories;

use App\Models\requisitions;
use App\Repositories\requisitionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class requisitionsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var requisitionsRepository
     */
    protected $requisitionsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->requisitionsRepo = \App::make(requisitionsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_requisitions()
    {
        $requisitions = factory(requisitions::class)->make()->toArray();

        $createdrequisitions = $this->requisitionsRepo->create($requisitions);

        $createdrequisitions = $createdrequisitions->toArray();
        $this->assertArrayHasKey('id', $createdrequisitions);
        $this->assertNotNull($createdrequisitions['id'], 'Created requisitions must have id specified');
        $this->assertNotNull(requisitions::find($createdrequisitions['id']), 'requisitions with given id must be in DB');
        $this->assertModelData($requisitions, $createdrequisitions);
    }

    /**
     * @test read
     */
    public function test_read_requisitions()
    {
        $requisitions = factory(requisitions::class)->create();

        $dbrequisitions = $this->requisitionsRepo->find($requisitions->id);

        $dbrequisitions = $dbrequisitions->toArray();
        $this->assertModelData($requisitions->toArray(), $dbrequisitions);
    }

    /**
     * @test update
     */
    public function test_update_requisitions()
    {
        $requisitions = factory(requisitions::class)->create();
        $fakerequisitions = factory(requisitions::class)->make()->toArray();

        $updatedrequisitions = $this->requisitionsRepo->update($fakerequisitions, $requisitions->id);

        $this->assertModelData($fakerequisitions, $updatedrequisitions->toArray());
        $dbrequisitions = $this->requisitionsRepo->find($requisitions->id);
        $this->assertModelData($fakerequisitions, $dbrequisitions->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_requisitions()
    {
        $requisitions = factory(requisitions::class)->create();

        $resp = $this->requisitionsRepo->delete($requisitions->id);

        $this->assertTrue($resp);
        $this->assertNull(requisitions::find($requisitions->id), 'requisitions should not exist in DB');
    }
}
