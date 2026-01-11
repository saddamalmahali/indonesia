<?php

namespace Almahali\Indonesia\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Almahali\Indonesia\Models\Kabupaten;
use Almahali\Indonesia\Models\Kecamatan;
use Almahali\Indonesia\Models\Kelurahan;
use Almahali\Indonesia\Models\Provinsi;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->reset();

        $this->call(ProvincesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(VillagesSeeder::class);
    }

    public function reset()
    {
        Schema::disableForeignKeyConstraints();

        Kelurahan::truncate();
        Kecamatan::truncate();
        Kabupaten::truncate();
        Provinsi::truncate();

        Schema::disableForeignKeyConstraints();
    }
}
