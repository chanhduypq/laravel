<?php 

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Student;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name'     => $row[0],
            'classes_id'    => $row[1],
        ]);
    }
}