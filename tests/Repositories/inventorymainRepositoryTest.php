<?php namespace Tests\Repositories;

use App\Models\inventorymain;
use App\Repositories\inventorymainRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class inventorymainRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var inventorymainRepository
     */
    protected $inventorymainRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->inventorymainRepo = \App::make(inventorymainRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_inventorymain()
    {
        $inventorymain = factory(inventorymain::class)->make()->toArray();

        $createdinventorymain = $this->inventorymainRepo->create($inventorymain);

        $createdinventorymain = $createdinventorymain->toArray();
        $this->assertArrayHasKey('id', $createdinventorymain);
        $this->assertNotNull($createdinventorymain['id'], 'Created inventorymain must have id specified');
        $this->assertNotNull(inventorymain::find($createdinventorymain['id']), 'inventorymain with given id must be in DB');
        $this->assertModelData($inventorymain, $createdinventorymain);
    }

    /**
     * @test read
     */
    public function test_read_inventorymain()
    {
        $inventorymain = factory(inventorymain::class)->create();

        $dbinventorymain = $this->inventorymainRepo->find($inventorymain->id);

        $dbinventorymain = $dbinventorymain->toArray();
        $this->assertModelData($inventorymain->toArray(), $dbinventorymain);
    }

    /**
     * @test update
     */
    public function test_update_inventorymain()
    {
        $inventorymain = factory(inventorymain::class)->create();
        $fakeinventorymain = factory(inventorymain::class)->make()->toArray();

        $updatedinventorymain = $this->inventorymainRepo->update($fakeinventorymain, $inventorymain->id);

        $this->assertModelData($fakeinventorymain, $updatedinventorymain->toArray());
        $dbinventorymain = $this->inventorymainRepo->find($inventorymain->id);
        $this->assertModelData($fakeinventorymain, $dbinventorymain->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_inventorymain()
    {
        $inventorymain = factory(inventorymain::class)->create();

        $resp = $this->inventorymainRepo->delete($inventorymain->id);

        $this->assertTrue($resp);
        $this->assertNull(inventorymain::find($inventorymain->id), 'inventorymain should not exist in DB');
    }
}
