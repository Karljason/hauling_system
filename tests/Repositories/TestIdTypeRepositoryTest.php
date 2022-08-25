<?php namespace Tests\Repositories;

use App\Models\TestIdType;
use App\Repositories\TestIdTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TestIdTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TestIdTypeRepository
     */
    protected $testIdTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->testIdTypeRepo = \App::make(TestIdTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_test_id_type()
    {
        $testIdType = factory(TestIdType::class)->make()->toArray();

        $createdTestIdType = $this->testIdTypeRepo->create($testIdType);

        $createdTestIdType = $createdTestIdType->toArray();
        $this->assertArrayHasKey('id', $createdTestIdType);
        $this->assertNotNull($createdTestIdType['id'], 'Created TestIdType must have id specified');
        $this->assertNotNull(TestIdType::find($createdTestIdType['id']), 'TestIdType with given id must be in DB');
        $this->assertModelData($testIdType, $createdTestIdType);
    }

    /**
     * @test read
     */
    public function test_read_test_id_type()
    {
        $testIdType = factory(TestIdType::class)->create();

        $dbTestIdType = $this->testIdTypeRepo->find($testIdType->id);

        $dbTestIdType = $dbTestIdType->toArray();
        $this->assertModelData($testIdType->toArray(), $dbTestIdType);
    }

    /**
     * @test update
     */
    public function test_update_test_id_type()
    {
        $testIdType = factory(TestIdType::class)->create();
        $fakeTestIdType = factory(TestIdType::class)->make()->toArray();

        $updatedTestIdType = $this->testIdTypeRepo->update($fakeTestIdType, $testIdType->id);

        $this->assertModelData($fakeTestIdType, $updatedTestIdType->toArray());
        $dbTestIdType = $this->testIdTypeRepo->find($testIdType->id);
        $this->assertModelData($fakeTestIdType, $dbTestIdType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_test_id_type()
    {
        $testIdType = factory(TestIdType::class)->create();

        $resp = $this->testIdTypeRepo->delete($testIdType->id);

        $this->assertTrue($resp);
        $this->assertNull(TestIdType::find($testIdType->id), 'TestIdType should not exist in DB');
    }
}
