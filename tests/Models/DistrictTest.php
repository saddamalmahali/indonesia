<?php

namespace Almahali\Indonesia\Test\Models;

use Illuminate\Database\Eloquent\Collection;
use Almahali\Indonesia\Models\City;
use Almahali\Indonesia\Models\District;
use Almahali\Indonesia\Models\Village;
use Almahali\Indonesia\Test\TestCase;

class DistrictTest extends TestCase
{
    /** @test */
    public function a_district_has_belongs_to_city_relation()
    {
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');

        $district = District::first();

        $this->assertInstanceOf(City::class, $district->city);
        $this->assertEquals($district->city_code, $district->city->code);
    }

    /** @test */
    public function a_district_has_many_villages_relation()
    {
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');
        $this->seed('Almahali\Indonesia\Seeds\VillagesSeeder');

        $district = District::first();

        $this->assertInstanceOf(Collection::class, $district->villages);
        $this->assertInstanceOf(Village::class, $district->villages->first());
    }

    /** @test */
    public function a_district_has_name_attribute()
    {
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');

        $district = District::first();

        $this->assertEquals('BAKONGAN', $district->name);
    }

    /** @test */
    public function a_district_has_city_name_attribute()
    {
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');

        $district = District::first();

        $this->assertEquals('KABUPATEN ACEH SELATAN', $district->city_name);
    }

    /** @test */
    public function a_district_has_province_name_attribute()
    {
        $this->seed('Almahali\Indonesia\Seeds\ProvincesSeeder');
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');

        $district = District::first();

        $this->assertEquals('ACEH', $district->province_name);
    }

    /** @test */
    public function a_district_can_store_meta_column()
    {
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');

        $district = District::first();
        $district->meta = ['luas_wilayah' => 200.2];
        $district->save();

        $this->assertEquals(['luas_wilayah' => 200.2], $district->meta);
    }
}
