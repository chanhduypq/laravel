<?php 

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Student;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name'     => $row['name'],//$row['name'], header trong file Excel phải là Name
            'classes_id'    => $row['classes_id'],//$row['classes_id'], header trong file Excel phải là Classes_id
        ]);
    }
    
    public function headingRow(): int {
        return 1;//return 1, số 1 có nghĩa là header ở dòng 1, còn nếu header ở dòng 2 thì sẽ là return 2
    }

}