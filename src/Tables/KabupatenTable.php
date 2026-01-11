<?php

namespace Almahali\Indonesia\Tables;

use Almahali\Suitable\Columns\Numbering;

class KabupatenTable extends \Almahali\Suitable\TableView
{
    protected function columns()
    {
        return [
            Numbering::make('No'),
            \Laravolt\Suitable\Columns\Id::make('id', 'Kode')->sortable(),
            \Laravolt\Suitable\Columns\Text::make('name', 'Kota/Kabupaten')->sortable(),
            \Laravolt\Suitable\Columns\Text::make('provinsi.name', 'Provinsi')->sortable('provinsi.name'),
            \Laravolt\Suitable\Columns\RestfulButton::make('indonesia::kabupaten', __('Action'))->except('view'),
        ];
    }
}
