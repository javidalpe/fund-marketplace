<?php

use App\Models\Vehicle;
use App\Repositories\VehicleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleRepositoryTest extends TestCase
{
    use MakeVehicleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VehicleRepository
     */
    protected $vehicleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->vehicleRepo = App::make(VehicleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVehicle()
    {
        $vehicle = $this->fakeVehicleData();
        $createdVehicle = $this->vehicleRepo->create($vehicle);
        $createdVehicle = $createdVehicle->toArray();
        $this->assertArrayHasKey('id', $createdVehicle);
        $this->assertNotNull($createdVehicle['id'], 'Created Vehicle must have id specified');
        $this->assertNotNull(Vehicle::find($createdVehicle['id']), 'Vehicle with given id must be in DB');
        $this->assertModelData($vehicle, $createdVehicle);
    }

    /**
     * @test read
     */
    public function testReadVehicle()
    {
        $vehicle = $this->makeVehicle();
        $dbVehicle = $this->vehicleRepo->find($vehicle->id);
        $dbVehicle = $dbVehicle->toArray();
        $this->assertModelData($vehicle->toArray(), $dbVehicle);
    }

    /**
     * @test update
     */
    public function testUpdateVehicle()
    {
        $vehicle = $this->makeVehicle();
        $fakeVehicle = $this->fakeVehicleData();
        $updatedVehicle = $this->vehicleRepo->update($fakeVehicle, $vehicle->id);
        $this->assertModelData($fakeVehicle, $updatedVehicle->toArray());
        $dbVehicle = $this->vehicleRepo->find($vehicle->id);
        $this->assertModelData($fakeVehicle, $dbVehicle->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVehicle()
    {
        $vehicle = $this->makeVehicle();
        $resp = $this->vehicleRepo->delete($vehicle->id);
        $this->assertTrue($resp);
        $this->assertNull(Vehicle::find($vehicle->id), 'Vehicle should not exist in DB');
    }
}
