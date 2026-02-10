<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZacatForm extends Model
{
    use HasFactory;
    protected $table = 'zacat_form';
    protected $fillable = [
         'tax_number', 'address', 'email',
        'organization_name', 'unit_name',
        'commercial_num', 'build_num', 'additional_num',
        'subdivision', 'zip', 'city_name'
    ];

    protected $casts = [
        'pdf_files' => 'array',
    ];
}
