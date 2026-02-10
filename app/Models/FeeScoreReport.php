<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeScoreReport extends Model
{
    protected $fillable = [
        'patient_id',
        'velopharyngeal_closure_complete',
        'velopharyngeal_closure_incomplete',
        'anatomy_normal',
        'anatomy_text',
        'anatomy_pathology',
        'anatomy_pathology_text',
        'secretions_no_excess',
        'secretions_pooled_valleculae',
        'secretions_pooled_laryngeal_vestibule',
        'secretions_aspirated',
        'secretions_patient_ejects',
        'secretions_no_response',
        'respiratory_rate',
        'laryngeal_movements_normal',
        'laryngeal_movements_labored',
        'pas_score_3_ml',
        'pas_score_5_ml',
        'pas_score_10_ml',
        'thick_pas_score_3_ml',
        'thick_pas_score_5_ml',
        'thick_pas_score_10_ml',
        'semi_pas_score_3_ml',
        'semi_pas_score_5_ml',
        'semi_pas_score_10_ml',
        'solid_pas_score_3_ml',
        'solid_pas_score_5_ml',
        'solid_pas_score_10_ml',

    ];

    protected $table = 'fee_score_reports';



    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
