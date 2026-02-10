<?php

use App\Http\Controllers\AdultsPhysiotherapyAssessmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChecklistForDysarthriaEvaluationController;
use App\Http\Controllers\ZatcaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatientsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DldSheetReportController;
use App\Http\Controllers\FeeScoreReportController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PrivilegeController;
use App\Http\Controllers\ProtocolVoiceEvaluationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CaseNumberController;
use App\Http\Controllers\DysfluencySheetController;
use App\Http\Controllers\DysphagiaAssessmentController;
use App\Http\Controllers\EverydayLivingTasksController;
use App\Http\Controllers\OccupationalTherapyController;
use App\Http\Controllers\ProtocolOfNasalityEvaluationController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PhysiotherapyAssessmentController;
use App\Http\Controllers\TreatmentPlanOfCareController;
use App\Http\Controllers\FollowUpReportController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PermissionMiddleware;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZacatFormController;

require __DIR__ . '/auth.php';


Route::get('/', [BlogController::class, 'showAll'])->name('home');
Route::get('/contact-us', [MessageController::class, 'showContactForm'])->name('contact');
Route::post('/contact-us', [MessageController::class, 'submitMessage'])->name('contact.submit');
Route::get('/aboutUs', [BlogController::class, 'showAboutUs'])->name('blogs.aboutUs');
Route::middleware([PermissionMiddleware::class . ':عرض لوحة التحكم'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});
Route::get('/zacat-form', [ZacatFormController::class, 'create'])->name('zacat-form.create');
Route::post('/zacat-form', [ZacatFormController::class, 'store']);
Route::get('/zacat-form/list', [ZacatFormController::class, 'list'])->name('zacat-form.list');

Route::get('/billing/create', [BillingController::class, 'create'])->name('billing.create');
Route::post('/billing', [BillingController::class, 'store'])->name('billing.store');
Route::get('/billing', [BillingController::class, 'index'])->name('billing.index');
Route::get('/billing/{id}', [BillingController::class, 'show'])->name('billing.view');
Route::get('billing/{id}/edit', [BillingController::class, 'edit'])->name('billing.edit');
Route::put('billing/{id}', [BillingController::class, 'update'])->name('billing.update');
Route::post('/billings/{id}/return', [BillingController::class, 'markAsReturned'])->name('billing.return');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/clinic/{clinic}/staff', [ClinicController::class, 'showStaff'])->name('clinics.showstaff');

Route::get('doctors/{doctor}/appointments', [AppointmentController::class, 'doctorAppointments'])->name('doctor.appointments');
Route::get('doctors/{doctor}/appointments/today', [AppointmentController::class, 'doctorAppointmentsToday'])->name('doctor.appointments.today');
Route::get('doctors/{doctor}/appointments/patients', [AppointmentController::class, 'patientAppointments'])->name('clinics.patient');
Route::patch('/appointments/{appointment}/visit', [AppointmentController::class, 'updateVisit'])->name('appointments.updateVisit');


Route::get('patients/create', [PatientsController::class, 'create'])->name('patients.create');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');

Route::get('appointments/getClinics', [AppointmentController::class, 'getClinics']);
Route::get('appointments/getAvailableAppointments', [AppointmentController::class, 'getAvailableAppointments']);
Route::get('appointments/create/{patient_id}', [AppointmentController::class, 'create'])->name('appointments.create');
Route::get('appointments/create-for-client', [AppointmentController::class, 'createForClient'])->name('appointments.createForClient');
Route::get('appointments/from-dashboard', [AppointmentController::class, 'createFromDashboard'])->name('appointments.createFromDashboard');
Route::post('appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('appointments/checkPatient', [AppointmentController::class, 'checkPatient']);
Route::get('/success', function () {
    return view('success');
})->name('success');


Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/vacations', [VacationController::class, 'adminIndex'])->name('vacations.admin');
    Route::post('/admin/vacations/{vacation}', [VacationController::class, 'updateStatus'])->name('vacations.updateStatus');


    Route::patch('/users/{id}/role', [UserController::class, 'updateRole'])->name('users.updateRole');

    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);

    Route::patch('/users/{id}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
});

Route::get('/dynamic-search', [SearchController::class, 'search'])->name('dynamic.search');

//admin


Route::middleware(['auth'])->group(function () {
    Route::get('/vacations', [VacationController::class, 'index'])->name('vacations.index');
    Route::get('/vacations/create', [VacationController::class, 'create'])->name('vacations.create');
    Route::post('/vacations', [VacationController::class, 'store'])->name('vacations.store');
});

Route::middleware(['auth', PermissionMiddleware::class . ':إدارة الخدمات'])->group(function () {
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
});

Route::middleware(['auth', PermissionMiddleware::class . ':عرض قائمة الموظفين'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
});

Route::middleware(['auth', PermissionMiddleware::class . ':إضافة موظف'])->group(function () {
    Route::post('users', [UserController::class, 'store'])->name('users.store');
});

Route::middleware(['auth', PermissionMiddleware::class . ':تعديل موطف'])->group(function () {
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

    Route::get('patients', [PatientsController::class, 'index'])->name('patients.index');
    Route::get('patients/export', [PatientsController::class, 'export'])->name('patients.export');
    Route::get('patients/{patient}', [PatientsController::class, 'show'])->name('patients.show');
    Route::post('patients/{patient}/diseases', [PatientsController::class, 'storeDisease'])->name('patient.disease.store');

Route::middleware(['auth', PermissionMiddleware::class . ':إضافة مريض'])->group(function () {
    Route::post('patients', [PatientsController::class, 'store'])->name('patients.store');
});

Route::middleware(['auth', PermissionMiddleware::class . ':تعديل مريض'])->group(function () {
    Route::get('patients/{patient}/edit', [PatientsController::class, 'edit'])->name('patients.edit');
    Route::put('patients/{patient}', [PatientsController::class, 'update'])->name('patients.update');
});

Route::middleware(['auth', PermissionMiddleware::class . ':حذف مريض'])->group(function () {
    Route::delete('patients/{patient}', [PatientsController::class, 'destroy'])->name('patients.destroy');
});


Route::middleware(['auth', PermissionMiddleware::class . ':إدارة الصلاحيات'])->group(function () {
    Route::get('/manage-privileges', [PrivilegeController::class, 'index'])->name('manage.privileges.index');
    Route::get('/manage-privileges/{user}', [PrivilegeController::class, 'show'])->name('manage.privileges');
    Route::post('/manage-privileges/{user}', [PrivilegeController::class, 'updatePrivileges'])->name('update.privileges');
});


Route::middleware(['auth', PermissionMiddleware::class . ':إدارة المواعيد'])->group(function () {
    Route::get('appointments/booked', [AppointmentController::class, 'bookedAppointments'])->name('appointments.booked');
    Route::put('/appointments/{id}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
    Route::get('appointments', [ClinicController::class, 'appointmentsIndex'])->name('appointments.index');
});


Route::middleware(['auth', PermissionMiddleware::class . ':إضافة عيادة'])->group(function () {
    Route::resource('clinics', ClinicController::class);
    Route::post('clinics/{clinic}/generate-appointments', [ClinicController::class, 'generateAppointments'])->name('clinics.generateAppointments');
});


Route::middleware(['auth', PermissionMiddleware::class . ':إدارة الاقسام'])->group(function () {
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::get('departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
});

Route::middleware(['auth', PermissionMiddleware::class . ':التحكم بالموقع'])->group(function () {
    Route::get('/admin/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/admin/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/admin/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/admin/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/admin/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    Route::get('/admin/main-image', [BlogController::class, 'showMainImage'])->name('setting.main_img');
    Route::get('/admin/gallary', [BlogController::class, 'showGalleryImages'])->name('setting.gallary');
    Route::delete('/settings/gallery/{index}', [SettingsController::class, 'deleteGalleryImage'])
        ->name('settings.gallery_images.delete');
    Route::get('/admin/about-us', [BlogController::class, 'index'])->name('setting.about_us');
    Route::post('/settings/main-image', [SettingsController::class, 'updateMainImage'])->name('settings.main_image.update');
    Route::post('/settings/gallery-images', [SettingsController::class, 'addGalleryImage'])->name('settings.gallery_images.add');
    Route::post('/settings/about-us', [SettingsController::class, 'updateAboutUs'])->name('settings.about_us.update');
    Route::post('/settings/update', [SettingsController::class, 'update'])
        ->name('settings.update');
});


Route::middleware(['auth', PermissionMiddleware::class . ':رسائل التواصل'])->group(function () {
    Route::get('/contacts', [MessageController::class, 'showMessages'])->name('contacts.index');
    Route::get('/messages/{id}', [MessageController::class, 'show'])->name('message.show');
    Route::post('/messages/{id}/toggle-read', [MessageController::class, 'toggleReadStatus'])->name('messages.toggle-read');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
});


Route::middleware(['auth', PermissionMiddleware::class . ':عرض التقارير'])->group(function () {
    // reports
    Route::get('/reports/create/{patient_id}', [ReportController::class, 'create'])->name('reports.create');
    Route::get('/reports/{patient_id}', [ReportController::class, 'show'])->name('reports.show');
    Route::post('/reports/store', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/reports/{id}/edit', [ReportController::class, 'edit'])->name('reports.edit');
    Route::put('/reports/{id}', [ReportController::class, 'update'])->name('reports.update');
    Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');

    // fee_score_reports
    Route::get('/fee_score_reports/{id}/edit', [FeeScoreReportController::class, 'edit'])->name('fee_score_reports.edit');
    Route::put('/fee_score_reports/{id}', [FeeScoreReportController::class, 'update'])->name('fee_score_reports.update');
    Route::delete('/fee_score_reports/{id}', [FeeScoreReportController::class, 'destroy'])->name('fee_score_reports.destroy');
    Route::get('/fee-score-reports/create/{patient_id}/{template_id}', [FeeScoreReportController::class, 'create'])->name('fee_score_reports.create');
    Route::post('/fee_score_reports', [FeeScoreReportController::class, 'store'])->name('fee_score_reports.store');
    Route::get('/fee_score_reports/{patient_id}', [FeeScoreReportController::class, 'show'])->name('fee_score_reports.show');

    // dld_sheet_reports
    Route::get('/dld_sheet_reports/{id}/edit', [DldSheetReportController::class, 'edit'])->name('dld_sheet_reports.edit');
    Route::put('/dld_sheet_reports/{id}', [DldSheetReportController::class, 'update'])->name('dld_sheet_reports.update');
    Route::delete('/dld_sheet_reports/{id}', [DldSheetReportController::class, 'destroy'])->name('dld_sheet_reports.destroy');
    Route::get('/dld_sheet_reports/create/{patient_id}/{template_id}', [DldSheetReportController::class, 'create'])->name('dld_sheet_reports.create');
    Route::post('/dld_sheet_reports', [DldSheetReportController::class, 'store'])->name('dld_sheet_reports.store');
    Route::get('/dld_sheet_reports/{patient_id}', [DldSheetReportController::class, 'show'])->name('dld_sheet_reports.show');

    // protocol_voice_evaluations
    Route::get('/protocol_voice_evaluations/{id}/edit', [ProtocolVoiceEvaluationController::class, 'edit'])->name('protocol_for_voice_evaluation.edit');
    Route::put('/protocol_voice_evaluations/{id}', [ProtocolVoiceEvaluationController::class, 'update'])->name('protocol_for_voice_evaluation.update');
    Route::delete('/protocol_voice_evaluations/{id}', [ProtocolVoiceEvaluationController::class, 'destroy'])->name('protocol_for_voice_evaluation.destroy');
    Route::get('/protocol_voice_evaluations/create/{patient_id}/{template_id}', [ProtocolVoiceEvaluationController::class, 'create'])->name('protocol_for_voice_evaluation.create');
    Route::post('/protocol_voice_evaluations', [ProtocolVoiceEvaluationController::class, 'store'])->name('protocol_for_voice_evaluation.store');
    Route::get('/protocol_voice_evaluations/{patient_id}', [ProtocolVoiceEvaluationController::class, 'show'])->name('protocol_for_voice_evaluation.show');

    // checklist_for_dysarthria_evaluation
    Route::get('/checklist_for_dysarthria_evaluations/{id}/edit', [ChecklistForDysarthriaEvaluationController::class, 'edit'])->name('checklist_for_dysarthria_evaluation.edit');
    Route::put('/checklist_for_dysarthria_evaluations/{id}', [ChecklistForDysarthriaEvaluationController::class, 'update'])->name('checklist_for_dysarthria_evaluation.update');
    Route::delete('/checklist_for_dysarthria_evaluations/{id}', [ChecklistForDysarthriaEvaluationController::class, 'destroy'])->name('checklist_for_dysarthria_evaluation.destroy');
    Route::get('/checklist_for_dysarthria_evaluations/create/{patient_id}/{template_id}', [ChecklistForDysarthriaEvaluationController::class, 'create'])->name('checklist_for_dysarthria_evaluation.create');
    Route::post('/checklist_for_dysarthria_evaluations', [ChecklistForDysarthriaEvaluationController::class, 'store'])->name('checklist_for_dysarthria_evaluation.store');
    Route::get('/checklist_for_dysarthria_evaluations/{patient_id}', [ChecklistForDysarthriaEvaluationController::class, 'show'])->name('checklist_for_dysarthria_evaluation.show');

    // dysfluency_sheet
    Route::get('/dysfluency_sheet/{id}/edit', [DysfluencySheetController::class, 'edit'])->name('dysfluency_sheet.edit');
    Route::put('/dysfluency_sheet/{id}', [DysfluencySheetController::class, 'update'])->name('dysfluency_sheet.update');
    Route::delete('/dysfluency_sheet/{id}', [DysfluencySheetController::class, 'destroy'])->name('dysfluency_sheet.destroy');
    Route::get('/dysfluency_sheet/create/{patient_id}/{template_id}', [DysfluencySheetController::class, 'create'])->name('dysfluency_sheet.create');
    Route::post('/dysfluency_sheet', [DysfluencySheetController::class, 'store'])->name('dysfluency_sheet.store');
    Route::get('/dysfluency_sheet/{patient_id}', [DysfluencySheetController::class, 'show'])->name('dysfluency_sheet.show');

    // case_number
    Route::get('/case_number/{id}/edit', [CaseNumberController::class, 'edit'])->name('case_number.edit');
    Route::put('/case_number/{id}', [CaseNumberController::class, 'update'])->name('case_number.update');
    Route::delete('/case_number/{id}', [CaseNumberController::class, 'destroy'])->name('case_number.destroy');
    Route::get('/case_number/create/{patient_id}/{template_id}', [CaseNumberController::class, 'create'])->name('case_number.create');
    Route::post('/case_number', [CaseNumberController::class, 'store'])->name('case_number.store');
    Route::get('/case_number/{patient_id}', [CaseNumberController::class, 'show'])->name('case_number.show');


    // dysphagia_assessment
    Route::get('/dysphagia_assessment/{id}/edit', [DysphagiaAssessmentController::class, 'edit'])->name('dysphagia_assessment.edit');
    Route::put('/dysphagia_assessment/{id}', [DysphagiaAssessmentController::class, 'update'])->name('dysphagia_assessment.update');
    Route::delete('/dysphagia_assessment/{id}', [DysphagiaAssessmentController::class, 'destroy'])->name('dysphagia_assessment.destroy');
    Route::get('/dysphagia_assessment/create/{patient_id}/{template_id}', [DysphagiaAssessmentController::class, 'create'])->name('dysphagia_assessment.create');
    Route::post('/dysphagia_assessment', [DysphagiaAssessmentController::class, 'store'])->name('dysphagia_assessment.store');
    Route::get('/dysphagia_assessment/{patient_id}', [DysphagiaAssessmentController::class, 'show'])->name('dysphagia_assessment.show');

    // protocol_of_nasality_evaluation
    Route::get('/protocol_of_nasality_evaluation/{id}/edit', [ProtocolOfNasalityEvaluationController::class, 'edit'])->name('protocol_of_nasality_evaluation.edit');
    Route::put('/protocol_of_nasality_evaluation/{id}', [ProtocolOfNasalityEvaluationController::class, 'update'])->name('protocol_of_nasality_evaluation.update');
    Route::delete('/protocol_of_nasality_evaluation/{id}', [ProtocolOfNasalityEvaluationController::class, 'destroy'])->name('protocol_of_nasality_evaluation.destroy');
    Route::get('/protocol_of_nasality_evaluation/create/{patient_id}/{template_id}', [ProtocolOfNasalityEvaluationController::class, 'create'])->name('protocol_of_nasality_evaluation.create');
    Route::post('/protocol_of_nasality_evaluation', [ProtocolOfNasalityEvaluationController::class, 'store'])->name('protocol_of_nasality_evaluation.store');
    Route::get('/protocol_of_nasality_evaluation/{patient_id}', [ProtocolOfNasalityEvaluationController::class, 'show'])->name('protocol_of_nasality_evaluation.show');

    // everyday_living_tasks
    Route::get('/everyday_living_tasks/{id}/edit', [EverydayLivingTasksController::class, 'edit'])->name('everyday_living_tasks.edit');
    Route::put('/everyday_living_tasks/{id}', [EverydayLivingTasksController::class, 'update'])->name('everyday_living_tasks.update');
    Route::delete('/everyday_living_tasks/{id}', [EverydayLivingTasksController::class, 'destroy'])->name('everyday_living_tasks.destroy');
    Route::get('/everyday_living_tasks/create/{patient_id}/{template_id}', [EverydayLivingTasksController::class, 'create'])->name('everyday_living_tasks.create');
    Route::post('/everyday_living_tasks', [EverydayLivingTasksController::class, 'store'])->name('everyday_living_tasks.store');
    Route::get('/everyday_living_tasks/{patient_id}', [EverydayLivingTasksController::class, 'show'])->name('everyday_living_tasks.show');

    // occupational_therapy_report
    Route::get('/occupational_therapy_report/{id}/edit', [OccupationalTherapyController::class, 'edit'])->name('occupational_therapy_report.edit');
    Route::put('/occupational_therapy_report/{id}', [OccupationalTherapyController::class, 'update'])->name('occupational_therapy_report.update');
    Route::delete('/occupational_therapy_report/{id}', [OccupationalTherapyController::class, 'destroy'])->name('occupational_therapy_report.destroy');
    Route::get('/occupational_therapy_report/create/{patient_id}/{template_id}', [OccupationalTherapyController::class, 'create'])->name('occupational_therapy_report.create');
    Route::post('/occupational_therapy_report', [OccupationalTherapyController::class, 'store'])->name('occupational_therapy_report.store');
    Route::get('/occupational_therapy_report/{patient_id}', [OccupationalTherapyController::class, 'show'])->name('occupational_therapy_report.show');

    // adults_physiotherapy_assessment
    Route::get('/adults_physiotherapy_assessment/{id}/edit', [AdultsPhysiotherapyAssessmentController::class, 'edit'])->name('adults_physiotherapy_assessment.edit');
    Route::put('/adults_physiotherapy_assessment/{id}', [AdultsPhysiotherapyAssessmentController::class, 'update'])->name('adults_physiotherapy_assessment.update');
    Route::delete('/adults_physiotherapy_assessment/{id}', [AdultsPhysiotherapyAssessmentController::class, 'destroy'])->name('adults_physiotherapy_assessment.destroy');
    Route::get('/adults_physiotherapy_assessment/create/{patient_id}/{template_id}', [AdultsPhysiotherapyAssessmentController::class, 'create'])->name('adults_physiotherapy_assessment.create');
    Route::post('/adults_physiotherapy_assessment', [AdultsPhysiotherapyAssessmentController::class, 'store'])->name('adults_physiotherapy_assessment.store');
    Route::get('/adults_physiotherapy_assessment/{patient_id}', [AdultsPhysiotherapyAssessmentController::class, 'show'])->name('adults_physiotherapy_assessment.show');

    //physiotherapy_assessment
    Route::get('/physiotherapy_assessment/{id}/edit', [PhysiotherapyAssessmentController::class, 'edit'])->name('physiotherapy_assessment.edit');
    Route::put('/physiotherapy_assessment/{id}', [PhysiotherapyAssessmentController::class, 'update'])->name('physiotherapy_assessment.update');
    Route::delete('/physiotherapy_assessment/{id}', [PhysiotherapyAssessmentController::class, 'destroy'])->name('physiotherapy_assessment.destroy');
    Route::get('/physiotherapy_assessment/create/{patient_id}/{template_id}', [PhysiotherapyAssessmentController::class, 'create'])->name('physiotherapy_assessment.create');
    Route::post('/physiotherapy_assessment', [PhysiotherapyAssessmentController::class, 'store'])->name('physiotherapy_assessment.store');
    Route::get('/physiotherapy_assessment/{patient_id}', [PhysiotherapyAssessmentController::class, 'show'])->name('physiotherapy_assessment.show');

    // treatment_plan_of_care
    Route::get('/treatment_plan_of_care/{id}/edit', [TreatmentPlanOfCareController::class, 'edit'])->name('treatment_plan_of_care.edit');
    Route::put('/treatment_plan_of_care/{id}', [TreatmentPlanOfCareController::class, 'update'])->name('treatment_plan_of_care.update');
    Route::delete('/treatment_plan_of_care/{id}', [TreatmentPlanOfCareController::class, 'destroy'])->name('treatment_plan_of_care.destroy');
    Route::get('/treatment_plan_of_care/create/{patient_id}/{template_id}', [TreatmentPlanOfCareController::class, 'create'])->name('treatment_plan_of_care.create');
    Route::post('/treatment_plan_of_care', [TreatmentPlanOfCareController::class, 'store'])->name('treatment_plan_of_care.store');
    Route::get('/treatment_plan_of_care/{patient_id}', [TreatmentPlanOfCareController::class, 'show'])->name('treatment_plan_of_care.show');


});
//follow-up
Route::get('/create', [FollowUpReportController::class, 'create'])->name('follow-up.create');
Route::post('/patients/{patient}/follow-up-reports', [FollowUpReportController::class, 'store'])->name('follow-up.store');
Route::get('/{report}', [FollowUpReportController::class, 'show'])->name('follow-up.show');
Route::get('/{report}/edit', [FollowUpReportController::class, 'edit'])->name('follow-up.edit');
Route::put('/{report}', [FollowUpReportController::class, 'update'])->name('follow-up.update');
Route::delete('patients/{patient}/follow-up/{report}', [FollowUpReportController::class, 'destroy'])->name('follow-up.destroy');

Route::group(['prefix' => 'zatca'], function () {
    Route::get('reporting-invoice', [ZatcaController::class, 'reportingInvoice']);
    Route::post('get-csr', [ZatcaController::class, 'getCsr']);
    Route::post('get-cert', [ZatcaController::class, 'getCertificate']);
    Route::post('compliance-invoice', [ZatcaController::class, 'complianceInvoice']);
});


Route::get('/blogs', [BlogController::class, 'showAll'])->name('blogs.showAll');
Route::get('/blogs/{id}', [BlogController::class, 'showBlog'])->name('blogs.showBlog');

Route::get('/gallery', [BlogController::class, 'showGallery'])->name('blogs.showGallery');
