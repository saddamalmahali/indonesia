<?php

namespace Almahali\Indonesia\Models\Extended;

use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSort;

class Kecamatan extends \Almahali\Indonesia\Models\Kecamatan
{
    use AutoFilter;
    use AutoSort;

    protected $table = 'districts';
}
