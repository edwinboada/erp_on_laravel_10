<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductServiceImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
    }
}

/*namespace App\Imports;

use App\Models\ProductService;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductServiceImport implements ToModel
{
    *
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    
    public function model(array $row)
    {
        return new ProductService([
            //
        ]);
    }
}*/
