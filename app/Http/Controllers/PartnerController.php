<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcademicYear;
use App\Profile;
use App\Student;
use App\School;
use App\User;
use App\Job;
use App\JobSkill;
use App\JobSpecialization;
use App\Specialization;
use App\StudentApplication;
use App\StudentOjt;
use App\StudentMonitoring;
use App\StudentEvaluation;
use App\StudentAccomplishment;
use App\StudentRequirement;
use Auth;

use Illuminate\Support\Facades\Log;

class PartnerController extends Controller
{
    public function jobs(){
        $jobs = Job::where('user_id',Auth::user()->id)->where('status','Active')->get();
        return view('partner.joblist')
            ->with('jobs',$jobs);
        ;
    }
    public function archive_list(){
        $jobs = Job::where('user_id',Auth::user()->id)->where('status','Archived')->get();
        return view('partner.archive_list')
            ->with('jobs',$jobs);
        ;
    }
    public function new_job(){
        $specializations = Specialization::all();
        return view('partner.form')->with('specializations',$specializations);
    }
    public function new_job_save(Request $request){
        // return dd($request);
        $job = new Job;
        $job->user_id = Auth::user()->id;
        $job->title=$request->title;
        $job->position=$request->postion;
        $job->location=$request->location;
        $job->job_descriptions=urlencode($request->description);
        // $job->salary_s=$request->salary_s;
        // $job->salary_e=$request->salary_e;
        // $job->level=$request->p_level;
        // $job->experience_length=$request->we_length;

        // $job->education_per=$request->education_per;
        // $job->skill_per=$request->skill_per;
        // $job->work_exp_per=$request->work_exp_per;

        $job->status= "Active";
        $job->stat= "0";
        $job->save();

        foreach($request->skills as $skill){
            if($skill != "" || $skill != null){
                $skills_data = new JobSkill;
                $skills_data->job_id = $job->id;
                $skills_data->skill = $skill;
                $skills_data->save();
            }
        }

        foreach($request->specialization as $specialization){
            if($specialization != "" || $specialization != null){
                $specialization_data = new JobSpecialization;
                $specialization_data->job_id = $job->id;
                $specialization_data->specialization_id = $specialization;
                $specialization_data->save();
            }
        }
        return redirect('/partners/job/list')->with('success','New Job Posted');
    }

    public function applicants($id){
        $applicants  = StudentApplication::where('job_id',base64_decode($id))->get();
        $job  = Job::find(base64_decode($id));
        return view('partner.applicants')
             ->with('applicants',$applicants )
             ->with('job',$job );
        ;
    }
    public function applicant_profile($id,$job_id){
        $applicant  = Student::find(base64_decode($id));
        return view('partner.profile')
            ->with('applicant',$applicant )
            ->with('job_id',$job_id );
        ;
    }
    public function for_req(){
        $students = StudentApplication::where('status', '!=', 'Approved')->get();
        // return $students;
        return view('partner.for_requirement')->with('students',$students);
    }
    public function approve_req($id){
        $students = StudentApplication::where('status','Recruited')->get();

        $student = StudentApplication::find(base64_decode($id));
        $student->status = "FOR COOR APPROVAL";
        $student->save();

        // Return back to the previous page
        return redirect()->back()->with('success', 'Approve Application: '.$student->student->student_number);
    }

    public function job_details($id){
        $job = Job::find(base64_decode($id));
        return view('partner.job_details')->with('job',$job);
    }
    public function archive($id){
        $job = Job::find(base64_decode($id));
        $job->status = "Archived";
        $job->save();
        return redirect('/partners/job/list')->with('success','Archive Job Post: '.$job->title);
    }
    public function restore($id){
        $job = Job::find(base64_decode($id));
        $job->status = "Active";
        $job->save();
        return redirect('/partners/job/list/archive')->with('success','Restore Job Post: '.$job->title);
    }
    public function recruit($applicant,$id){
        $job = StudentApplication::where('student_id',base64_decode($applicant))->where('job_id',base64_decode($id))->first();
        // return $job;
        $job->status = "Recruited";
        $job->save();
        return redirect('/partners/job/applicants/'.$id)->with('success','Applicant Recruited: '.$job->student->first_name.' '.$job->student->middle_name.' '.$job->student->last_name);
    }
    public function user_profile(){
        return view('partner.profile');
    }
    public function profile(){
        return view('partner.user_profile');
    }
    public function students(){
        $students = StudentOjt::where('partner_id', Auth::user()->id)->get();
        // return $students;
        return view('partner.student_list')->with('students',$students);
    }
    public function archiveStudent($id){
        $student = StudentOjt::find(base64_decode($id));
        $student->status = "Archived";
        $student->save();
        return redirect('/partners/trainee/students')->with('success','Archive Student: '.base64_decode($id));
    }
    public function restoreStudent($id){
        $student = StudentOjt::find(base64_decode($id));
        $student->status = "Active";
        $student->save();
        return redirect('/partners/trainee/students/')->with('success','Restore Student: '.base64_decode($id));
    }
    public function student_accomplishments($id){
        $student = Student::find(base64_decode($id));
        $accomplishments = StudentAccomplishment::where('student_id',$student->id)->get();
        // return $students->students;
        return view('partner.accomplishment')->with('accomplishments',$accomplishments)->with('student',$student);

    }
    public function approve_accomplishments($id){
        $accomplishment = StudentAccomplishment::find(base64_decode($id));

        // Check if the accomplishment exists
        if (!$accomplishment) {
            return back()->with('error', 'Accomplishment not found.');
        }

        // Toggle logic for status
        if ($accomplishment->status == null || $accomplishment->status == '') {
            $accomplishment->status = "FOR COOR GRADING";
        } else {
            $accomplishment->status = '';
        }

        // Save the changes
        $accomplishment->save();

        // Return with a success message
        return back()->with('success', 'Accomplishment status updated successfully.');
    }

    public function students_monitoring($id){
        $student = Student::find(base64_decode($id));
        $internship_duration = School::where('id', $student->school_id)->pluck('internship_duration')->first();
        $monitorings = StudentMonitoring::where('student_id',base64_decode($id))->get();
        $evaluation = StudentEvaluation::where('student_id',base64_decode($id))->get();
        // return $students;
        return view('partner.monitoring')->with('student',$student)->with('monitorings',$monitorings)->with('evaluation',$evaluation)->with('internship_duration', $internship_duration);

    }

    public function update_form ($id){
        $specializations = Specialization::all();
        $job = Job::find(base64_decode($id));
        $job_specializations = JobSpecialization::where('job_id', $job->id)->get();
        return view('partner.form_up')->with('job',$job)->with('specializations',$specializations)->with('job_specializations', $job_specializations);
    }

    public function update_job_save($id,Request $request){
        // return dd($request);
        $job = Job::find(base64_decode($id));
        $job->title=$request->title;
        $job->position=$request->postion;
        $job->location=$request->location;
        $job->job_descriptions=urlencode($request->description);
        $job->status= "Active";
        $job->stat= "0";
        $job->save();

        foreach($request->skills as $skill){
            if($skill != "" || $skill != null){
                $skills_data = new JobSkill;
                $skills_data->job_id = $job->id;
                $skills_data->skill = $skill;
                $skills_data->save();
            }
        }
        return redirect('/partners/job/details/'.base64_encode($job->id))->with('success','Posted Job Updated');
    }

    public function update_skill($id, Request $request) {
        $decodedId = base64_decode($id);
        $request->validate([
            'skill' => 'required|string|max:255',
        ]);

        $skill = JobSkill::find($decodedId);
        if ($skill) {
            $skill->skill = $request->skill;
            $skill->save();

            return redirect()->back();
        }

        return redirect()->back()->with('error', 'Skill not found');
    }


    public function delete_skill($id) {
        $decodedId = base64_decode($id);
        $skill = JobSkill::find($decodedId);
        if ($skill) {
            $skill->delete();
        }
    }


    public function profile_banner(){
        return view('partner.update_banner_form');
    }
    public function profile_banner_update(Request $request){

        if( $request->banner ){
            $imageName = time().'.'.$request->banner->extension();
            $request->banner->move(public_path('partner_img'), $imageName);

            $profile = Profile::find(Auth::user()->profile->id);
            $profile->banner = $imageName;
            $profile->save();

            return redirect('/partners/profile')->with('success','Profile Image Updated!');
        }


    }

    public function profile_company(){
        return view('partner.update_company_form');
    }
    public function profile_company_update(Request $request){
        $profile = Profile::find(Auth::user()->profile->id);
        $profile->company_name = $request->name;
        $profile->company_address = $request->add;
        $profile->save();
        return redirect('/partners/profile')->with('success','Company Information Updated!');
    }
    public function profile_basic(){
        return view('partner.update_basic_form');
    }
    public function profile_basic_update(Request $request){
        $user = User::find(Auth::user()->id);
        $user->email = strtolower($request->email);
        $user->save();
        $profile = Profile::find($user->profile_id);
        $profile->company_position = $request->position;
        $profile->first_name = $request->first_name;
        $profile->middle_name = $request->middle_name;
        $profile->last_name = $request->last_name;
        $profile->save();
        return redirect('/partners/profile')->with('success','Basic Information Updated!');
    }

    public function monitoring_remarks($id){
        $monitoring = StudentMonitoring::find(base64_decode($id));
        return view('partner.monitoring_remarks')->with('monitoring',$monitoring);
    }
    public function monitoring_remarks_save($id,Request $request){

        if($request->add_remarks == ''){
            $monitoring = StudentMonitoring::find(base64_decode($id));

            $monitoring->remarks = $request->remarks;
            $monitoring->save();
            return redirect('/partners/student/monitoring/'.base64_encode($monitoring->student->id))->with('success','Remarks Saved!');
        }
        else{
            $monitoring = StudentMonitoring::find(base64_decode($id));

            $monitoring->remarks = $request->remarks.": ".$request->add_remarks;
            $monitoring->save();
            return redirect('/partners/student/monitoring/'.base64_encode($monitoring->student->id))->with('success','Remarks Saved!');
        }
    }

    public function change_password(){
        $user = Auth::user();
        return view('partner.change_password')->with('user',$user);
    }
    public function password_save(Request $request){
        $user = User::find(Auth::user()->id);
        $user->password = md5($request->password);
        $user->save();
        return redirect('/partners/job/list')->with('success','Password Updated');
    }
    public function dashboard(Request $request){
        $jobIds = Job::where('user_id', Auth::user()->id)->pluck('id');

        $applications = StudentApplication::whereIn('job_id', $jobIds)
                                      ->whereIn('status', ['', 'Applied'])
                                      ->get();

        $students = StudentOjt::where('partner_id', Auth::user()->id)->get();
        $accomplishments = StudentAccomplishment::where('status', '')->get();

        foreach ($students as $student) {
            $student->monitorings = StudentMonitoring::where('student_id', $student->id)
                ->whereNotNull('remarks')
                ->get();
        }

        return view('partner.dashboard')->with([
            'students' => $students,
            'applications' => $applications,
            'accomplishments' => $accomplishments
        ]);
    }

    public function dashboard_table($target){
        if($target == "Completed"){
            $students = StudentOjt::where('partner_id', Auth::user()->id)->where('status', 'COMPLETED')->get();
            return view('partner.dashboard_completed')->with('students', $students);
        }
        elseif($target == "On-Going"){
            $students = StudentOjt::where('partner_id', Auth::user()->id)->where('status', 'ON-GOING')->get();

            foreach ($students as $student) {
                $monitorings = StudentMonitoring::where('student_id', $student->id)->whereNotNull('remarks')->get();
                $total_times = ''; // Reset total_times for each student
                $y = 0; // Reset $y for each student

                foreach ($monitorings as $monitoring) {
                    if($monitoring->time_out != null){
                        $date_raw = explode('-', $monitoring->date_log);
                        $time_in_raw_ampm = explode(' ', $monitoring->time_in);
                        $time_in_raw = explode(':', $time_in_raw_ampm[0]);
                        $time_out_raw_ampm = explode(' ', $monitoring->time_out);
                        $time_out_raw = explode(':', $time_out_raw_ampm[0]);

                        if($time_in_raw_ampm[1] == "PM"){
                            $time_in_raw[0] += 12;
                        }
                        if($time_out_raw_ampm[1] == "PM"){
                            $time_out_raw[0] += 12;
                        }

                        $date1 = strtotime("{$date_raw[2]}-{$date_raw[0]}-{$date_raw[1]} {$time_in_raw[0]}:{$time_in_raw[1]}:{$time_in_raw[2]}");
                        $date2 = strtotime("{$date_raw[2]}-{$date_raw[0]}-{$date_raw[1]} {$time_out_raw[0]}:{$time_out_raw[1]}:{$time_out_raw[2]}");

                        $diff = abs($date2 - $date1);
                        $hours = floor($diff / (60*60));
                        $minutes = floor(($diff % (60*60)) / 60);
                        $seconds = $diff % 60;

                        $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
                        $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
                        $seconds = str_pad($seconds, 2, "0", STR_PAD_LEFT);

                        if($y == 0){
                            $total_times = "$hours:$minutes:$seconds";
                            $y++;
                        }
                        else{
                            $time2 = "$hours:$minutes:$seconds";
                            $secs = strtotime($time2) - strtotime("00:00:00");
                            $total_times = date("H:i:s", strtotime($total_times) + $secs);
                        }
                    }
                }
                // Add $total_times to the student object
                $total_times = $total_times;
            }
        }
        elseif($target == "Accomplishments"){
            $accomplishments = StudentAccomplishment::where('status', '')->get();
            return view('partner.dashboard_accomplishments')->with('accomplishments', $accomplishments);
        }
        elseif($target == "Applicants"){
            $jobIds = Job::where('user_id', Auth::user()->id)->pluck('id');
            $jobs = Job::where('user_id', Auth::user()->id)->get();
            $applications = StudentApplication::whereIn('job_id', $jobIds)
                                          ->whereIn('status', ['', 'Applied'])
                                          ->get();

            return view('partner.dashboard_applicants')->with([
                'jobs' => $jobs,
                'applications' => $applications,
            ]);
        }

        return view('partner.dashboard_on_going')->with('students', $students)->with('total_times', $total_times);
    }

    public function evaluation_form($id){
        $student = Student::find(base64_decode($id));
        $ojt = StudentOjt::where('student_id',$student->id)->first();
        // return $ojt;
        return view('partner.evaluation_form')->with('ojt',$ojt)->with('student',$student);
    }
    public function evaluation_view($id){
        $student = Student::find(base64_decode($id));
        $ojt = StudentOjt::where('student_id',$student->id)->first();
        $evaluation = StudentEvaluation::where('student_id',$student->id)->first();
        // return $ojt;
        return view('partner.evaluation_view')->with('evaluation',$evaluation)->with('ojt',$ojt)->with('student',$student);
    }
    public function evaluation_submitted($id,Request $request){
        // return dd($request);

        $student = Student::find(base64_decode($id));
        $ojt = StudentOjt::where('student_id',$student->id)->first();

        $evaluation = StudentEvaluation::where('student_id', $student->id)->where('partner_id', Auth::user()->id)->get();
        if(count($evaluation) != 0){
            $evaluation = StudentEvaluation::where('student_id', $student->id)->where('partner_id', Auth::user()->id)->first();
            $evaluation->rating_1  = $request->rating_1;
            $evaluation->rating_2  = $request->rating_2;
            $evaluation->rating_3  = $request->rating_3;
            $evaluation->rating_4  = $request->rating_4;
            $evaluation->rating_5  = $request->rating_5;
            $evaluation->rating_6  = $request->rating_6;
            $evaluation->rating_7  = $request->rating_7;
            $evaluation->rating_8  = $request->rating_8;
            $evaluation->rating_9  = $request->rating_9;
            $evaluation->rating_10 = $request->rating_10;
            $evaluation->rating_11 = $request->rating_11;
            $evaluation->rating_12 = $request->rating_12;
            $evaluation->rating_13 = $request->rating_13;
            $evaluation->rating_14 = $request->rating_14;
            $evaluation->rating_15 = $request->rating_15;
            $evaluation->rating_16 = $request->rating_16;
            $evaluation->rating_17 = $request->rating_17;
            $evaluation->rating_18 = $request->rating_18;
            $evaluation->rating_19 = $request->rating_19;
            $evaluation->rating_20 = $request->rating_20;
            $evaluation->rating_21 = $request->rating_21;
            $evaluation->rating_22 = $request->rating_22;
            $evaluation->rating_23 = $request->rating_23;
            $evaluation->remarks = $request->remarks;
            $evaluation->date_eval = date('m-d-Y');
            $evaluation->status = 'Submitted';
            $evaluation->stat = '0';
            $evaluation->save();


            $ojt = StudentOjt::where('student_id',$student->id)->first();
            $ojt->evaluation = 'COMPLETED';
            $ojt->status = 'FOR COOR APPROVAL';
            $ojt->save();
            return redirect('/partners/student/monitoring/'.base64_encode($student->id))->with('success','Evaluation Submitted!');
        }
        else{
            $evaluation = new StudentEvaluation;
            $evaluation->student_id = $student->id;
            $evaluation->partner_id = Auth::user()->id;
            $evaluation->job_id = $ojt->job_id;
            $evaluation->rating_1  = $request->rating_1;
            $evaluation->rating_2  = $request->rating_2;
            $evaluation->rating_3  = $request->rating_3;
            $evaluation->rating_4  = $request->rating_4;
            $evaluation->rating_5  = $request->rating_5;
            $evaluation->rating_6  = $request->rating_6;
            $evaluation->rating_7  = $request->rating_7;
            $evaluation->rating_8  = $request->rating_8;
            $evaluation->rating_9  = $request->rating_9;
            $evaluation->rating_10 = $request->rating_10;
            $evaluation->rating_11 = $request->rating_11;
            $evaluation->rating_12 = $request->rating_12;
            $evaluation->rating_13 = $request->rating_13;
            $evaluation->rating_14 = $request->rating_14;
            $evaluation->rating_15 = $request->rating_15;
            $evaluation->rating_16 = $request->rating_16;
            $evaluation->rating_17 = $request->rating_17;
            $evaluation->rating_18 = $request->rating_18;
            $evaluation->rating_19 = $request->rating_19;
            $evaluation->rating_20 = $request->rating_20;
            $evaluation->rating_21 = $request->rating_21;
            $evaluation->rating_22 = $request->rating_22;
            $evaluation->rating_23 = $request->rating_23;
            $evaluation->remarks = $request->remarks;
            $evaluation->date_eval = date('m-d-Y');
            $evaluation->status = 'Submitted';
            $evaluation->stat = '0';
            $evaluation->save();


            $ojt = StudentOjt::where('student_id',$student->id)->first();
            $ojt->evaluation = 'COMPLETED';
            $ojt->status = 'FOR COOR APPROVAL';
            $ojt->save();
            return redirect('/partners/student/monitoring/'.base64_encode($student->id))->with('success','Evaluation Submitted!');
        }



    }
    public function certification_upload($id, Request $request) {
        // Decode student ID
        $studentId = base64_decode($id);

        // Find student and related entities
        $student = Student::find($studentId);
        $ojt = StudentOjt::where('student_id', $studentId);

        // Check if student or OJT record is not found
        if (!$student || !$ojt) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        // Check if a file is uploaded and valid
        if (!$request->hasFile('coc') || !$request->file('coc')->isValid()) {
            dd('File upload error:', [
                'hasFile' => $request->hasFile('coc'),
                'fileDetails' => $request->file('coc'),
                'fileError' => $request->file('coc')->getError(),
                'errorMessage' => $request->file('coc')->getErrorMessage()
            ]);
        }

        // Move uploaded file to public directory
        $cocFileName = strtoupper($student->last_name . ' ' . $student->first_name . ' Certificate Of Completion' . '.' . $request->file('coc')->getClientOriginalExtension());
        $request->file('coc')->move(public_path('student_completion'), $cocFileName);

        // Update OJT record with certificate file name
        $ojt->update(['certificate' => $cocFileName]);

        return redirect('/partners/trainee/students/')->with('success', 'Certificate of Completion uploaded successfully!');
    }

}
