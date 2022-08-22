<?php namespace Tests\Repositories;

use App\Models\TruckType;
use App\Repositories\TruckTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TruckTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TruckTypeRepository
     */
    protected $truckTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->truckTypeRepo = \App::make(TruckTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_truck_type()
    {
        $truckType = factory(TruckType::class)->make()->toArray();

        $createdTruckType = $this->truckTypeRepo->create($truckType);

        $createdTruckType = $createdTruckType->toArray();
        $this->assertArrayHasKey('id', $createdTruckType);
        $this->assertNotNull($createdTruckType['id'], 'Created TruckType must have id specified');
        $this->assertNotNull(TruckType::find($createdTruckType['id']), 'TruckType with given id must be in DB');
        $this->assertModelData($truckType, $createdTruckType);
    }

    /**
     * @test read
     */
    public function test_read_truck_type()
    {
        $truckType = factory(TruckType::class)->create();

        $dbTruckType = $this->truckTypeRepo->find($truckType->id);

        $dbTruckType = $dbTruckType->toArray();
        $this->assertModelData($truckType->toArray(), $dbTruckType);
    }

    /**
     * @test update
     */
    public function test_update_truck_type()
    {
        $truckType = factory(TruckType::class)->create();
        $fakeTruckType = factory(TruckType::class)->make()->toArray();

        $updatedTruckType = $this->truckTypeRepo->update($fakeTruckType, $truckType->id);

        $this->assertModelData($fakeTruckType, $updatedTruckType->toArray());
        $dbTruckType = $this->truckTypeRepo->find($truckType->id);
        $this->assertModelData($fakeTruckType, $dbTruckType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_truck_type()
    {
        $truckType = factory(TruckType::class)->create();

        $resp = $this->truckTypeRepo->delete($truckType->id);

        $this->assertTrue($resp);
        $this->assertNull(TruckType::find($truckType->id), 'TruckType should not exist in DB');
    }
}
