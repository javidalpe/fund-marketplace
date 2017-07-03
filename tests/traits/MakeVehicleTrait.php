<?php

use Faker\Factory as Faker;
use App\Models\Vehicle;
use App\Repositories\VehicleRepository;

trait MakeVehicleTrait
{
    /**
     * Create fake instance of Vehicle and save it in database
     *
     * @param array $vehicleFields
     * @return Vehicle
     */
    public function makeVehicle($vehicleFields = [])
    {
        /** @var VehicleRepository $vehicleRepo */
        $vehicleRepo = App::make(VehicleRepository::class);
        $theme = $this->fakeVehicleData($vehicleFields);
        return $vehicleRepo->create($theme);
    }

    /**
     * Get fake instance of Vehicle
     *
     * @param array $vehicleFields
     * @return Vehicle
     */
    public function fakeVehicle($vehicleFields = [])
    {
        return new Vehicle($this->fakeVehicleData($vehicleFields));
    }

    /**
     * Get fake data of Vehicle
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVehicleData($vehicleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'website' => $fake->word,
            'stock_value' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $vehicleFields);
    }
}
