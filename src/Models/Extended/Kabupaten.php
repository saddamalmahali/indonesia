<?php

namespace Almahali\Indonesia\Models\Extended;

use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSort;

class Kabupaten extends \Almahali\Indonesia\Models\Kabupaten
{
    use AutoFilter;
    use AutoSort;

    protected $table = 'cities';
}
