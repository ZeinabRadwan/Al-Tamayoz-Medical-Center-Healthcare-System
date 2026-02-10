<?php

namespace App\Exports;

use App\Models\Patients;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $search;

    public function __construct($search = null)
    {
        $this->search = $search;
    }

    public function collection()
    {
        $patients = Patients::query();

        if ($this->search) {
            $patients->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('id_number', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('blood_type', 'like', '%' . $this->search . '%')
                ->orWhere('nationality', 'like', '%' . $this->search . '%');
        }

        return $patients->get();
    }

    public function headings(): array
    {
        return [
            'الاسم',
            'رقم الهوية',
            'تاريخ الميلاد',
            'العمر',
            'وحدة العمر',
            'العنوان',
            'الأعراض',
            'فصيلة الدم',
            'الجنسية',
            'رقم الهاتف',
            'البريد الإلكتروني',
            'لديه تأمين',
            'الجنس',
            'كيف عرفت عنا',
            'الأمراض',
            'تاريخ الإنشاء',
        ];
    }

    public function map($patient): array
    {
        return [
            $patient->name,
            $patient->id_number,
            $patient->dob,
            $patient->age,
            $patient->age_unit,
            $patient->address,
            $patient->symptoms,
            $patient->blood_type,
            $patient->nationality,
            $patient->phone,
            $patient->email,
            $patient->has_insurance === 'yes' ? 'نعم' : 'لا',
            $patient->gender,
            $patient->how_did_you_find_out_about_us,
            is_array($patient->diseases) ? implode(', ', $patient->diseases) : $patient->diseases,
            $patient->created_at->format('Y-m-d H:i:s'),
        ];
    }
}

