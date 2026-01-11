<?php

namespace Almahali\Indonesia\Models\Extended;

use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSort;

class Provinsi extends \Almahali\Indonesia\Models\Provinsi
{
    use AutoFilter;
    use AutoSort;

    protected $table = 'provinces';
}
