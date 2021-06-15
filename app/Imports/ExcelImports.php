<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Session;
class ExcelImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $id_baitest = Session::get('id_baitest');
        return new Question([
            'cauhoi'=>$row[0],
            'luachona'=>$row[1],
            'luachonb'=>$row[2],
            'luachonc'=>$row[3],
            'luachond'=>$row[4],
            'dapan'=>$row[5],
            'id_baitest'=>$id_baitest
        ]);
    }
}
