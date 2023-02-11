<?php

namespace App\Imports;

use App\Permintaan_produk;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;



class permintaanImport implements ToModel,WithStartRow ,WithValidation
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function rules(): array
    {
       


    return [
        '0' => 'required|unique:permintaan_produk,order_no', 
        '1' => 'required',
        '2' => 'required',
        '3' => 'required',
        '4' => 'required',
        '5' => 'required',
        '6' => 'required'
    ]
;



}

public function customValidationMessages()
{
    return [

        '0.unique' => 'Data doubles.',
        '0.required' => 'kolom 0 wajib diisi dengan tepat.',
        '1.required' => 'kolom 1 wajib diisi dengan tepat.',
        '2.required' => 'kolom 2 wajib diisi dengan tepat.',
        '3.required' => 'kolom 3 wajib diisi dengan tepat.',
        '4.required' => 'kolom 4 wajib diisi dengan tepat.',
        '5.required' => 'kolom 5 wajib diisi dengan tepat.',
        '6.required' => 'kolom 6 wajib diisi dengan tepat.',
    ];
}


public function startRow(): int
    {
        return 2;

}





    /**
     * @param array $row
     *@return \Iluminate\Database\Eloquent\Model|null

    */

  

public function model(array $row)
{
 return new permintaan_produk([

    'order_no' => $row[0],
    'part_no' => $row[1],
    'part_name' => $row[2],
    'qty' => $row[3],
    'uom' => $row[4],
    'customer' => $row[5],
    'date' => $row[6],
    'status' => 'waiting',
   
]);

}
}
