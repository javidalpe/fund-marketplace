<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleApiTest extends TestCase
{
    use MakeVehicleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVehicle()
    {
        $vehicle = $this->fakeVehicleData();
        $this->json('POST', '/api/v1/vehicles', $vehicle);

        $this->assertApiResponse($vehicle);
    }

    /**
     * @test
     */
    public function testReadVehicle()
    {
        $vehicle = $this->makeVehicle();
        $this->json('GET', '/api/v1/vehicles/'.$vehicle->id);

        $this->assertApiResponse($vehicle->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVehicle()
    {
        $vehicle = $this->makeVehicle();
        $editedVehicle = $this->fakeVehicleData();

        $this->json('PUT', '/api/v1/vehicles/'.$vehicle->id, $editedVehicle);

        $this->assertApiResponse($editedVehicle);
    }

    /**
     * @test
     */
    public function testDeleteVehicle()
    {
        $vehicle = $this->makeVehicle();
        $this->json('DELETE', '/api/v1/vehicles/'.$vehicle->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/vehicles/'.$vehicle->id);

        $this->assertResponseStatus(404);
    }
}
