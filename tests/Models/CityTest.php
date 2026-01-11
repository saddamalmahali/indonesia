<?php

namespace Almahali\Indonesia\Test\Models;

use Illuminate\Database\Eloquent\Collection;
use Almahali\Indonesia\Models\City;
use Almahali\Indonesia\Models\District;
use Almahali\Indonesia\Models\Province;
use Almahali\Indonesia\Models\Village;
use Almahali\Indonesia\Test\TestCase;

class CityTest extends TestCase
{
    /** @test */
    public function a_city_has_belongs_to_province_relation()
    {
        $this->seed('Almahali\Indonesia\Seeds\ProvincesSeeder');
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');

        $city = City::first();

        $this->assertInstanceOf(Province::class, $city->province);
        $this->assertEquals($city->province_code, $city->province->code);
    }

    /** @test */
    public function a_city_has_many_districts_relation()
    {
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');

        $city = City::first();

        $this->assertInstanceOf(Collection::class, $city->districts);
        $this->assertInstanceOf(District::class, $city->districts->first());
    }

    /** @test */
    public function a_city_has_many_villages_relation()
    {
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');
        $this->seed('Almahali\Indonesia\Seeds\DistrictsSeeder');
        $this->seed('Almahali\Indonesia\Seeds\VillagesSeeder');

        $city = City::first();

        $this->assertInstanceOf(Collection::class, $city->villages);
        $this->assertInstanceOf(Village::class, $city->villages->first());
    }

    /** @test */
    public function a_city_has_name_attribute()
    {
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');

        $city = City::first();

        $this->assertEquals('KABUPATEN ACEH SELATAN', $city->name);
    }

    /** @test */
    public function a_city_has_province_name_attribute()
    {
        $this->seed('Almahali\Indonesia\Seeds\ProvincesSeeder');
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');

        $city = City::first();

        $this->assertEquals('ACEH', $city->province_name);
    }

    /** @test */
    public function a_city_has_logo_path_attribute()
    {
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');

        $city = City::first();

        $this->assertNull($city->logo_path);
    }

    /** @test */
    public function a_city_can_store_meta_column()
    {
        $this->seed('Almahali\Indonesia\Seeds\CitiesSeeder');

        $city = City::first();
        $city->meta = ['luas_wilayah' => 200.2];
        $city->save();

        $this->assertEquals(['luas_wilayah' => 200.2], $city->meta);
    }
}
