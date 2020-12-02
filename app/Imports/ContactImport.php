<?php

namespace App\Imports;

use App\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 
	

        return new Contact([
            'first_name'     => $row['fname'],
            'last_name'    => $row['lname'], 
            'phone' => $row['phone'],
			'email' => $row['email'],
			'details' => $row['detail'],
			'category' => $row['category'],
			//'lists' => $row['list'],
			'note' => $row['note'],
        ]);
    }
}
