<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    Auth::logout();
    return view('auth.login');
});
Route::get('/x', function () {
    return view('students.forms.practicum_training_agreement');
});
Route::get('/home', 'PageController@checker');

Route::get('/access/invalid', 'PageController@access_invalid');

Route::get('/user/account/forget/password', 'PageController@forgot_password_form');
Route::post('/user/account/forget/password', 'PageController@forgot_password_mail');

Auth::routes();

#COORDINATOR ROUTES

Route::get('/coor/student/list', 'CoordinatorController@list')->middleware('auth')->middleware('ca');
Route::get('/coor/student/accomplishments', 'CoordinatorController@accomplishments')->middleware('auth')->middleware('ca');
Route::post('/coor/student/accomplishments/grade', 'CoordinatorController@accomplishment_grade')->name('accomplishment_grade');
Route::get('/coor/student/upload', 'CoordinatorController@uploading_form')->middleware('auth')->middleware('ca');
Route::post('/coor/student/upload', 'CoordinatorController@upload_preview')->middleware('auth')->middleware('ca');
Route::post('/coor/student/save', 'CoordinatorController@student_save')->middleware('auth')->middleware('ca');
Route::get('/coor/dashboard', 'CoordinatorController@dashboard')->middleware('auth')->middleware('ca');
Route::get('/coor/dashboard/table/{content}', 'CoordinatorController@dashboard_table')->middleware('auth')->middleware('ca');
Route::get('/coor/student/for/requirements', 'CoordinatorController@for_req')->middleware('auth')->middleware('ca');
Route::get('/coor/student/for/completion', 'CoordinatorController@for_com')->middleware('auth')->middleware('ca');
Route::get('/coor/password/reset/student/{id}', 'CoordinatorController@password_reset_stud')->middleware('auth')->middleware('ca');
Route::get('/coor/password/reset/partner/{id}', 'CoordinatorController@password_reset_part')->middleware('auth')->middleware('ca');
Route::get('/coor/password/update', 'CoordinatorController@change_password')->middleware('auth')->middleware('ca');
Route::post('/coor/password/update', 'CoordinatorController@password_save')->middleware('auth')->middleware('ca');
Route::get('/coor/approve/application/{id}', 'CoordinatorController@approve_app')->middleware('auth')->middleware('ca');
Route::get('/coor/student/monitoring/{id}', 'CoordinatorController@students_monitoring')->middleware('auth')->middleware('ca');
Route::get('/coor/profile', 'CoordinatorController@user_profile')->middleware('auth')->middleware('ca');
Route::get('/coor/profile/update/basic/info', 'CoordinatorController@profile_basic')->middleware('auth')->middleware('ca');
Route::post('/coor/profile/update/basic/info', 'CoordinatorController@profile_basic_update')->middleware('auth')->middleware('ca');
Route::get('/coor/profile/update/signatory', 'CoordinatorController@profile_signatory')->middleware('auth')->middleware('ca');
Route::post('/coor/profile/update/signatory', 'CoordinatorController@profile_signatory_update')->middleware('auth')->middleware('ca');

Route::get('/coor/profile/banner', 'CoordinatorController@profile_banner')->middleware('auth')->middleware('ca');
Route::post('/coor/profile/banner', 'CoordinatorController@profile_banner_update')->middleware('auth')->middleware('ca');

Route::get('/coor/accounts', 'CoordinatorController@accounts')->middleware('auth')->middleware('ca');

Route::get('/coor/accounts/new', 'CoordinatorController@account_form')->middleware('auth')->middleware('ca');
Route::post('/coor/accounts/new', 'CoordinatorController@account_save')->middleware('auth')->middleware('ca');

Route::get('/coor/student/update/{id}', 'CoordinatorController@student_profile_form')->middleware('auth')->middleware('ca');
Route::post('/coor/student/update/{id}', 'CoordinatorController@student_profile_update')->middleware('auth')->middleware('ca');



Route::get('/coor/user/account/update/{id}', 'CoordinatorController@account_form_update')->middleware('auth')->middleware('ca');
Route::post('/coor/user/account/update/{id}', 'CoordinatorController@account_update')->middleware('auth')->middleware('ca');
Route::get('/coor/user/account/archive/{role}/{id}', 'CoordinatorController@account_archive')->middleware('auth')->middleware('ca');

Route::get('/coor/student/ojt/completion/{id}', 'CoordinatorController@for_com_approve')->middleware('auth')->middleware('ca');
Route::get('/coor/student/view/evaluation/{id}', 'CoordinatorController@evaluation_view')->middleware('auth')->middleware('ca');
Route::get('/coor/student/view/evaluation_print/{id}', 'CoordinatorController@evaluation_view_print')->middleware('auth')->middleware('ca');

Route::get('/coor/student/view/accomplishment/{id}', 'CoordinatorController@accomplishment_view')->middleware('auth')->middleware('ca');

Route::get('/coor/student/profile/{id}', 'CoordinatorController@student_profile')->middleware('auth')->middleware('ca');



#STUDENT ROUTES

Route::post('/student/register', 'StudentController@student_register');
Route::get('/student/register', 'StudentController@student_login_redirect');
Route::post('/student/register/save', 'StudentController@student_register_save');
Route::get('/students/job/list', 'StudentController@joblist')->middleware('auth')->middleware('sa');
Route::get('/student/job/list', 'StudentController@joblist')->middleware('auth')->middleware('sa');
Route::get('/student/profile', 'StudentController@profile')->middleware('auth')->middleware('sa');
Route::get('/student/profile/update', 'StudentController@profile_form')->middleware('auth')->middleware('sa');
Route::post('/student/profile/update', 'StudentController@profile_update')->middleware('auth')->middleware('sa');
Route::post('/student/job/search', 'StudentController@jobsearch')->middleware('auth')->middleware('sa');
Route::get('/student/profile/basic/info', 'StudentController@basic_info')->middleware('auth')->middleware('sa');
Route::post('/student/profile/basic/info', 'StudentController@basic_info_update')->middleware('auth')->middleware('sa');
Route::get('/student/cancel/job/{stud_id}/{job_id}', 'StudentController@cancel_job')->middleware(['auth', 'sa']);
Route::get('/student/apply/job/{id}', 'StudentController@apply_job')->middleware('auth')->middleware('sa');
Route::get('/student/posts/{post}', 'StudentController@posts')->middleware('auth')->middleware('sa');
Route::get('/student/posts/{post}/view/{id}', 'StudentController@posts')->middleware('auth')->middleware('sa');
Route::get('/student/applications', 'StudentController@applications')->middleware('auth')->middleware('sa');
Route::get('/student/details/job/{id}', 'StudentController@job_details')->middleware('auth')->middleware('sa');
Route::get('/student/for/approval/{id}', 'StudentController@for_approval')->middleware('auth')->middleware('sa');
Route::post('/student/for/approval/{id}', 'StudentController@requirements_upload')->middleware('auth')->middleware('sa');

Route::get('/student/forms/downloadable', 'StudentController@downloadable_forms')->middleware('auth')->middleware('sa');
Route::get('/student/form/moa/{id}/{job_id}/preview', 'StudentController@downloadable_form_moa_preview')->middleware('auth')->middleware('sa');
Route::get('/student/form/moa/{id}/{job_id}', 'StudentController@downloadable_form_moa')->middleware('auth')->middleware('sa');
Route::get('/student/form/letter/acceptance/{id}/{job_id}/preview', 'StudentController@downloadable_form_al_preview')->middleware('auth')->middleware('sa');
Route::get('/student/form/letter/acceptance/{id}/{job_id}', 'StudentController@downloadable_form_al')->middleware('auth')->middleware('sa');

Route::get('/student/form/letter/pta/{id}/{job_id}/preview', 'StudentController@downloadable_form_pta_preview')->middleware('auth')->middleware('sa');
Route::get('/student/form/letter/pta/{id}/{job_id}', 'StudentController@downloadable_form_pta')->middleware('auth')->middleware('sa');
Route::get('/student/form/letter/pc/{id}/{job_id}/preview', 'StudentController@downloadable_form_pc_preview')->middleware('auth')->middleware('sa');
Route::get('/student/form/letter/pc/{id}/{job_id}', 'StudentController@downloadable_form_pc')->middleware('auth')->middleware('sa');
Route::get('/student/form/letter/waiver/{id}/{job_id}/preview', 'StudentController@downloadable_form_waiver_preview')->middleware('auth')->middleware('sa');
Route::get('/student/form/letter/waiver/{id}/{job_id}', 'StudentController@downloadable_form_waiver')->middleware('auth')->middleware('sa');
Route::get('/student/password/update', 'StudentController@change_password')->middleware('auth')->middleware('sa');
Route::post('/student/password/update', 'StudentController@password_save')->middleware('auth')->middleware('sa');

Route::get('/student/dashboard', 'StudentController@dashboard')->middleware('auth')->middleware('sa');
Route::get('/student/requirements', 'StudentController@requirements')->middleware('auth')->middleware('sa');

Route::get('/student/monitoring', 'StudentController@monitoring')->middleware('auth')->middleware('sa');
Route::get('/student/logs/in/out', 'StudentController@monitoring_save')->middleware('auth')->middleware('sa');
Route::get('/student/completion/evaluation/{id}', 'StudentController@downloadable_completion_form_evaluation')->middleware('auth')->middleware('sa');

Route::get('/student/profile/skills', 'StudentController@skills')->middleware('auth')->middleware('sa');
Route::post('/student/profile/skills', 'StudentController@skills_update')->middleware('auth')->middleware('sa');
Route::get('/student/profile/skill/delete/{id}', 'StudentController@skill_delete')->middleware('auth')->middleware('sa');
Route::get('/student/profile/skill/update/{id}', 'StudentController@skill_update')->middleware('auth')->middleware('sa');
Route::post('/student/profile/skill/update/{id}', 'StudentController@skill_update_save')->middleware('auth')->middleware('sa');

Route::get('/student/profile/work/experience', 'StudentController@work_experience')->middleware('auth')->middleware('sa');
Route::post('/student/profile/work/experience', 'StudentController@work_experience_update')->middleware('auth')->middleware('sa');
Route::get('/student/profile/work/experience/delete/{id}', 'StudentController@work_experience_delete')->middleware('auth')->middleware('sa');
Route::get('/student/profile/work/experience/update/{id}', 'StudentController@work_experience_update_form')->middleware('auth')->middleware('sa');
Route::post('/student/profile/work/experience/update/{id}', 'StudentController@work_experience_update_save')->middleware('auth')->middleware('sa');
Route::get('/student/profile/image/form', 'StudentController@profile_image_form')->middleware('auth')->middleware('sa');
Route::post('/student/profile/image/form', 'StudentController@profile_img')->middleware('auth')->middleware('sa');

Route::get('/student/monitoring/new', 'StudentController@monitoring_new')->middleware(['auth', 'sa']);
Route::post('/student/monitoring/new', 'StudentController@monitoring_save')->middleware('auth')->middleware('sa');
Route::get('/student/monitoring/update/{id}', 'StudentController@monitoring_update')->middleware(['auth', 'sa']);
Route::post('/student/monitoring/update/{id}', 'StudentController@monitoring_update_save')->middleware(['auth', 'sa']);

Route::get('/student/accomplishments', 'StudentController@accomplishments')->middleware('auth')->middleware('sa');
Route::get('/student/accomplishment/new', 'StudentController@accomplishment_new')->middleware('auth')->middleware('sa');
Route::post('/student/accomplishment/new', 'StudentController@accomplishment_save')->middleware('auth')->middleware('sa');
Route::get('/student/accomplishment/update/{id}', 'StudentController@accomplishment_update')->middleware('auth')->middleware('sa');
Route::post('/student/accomplishment/update/{id}', 'StudentController@accomplishment_update_save')->middleware('auth')->middleware('sa');

Route::get('/student/completion', 'StudentController@completion')->middleware('auth')->middleware('sa');
Route::get('/student/completion/upload', 'StudentController@completion_form')->middleware('auth')->middleware('sa');
Route::post('/student/completion/upload', 'StudentController@completion_save')->middleware('auth')->middleware('sa');

Route::get('/student/view/evaluation/{id}', 'StudentController@evaluation_view')->middleware('auth')->middleware('sa');
Route::get('/student/downloadable/evaluation/{id}', 'StudentController@evaluation_download')->middleware('auth')->middleware('sa');

Route::post('/student/upload/reflection/', 'StudentController@reflection_upload')->middleware('auth')->middleware('sa')->name('reflection.upload');


#PARTNERS ROUTES

Route::get('/partners/dashboard', 'PartnerController@dashboard')->middleware('auth')->middleware('pa');
Route::get('/partners/dashboard/table/{content}', 'PartnerController@dashboard_table')->middleware('auth')->middleware('pa');
Route::get('/partners/job/new', 'PartnerController@new_job')->middleware('auth')->middleware('pa');
Route::post('/partners/job/new', 'PartnerController@new_job_save')->middleware('auth')->middleware('pa');
Route::get('/partners/job/list', 'PartnerController@jobs')->middleware('auth')->middleware('pa');
Route::get('/partners/job/applicants/{id}', 'PartnerController@applicants')->middleware('auth')->middleware('pa');
Route::get('/partners/job/details/{id}', 'PartnerController@job_details')->middleware('auth')->middleware('pa');
Route::get('/partners/student/profile/{id}/{job_id}', 'PartnerController@applicant_profile')->middleware('auth')->middleware('pa');
Route::get('/partner/recruit/applicant/{id}/{job_id}', 'PartnerController@recruit')->middleware('auth')->middleware('pa');
Route::get('/partners/job/restore/{id}', 'PartnerController@restore')->middleware('auth')->middleware('pa');
Route::get('/partners/job/archive/{id}', 'PartnerController@archive')->middleware('auth')->middleware('pa');
Route::get('/partners/student/restore/{id}', 'PartnerController@restoreStudent')->middleware('auth')->middleware('pa');
Route::get('/partners/student/archive/{id}', 'PartnerController@archiveStudent')->middleware('auth')->middleware('pa');
Route::get('/partners/job/list/archive/', 'PartnerController@archive_list')->middleware('auth')->middleware('pa');
Route::get('/partners/profile/', 'PartnerController@profile')->middleware('auth')->middleware('pa');
Route::get('/partners/trainee/students/', 'PartnerController@students')->middleware('auth');
Route::get('/partners/student/monitoring/{id}', 'PartnerController@students_monitoring')->middleware('auth')->middleware('pa');
Route::get('/partners/job/update/{id}', 'PartnerController@update_form')->middleware('auth')->middleware('pa');
Route::post('/partners/job/update/{id}', 'PartnerController@update_job_save')->middleware('auth')->middleware('pa');
Route::post('/partners/profile', 'PartnerController@user_profile')->middleware('auth')->middleware('pa');
Route::get('/partners/profile/banner', 'PartnerController@profile_banner')->middleware('auth')->middleware('pa');
Route::post('/partners/profile/banner', 'PartnerController@profile_banner_update')->middleware('auth')->middleware('pa');
Route::get('/partners/profile/update/company', 'PartnerController@profile_company')->middleware('auth')->middleware('pa');
Route::post('/partners/profile/update/company', 'PartnerController@profile_company_update')->middleware('auth')->middleware('pa');
Route::get('/partners/profile/update/basic/info', 'PartnerController@profile_basic')->middleware('auth')->middleware('pa');
Route::post('/partners/profile/update/basic/info', 'PartnerController@profile_basic_update')->middleware('auth')->middleware('pa');
Route::get('/partners/student/remarks/{id}', 'PartnerController@monitoring_remarks')->middleware('auth')->middleware('pa');
Route::post('/partners/student/remarks/{id}', 'PartnerController@monitoring_remarks_save')->middleware('auth')->middleware('pa');
Route::get('/partners/password/update', 'PartnerController@change_password')->middleware('auth')->middleware('pa');
Route::post('/partners/password/update', 'PartnerController@password_save')->middleware('auth')->middleware('pa');
Route::get('/partners/student/evaluation/{id}', 'PartnerController@evaluation_form')->middleware('auth')->middleware('pa');
Route::post('/partners/student/evaluation/{id}', 'PartnerController@evaluation_submitted')->middleware('auth')->middleware('pa');
Route::get('/partners/student/view/evaluation/{id}', 'PartnerController@evaluation_view')->middleware('auth')->middleware('pa');

Route::get('/partners/student/weekly/report/{id}', 'PartnerController@student_accomplishments')->middleware('auth')->middleware('pa');
Route::get('/partners/approve/accomplishments/{id}', 'PartnerController@approve_accomplishments')->middleware('auth')->middleware('pa');

Route::post('/partners/trainee/students/{id}', 'PartnerController@certification_upload')->middleware('auth')->middleware('pa')->name('certificate.upload');

Route::get('/partners/student/for/requirements/{id}', 'PartnerController@for_req')->middleware('auth')->middleware('pa');
Route::get('/partners/student/approve/requirements/{id}', 'PartnerController@approve_req')->middleware('auth')->middleware('pa');

Route::put('/job/skill/update/{id}', 'PartnerController@update_skill')->name('update_skill')->middleware('auth')->middleware('pa');
Route::delete('/job/skill/delete/{id}', 'PartnerController@delete_skill')->name('delete_skill')->middleware('auth')->middleware('pa');

#ADMIN ROUTES

Route::get('/admin/academic/year/list', 'SuperAdminController@academic_year')->middleware('auth')->middleware('aa');
Route::get('/admin/academic/year/update', 'SuperAdminController@academic_year_form')->middleware('auth')->middleware('aa');
Route::post('/admin/academic/year/update', 'SuperAdminController@academic_year_save')->middleware('auth')->middleware('aa');
Route::get('/admin/school/list', 'SuperAdminController@school')->middleware('auth')->middleware('aa');
Route::get('/admin/school/form', 'SuperAdminController@school_form')->middleware('auth')->middleware('aa');
Route::post('/admin/school/form', 'SuperAdminController@school_save')->middleware('auth')->middleware('aa');
Route::get('/admin/school/update/{id}', 'SuperAdminController@school_update_form')->middleware('auth')->middleware('aa');
Route::post('/admin/school/update/{id}', 'SuperAdminController@school_update')->middleware('auth')->middleware('aa');
Route::get('/admin/accounts/coordinators', 'SuperAdminController@accounts')->middleware('auth')->middleware('aa');
Route::get('/admin/accounts/coordinators/form', 'SuperAdminController@account_form')->middleware('auth')->middleware('aa');
Route::post('/admin/accounts/coordinators/form', 'SuperAdminController@account_save')->middleware('auth')->middleware('aa')->name('account.save');
Route::get('/admin/password/reset/{id}', 'SuperAdminController@password_reset')->middleware('auth')->middleware('aa');
Route::get('/admin/coordinator/update/{id}', 'SuperAdminController@account_form_update')->middleware('auth')->middleware('aa');
Route::post('/admin/coordinator/update/{id}', 'SuperAdminController@account_update')->middleware('auth')->middleware('aa');
Route::get('/admin/coordinator/archive/{id}', 'SuperAdminController@account_archive')->middleware('auth')->middleware('aa');
Route::get('/admin/school/archive/{id}', 'SuperAdminController@school_archive')->middleware('auth')->middleware('aa');
Route::get('/admin/dashboard', 'SuperAdminController@dashboard')->middleware('auth')->middleware('aa');
Route::get('/admin/profile', 'SuperAdminController@profile')->middleware('auth')->middleware('aa');
Route::get('/admin/profile/update/basic/info', 'SuperAdminController@profile_basic')->middleware('auth')->middleware('aa');
Route::post('/admin/profile/update/basic/info', 'SuperAdminController@profile_basic_update')->middleware('auth')->middleware('aa');

Route::post('/admin/student/add_new_student', 'SuperAdminController@add_new_student')->middleware('auth')->middleware('aa');

Route::get('/admin/profile/banner', 'SuperAdminController@profile_banner')->middleware('auth')->middleware('aa');
Route::post('/admin/profile/banner', 'SuperAdminController@profile_banner_update')->middleware('auth')->middleware('aa');

