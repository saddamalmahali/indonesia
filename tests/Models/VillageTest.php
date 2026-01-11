<?php

namespace Almahali\Indonesia\Test\Models;

use Almahali\Indonesia\Models\District;
use Almahali\Indonesia\Models\Village;
use Almahali\Indonesia\Test\TestCase;

class VillageTest extends TestCase
{
    /** @test */
    public function a_village_has_belongs_to_distict_relation()
    {
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');
        $this->seed('Almahali\Indonesia\Seeds\VillagesSeeder');

        $village = Village::first();

        $this->assertInstanceOf(District::class, $village->district);
        $this->assertEquals($village->district_code, $village->district->code);
    }

    /** @test */
    public function a_village_has_name_attribute()
    {
        $this->seed('Almahali\Indonesia\Seeds\VillagesSeeder');

        $village = Village::first();

        $this->assertEquals('KEUDE BAKONGAN', $village->name);
    }

    /** @test */
    public function a_village_has_district_name_attribute()
    {
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');
        $this->seed('Almahali\Indonesia\Seeds\VillagesSeeder');

        $village = Village::first();

        $this->assertEquals('BAKONGAN', $village->district_name);
    }

    /** @test */
    public function a_village_has_city_name_attribute()
    {
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');
        $this->seed('Almahali\Indonesia\Seeds\VillagesSeeder');

        $village = Village::first();

        $this->assertEquals('KABUPATEN ACEH SELATAN', $village->city_name);
    }

    /** @test */
    public function a_village_has_province_name_attribute()
    {
        $this->seed('Almahali\Indonesia\Seeds\ProvincesSeeder');
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');
        $this->seed('Almahali\Indonesia\Seeds\VillagesSeeder');

        $village = Village::first();

        $this->assertEquals('ACEH', $village->province_name);
    }

    /** @test */
    public function a_village_can_store_meta_column()
    {
        $this->seed('Almahali\Indonesia\Seeds\VillagesSeeder');

        $village = Village::first();
        $village->meta = ['luas_wilayah' => 200.2];
        $village->save();

        $this->assertEquals(['luas_wilayah' => 200.2], $village->meta);
    }
}
