<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Job;
use App\AcademicYear;
use Shuchkin\SimpleXLSX;
use Auth;
use Carbon\Carbon;

use App\JobSpecialization;
use App\StudentSpecialization;
use App\Specialization;
use App\Post;
use App\School;
use App\Signatory;
use App\StudentSkill;
use App\StudentEmployment;
use App\StudentEvaluation;
use App\StudentApplication;
use App\StudentMonitoring;
use App\StudentRequirement;
use App\StudentOjt;
use App\StudentAccomplishment;

use PDF;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;



class StudentController extends Controller
{

    public function student_login_redirect(){
        return redirect('/login');
    }
    public function downloadable_forms(){
        return view('students.downloadables');
    }
    public function student_register(Request $request){
        $student = Student::where('student_token',$request->student_token)->first();
        if ($student == '') return redirect('/register')->with('error','Token Invalid');
        else return view('students.register')->with('student',$student);
    }
    public function student_register_save(Request $request){
        // return dd($request);
        $account = new User;
        $account->role_id = 1;
        $account->profile_id = 0;
        $account->student_id = base64_decode($request->student_info);
        $account->email = $request->email;
        $account->username = $request->username;
        $account->password= md5($request->password);
        $account->status= "Active";
        $account->stat= 0;
        $account->save();

        // dd(base64_decode($request->student_info));
        $student = Student::find(base64_decode($request->student_info));
        $student->student_token = "";
        $student->status = "Active";
        $student->save();
        return redirect('/login')->with('success','Account Created. Please Login to view your portal.');
    }

    public function dashboard(Request $request){
        $accomplishments = StudentAccomplishment::where('student_id',Auth::user()->student->id)->get();

        $student_ojt = StudentOjt::where('student_id',Auth::user()->student->id)->first();
        $monitorings = StudentMonitoring::where('student_id',Auth::user()->student->id)->get();
        $monitoring_count = StudentMonitoring::where('student_id',Auth::user()->student->id)->count();
        $accomplishments_count = StudentAccomplishment::where('student_id',Auth::user()->student->id)->count();
        $students = StudentApplication::where('student_id',Auth::user()->student->id)->first();
        return view('students.dashboard',
            compact('monitorings',
            'accomplishments_count',
            'monitoring_count',
            'student_ojt',
            'accomplishments'
        ));

    }

    public function requirements(Request $request){
        $student = StudentApplication::where('student_id',Auth::user()->student->id)->first();
        return view('students.requirements')->with('student', $student);
    }


    public function downloadable_form_moa_preview($id,$job_id){
        $student = Student::find(base64_decode($id));
        $job = Job::find(base64_decode($job_id));
        $data = ['student' => $student,'job'=> $job];
        $pdf = PDF::loadView('students.forms.moa', $data);
        return  $pdf->stream();
    }
    public function downloadable_form_moa($id,$job_id){
        $student = Student::find(base64_decode($id));
        $job = Job::find(base64_decode($job_id));
        $data = ['student' => $student,'job'=> $job];
        $pdf = PDF::loadView('students.forms.moa', $data);
        return $pdf->download('moa-'.$student->student_number.'.pdf');
    }
    public function downloadable_form_al_preview($id,$job_id){
        $student = Student::find(base64_decode($id));
        $job = Job::find(base64_decode($job_id));
        $data = ['student' => $student,'job'=> $job];
        $pdf = PDF::loadView('students.forms.acceptance_letter', $data);
        return  $pdf->stream();
    }
    public function downloadable_form_al($id,$job_id){
        $student = Student::find(base64_decode($id));
        $job = Job::find(base64_decode($job_id));
        $data = ['student' => $student,'job'=> $job];
        $pdf = PDF::loadView('students.forms.acceptance_letter', $data);
        return $pdf->download('acceptance-letter-'.$student->student_number.'.pdf');
    }
    public function downloadable_form_pta_preview($id,$job_id){
        $student = Student::find(base64_decode($id));
        $job = Job::find(base64_decode($job_id));
        $school = School::all();
        $signatory = Signatory::all();
        $data = ['student' => $student,'job'=> $job, 'school' => $school,'signatory'=>$signatory];
        $pdf = PDF::loadView('students.forms.practicum_training_agreement', $data);
        return  $pdf->stream();
    }
    public function downloadable_form_pta($id,$job_id){
        $student = Student::find(base64_decode($id));
        $job = Job::find(base64_decode($job_id));
        $data = ['student' => $student,'job'=> $job];
        $pdf = PDF::loadView('students.forms.practicum_training_agreement', $data);
        return $pdf->download('practicum-training-agreement-'.$student->student_number.'.pdf');
    }
    public function downloadable_form_waiver_preview($id,$job_id){
        $student = Student::find(base64_decode($id));
        $job = Job::find(base64_decode($job_id));
        $data = ['student' => $student,'job'=> $job];
        $pdf = PDF::loadView('students.forms.waiver', $data);
        return  $pdf->stream();
    }
    public function downloadable_form_waiver($id,$job_id){
        $student = Student::find(base64_decode($id));
        $job = Job::find(base64_decode($job_id));
        $data = ['student' => $student,'job'=> $job];
        $pdf = PDF::loadView('students.forms.waiver', $data);
        return $pdf->download('waiver-'.$student->student_number.'.pdf');
    }
    public function downloadable_form_pc_preview($id,$job_id){
        $student = Student::find(base64_decode($id));
        $job = Job::find(base64_decode($job_id));
        $data = ['student' => $student,'job'=> $job];
        $pdf = PDF::loadView('students.forms.parental_concent', $data);
        return  $pdf->stream();
    }
    public function downloadable_form_pc($id,$job_id){
        $student = Student::find(base64_decode($id));
        $job = Job::find(base64_decode($job_id));
        $data = ['student' => $student,'job'=> $job];
        $pdf = PDF::loadView('students.forms.parental_concent', $data);
        return $pdf->download('parantal-concent-'.$student->student_number.'.pdf');
    }
    public function downloadable_completion_form_evaluation($id,$job_id){
        $student = Student::find(base64_decode($id));
        $job = Job::find(base64_decode($job_id));
        $data = ['student' => $student,'job'=> $job];
        $pdf = PDF::loadView('students.completion.evaluation', $data);
        return $pdf->download('evaluation-'.$student->student_number.'.pdf');

    }
    public function monitoring(){
        $monitorings = StudentMonitoring::where('student_id',Auth::user()->student->id)->get();
        return view('students.monitoring')->with('monitorings',$monitorings);
    }

    public function monitoring_new() {
        $label = "Some Label"; // Define $label here or whatever value you need
        return view('students.monitoring_form', compact('label'));
    }


    public function monitoring_save(Request $request){
        // Fetch job details
        $job =  StudentOjt::where('student_id',Auth::user()->student->id)->first();

        // Using null coalescing operator
        $time_in_minutes = $request->time_in_minutes ?? '00';
        $time_out_minutes = $request->time_out_minutes ?? '00';

        // Extract form inputs
        $date_log = Carbon::createFromFormat('Y-m-d', $request->date)->format('m-d-Y');
        $time_in = "$request->time_in_hour:$time_in_minutes:00 $request->time_in_designation";
        $time_out = "$request->time_out_hour:$time_out_minutes:00 $request->time_out_designation";

        // Create a new instance of StudentMonitoring
        $monitoring = new StudentMonitoring;

        // Set properties
        $monitoring->student_id = Auth::user()->student->id;
        $monitoring->job_id = $job->job_id;
        $monitoring->partner_id = $job->job->user->id;
        $monitoring->date_log = $date_log;
        $monitoring->time_in = $time_in;
        $monitoring->time_out = $time_out;
        $monitoring->created_at = now();
        $monitoring->updated_at = now();

        // Save to the database
        $monitoring->save();

        // Redirect with success message
        return redirect('/student/monitoring')->with('success','Time Logged Successfully');
    }

    public function monitoring_update($id){
        $monitoring = StudentMonitoring::findOrFail(base64_decode($id));
        return view('students.monitoring_update_form', compact('monitoring'));
    }

    public function monitoring_update_save(Request $request, $id){
        // Find the monitoring record by ID
        $monitoring = StudentMonitoring::findOrFail(base64_decode($id));

        // Fetch job details
        $job =  StudentOjt::where('student_id', Auth::user()->student->id)->first();

        // Using null coalescing operator
        $time_in_minutes = $request->time_in_minutes ?? '00';
        $time_out_minutes = $request->time_out_minutes ?? '00';

        // Extract form inputs
        $date_log = Carbon::createFromFormat('Y-m-d', $request->date)->format('m-d-Y');
        $time_in = "$request->time_in_hour:$time_in_minutes:00 $request->time_in_designation";
        $time_out = "$request->time_out_hour:$time_out_minutes:00 $request->time_out_designation";

        // Set properties for update
        $monitoring->job_id = $job->job_id;
        $monitoring->partner_id = $job->job->user->id;
        $monitoring->date_log = $date_log;
        $monitoring->time_in = $time_in;
        $monitoring->time_out = $time_out;
        $monitoring->updated_at = now();

        // Save the updated record
        $monitoring->save();

        // Redirect with success message
        return redirect('/student/monitoring')->with('success','Time Logged Successfully Updated');
    }


    public function joblist(){
        // return view('test');
        if(Auth::user()->student->parent_first_name == ''){
            return redirect('/student/profile')->with('warning','Please Update your information.');
        }
        else {
            //  $specialization_search = Specialization::all();
            //  $specializations = explode(',',Auth::user()->student->specialization);
            $checker =  StudentOjt::where('student_id',Auth::user()->student->id)->first();
            if($checker != null){
                return redirect('/student/dashboard');
            }
            $application = StudentApplication::where('student_id',Auth::user()->student->id)->pluck('job_id');
            $jobs = Job::all();
            return view('students.joblist')
                //  ->with('specialization_search',$specialization_search)
                //  ->with('specializations',$specializations)
                ->with('applications',$application)
                ->with('jobs',$jobs);
        }
    }

    public function jobsearch(Request $request){
        // return dd($request);
        // return $request;
        $specialization_search = Specialization::all();
        $applications = StudentApplication::where('student_id',Auth::user()->student->id)->pluck('id');

        $title = $request->title;
        $area = $request->area;
        if(($title != '' || $title != null) && ($area != '' || $area != null) ){
            $jobs = Job::where(function ($query) use ($title,$area) {
                $query->where('title', 'like', '%'. $title .'%')
                    ->orWhere('location', 'like', '%'. $area .'%');
            })->get();
            return view('students.jobsearch')->with('jobs',$jobs)
                 ->with('specialization_search',$specialization_search)
                 ->with('applications',$applications);
        }
        else if(($area != '' || $area != null) ){
            $jobs = Job::where('location', 'like', '%'. $area .'%')->get();
            return view('students.jobsearch')->with('jobs',$jobs)
                 ->with('specialization_search',$specialization_search)
                 ->with('applications',$applications);
        }
        else if(($title != '' || $title != null) ){
            $jobs = Job::where('title', 'like', '%'. $title .'%')->get();
            return view('students.jobsearch')->with('jobs',$jobs)
                 ->with('specialization_search',$specialization_search)
                 ->with('applications',$applications);
        }
    }

    public function profile(){
        // return Auth::user()->student->skill_tbl[0];
        return view('students.profile');
   }
   public function profile_form(){
       $student = Student::find(Auth::user()->student->id);
       return view('students.profile_form')->with('student',$student);
   }
   public function profile_update(Request $request){
       // return dd($request);

       $user = User::find(Auth::user()->id);
       $user->email = strtolower($request->email);
       $user->save();
       $student = Student::find($user->student->id);
       $student->parent_first_name = $request->parent_first_name;
       $student->parent_middle_name = $request->parent_middle_name;
       $student->parent_last_name = $request->parent_last_name;
       $student->contact = $request->contact;
       $student->address = $request->house." ".$request->barangay.", ".$request->city.", ".$request->province;
       $student->save();
       return redirect('/student/profile')->with('success','Basic Information Updated');
   }

   public function basic_info(){
        $specializations = Specialization::all();
        return view('students.basic_info_form')->with('specializations',$specializations);
   }
   public function basic_info_update( Request $request){
        // return Auth::user()->profile;
        // return dd($request);
        $profile = Profile::find(Auth::user()->student->id);
        $student->salary_s = $request->salary_s;
        $student->salary_e = $request->salary_e;
        $student->educational_college_program = $request->program;
        $student->educational_college_s_year = $request->year_grad;
        $student->specialization = $request->specialization[0];
        $student->save();

        $specializations = StudentSpecialization::where('student_id',$student->id)->delete();
        foreach ($request->specialization as $value) {
            $specializations = new StudentSpecialization;
            $specializations->student_id = $student->id ;
            $specializations->specialization = $value ;
            $specializations->save();
        }
        return redirect('/student/profile')->with('success','Profile Update Successfully');


   }
   public function skills(){
       return view('students.skills');
   }
   //add new skill
   public function skills_update(Request $request){
       // return Auth::user()->profile;
       // return dd($request);
       // $skills = StudentSkill::where('student_id',Auth::user()->profile->id)->delete();

       
       $expertise_array = $request->level_of_expertise;

       $counter = 0;

       foreach ($request->skills as $skill) {
           $skills = new StudentSkill;
           $skills->student_id = Auth::user()->student->id;
           $skills->skill = $skill;
           //$skills->level_of_expertise = $expertise_array[$counter];
           $skills->save();
           //$counter+=1;
       }
       return redirect('/student/profile')->with('success','Skills Update Successfully');
   }
   public function skill_update($id){
       $skill = StudentSkill::find(base64_decode($id));
       return view('students.skills_update')->with('skill',$skill);
   }
   public function skill_delete($id){
       $skill = StudentSkill::find(base64_decode($id))->delete();
       return redirect('/student/profile')->with('success','Skills Removed Successfully');
   }
   public function skill_update_save($id,Request $request){
       $skills = StudentSkill::find(base64_decode($id));
       $skills->skill = $request->skills ;
       $skills->save();
       return redirect('/student/profile')->with('success','Skills Update Successfully');
   }

   public function cancel_job($stud_id, $job_id){
       $cancel = StudentApplication::where('student_id', base64_decode($stud_id))
                                   ->where('job_id', base64_decode($job_id))
                                   ->first();
       if ($cancel) {
           $cancel->delete();
           return redirect('/student/job/list')->with('success', 'Job application canceled successfully');
       } else {
           return redirect('/student/job/list')->with('error', 'Job application not found');
       }
   }
   public function apply_job($id){
        $apply = new StudentApplication;
        $apply->student_id = Auth::user()->student->id;
        $apply->job_id = base64_decode($id);
        $apply->status = 'Applied';
        $apply->stat = 0;
        $apply->save();
        return redirect('/student/applications')->with('success','Job Applied');
    }
    public function job_details($id){
        $applications = StudentApplication::where('student_id',Auth::user()->student->id)->pluck('job_id');
       //  return $applications;
        $job = Job::find(base64_decode($id));
        return view('students.job_details')->with('job',$job)->with('applications',$applications)->with('job_id',$id);
    }
    public function for_approval($id){
       $applications = StudentApplication::find(base64_decode($id));
       $job = Job::find($applications->job_id);
       // return $job ;
       return view('students.requirements_form')->with('job',$job);
    }

    public function requirements_upload($id, Request $request) {
       $application = StudentApplication::find(base64_decode($id));

       if(!$application) {
           return redirect()->back()->with('error', 'Application not found.');
       }

       $job = Job::find($application->job_id);

       // Check if any existing requirements exist for the student and job
       $checker = StudentRequirement::where('student_id', $application->student_id)
           ->where('job_id', $application->job_id)
           ->first();

       // Delete existing requirements if found
       if ($checker) {
           $checker->delete();
       }

       // Move uploaded files to public directory
       $al = strtoupper($job->title.' '.str_replace('-',' ',$request->al->getClientOriginalName()));
       $pta = strtoupper($job->title.' '.str_replace('-',' ',$request->pta->getClientOriginalName()));
       $pc = strtoupper($job->title.' '.str_replace('-',' ',$request->pc->getClientOriginalName()));
       $w = strtoupper($job->title.' '.str_replace('-',' ',$request->w->getClientOriginalName()));

       $request->al->move(public_path('student_forms'), $al);
       $request->pta->move(public_path('student_forms'), $pta);
       $request->pc->move(public_path('student_forms'), $pc);
       $request->w->move(public_path('student_forms'), $w);

       // Save new requirements
       $req = new StudentRequirement;
       $req->student_id = Auth::user()->student->id;
       $req->job_id = $application->job_id;
       $req->initial_req_1 = $al;
       $req->initial_req_2 = $pta;
       $req->initial_req_3 = $pc;
       $req->initial_req_4 = $w;

       // Check and save other files if present
       // Check if other files are uploaded and save them if present
       if ($request->hasFile('other_file_1')) {
           $other_file_1 = strtoupper($job->title.' '.str_replace('-', ' ', $request->other_file_1->getClientOriginalName()));
           $request->other_file_1->move(public_path('student_forms'), $other_file_1);
           $req->other_file_1 = $other_file_1;
       }

       if ($request->hasFile('other_file_2')) {
           $other_file_2 = strtoupper($job->title.' '.str_replace('-', ' ', $request->other_file_2->getClientOriginalName()));
           $request->other_file_2->move(public_path('student_forms'), $other_file_2);
           $req->other_file_2 = $other_file_2;
       }

       if ($request->hasFile('other_file_3')) {
           $other_file_3 = strtoupper($job->title.' '.str_replace('-', ' ', $request->other_file_3->getClientOriginalName()));
           $request->other_file_3->move(public_path('student_forms'), $other_file_3);
           $req->other_file_3 = $other_file_3;
       }
       // for ($i = 1; $i <= 3; $i++) {
       //     $fileKey = 'other_file_' . $i;
       //     if ($request->hasFile($fileKey)) {
       //         $otherFile = strtoupper($job->title . ' ' . str_replace('-', ' ', $request->$fileKey->getClientOriginalName()));
       //         $request->$fileKey->move(public_path('student_forms'), $otherFile);
       //         $req->$fileKey = $otherFile;
       //     }
       // }

       $req->save();

       return redirect('/student/applications')->with('success', 'Submitted Requirements for job title: ' . $job->title);
   }

   public function applications()
    {
        $jobs = Job::all();
        $applications = StudentApplication::where('student_id', Auth::user()->student->id)->get();

        return view('students.applications')->with(['jobs' => $jobs, 'applications' => $applications]);
    }


   public function posts($post){
        $post_list = Post::where('post_type',$post)->latest()->get();
        return view('students.announcements')->with('post_list',$post_list)->with('post',$post);
   }

   public function change_password(){
       $user = Auth::user();
       return view('coor.change_password')->with('user',$user);
   }

   public function password_save(Request $request){
       $user = User::find(Auth::user()->id);
       $user->password = md5($request->password);
       $user->save();
       return redirect('/students/job/list')->with('success','Password Updated');
   }

   public function work_experience(){
       return view('students.work_exp_form');
   }

   public function work_experience_update_form($id){
       $we = StudentEmployment::find(base64_decode($id));
       return view('students.work_exp_form_update')->with('we',$we);
   }

   //add new work exp
   public function work_experience_update(Request $request){
       // return Auth::user()->profile;
       // return dd($request);
       // $skills = StudentEmployment::where('student_id',Auth::user()->profile->id)->delete();
       $counter = 0;
       foreach ($request->position as $position) {
           $skills = new StudentEmployment;
           $skills->student_id = Auth::user()->student->id;
           $skills->work_exp_company = $request->company[$counter];
           $skills->work_exp_address = $request->address[$counter];
           $skills->work_exp_position = $position ;
           $skills->work_exp_s_year = $request->workdates_s[$counter];
           $skills->work_exp_e_year = $request->workdates_e[$counter];
           $skills->save();
           $counter++;
       }
       return redirect('/student/profile')->with('success','Work Experience Update Successfully');
   }

   public function work_experience_update_save($id,Request $request){

           $skills = StudentEmployment::find(base64_decode($id));
           $skills->student_id = Auth::user()->student->id;
           $skills->work_exp_company = $request->company;
           $skills->work_exp_address = $request->address;
           $skills->work_exp_position = $request->position ;
           $skills->work_exp_s_year = $request->workdates_s;
           $skills->work_exp_e_year = $request->workdates_e;
           $skills->save();
       return redirect('/student/profile')->with('success','Work Experience Update Successfully');
   }
   public function work_experience_delete($id,Request $request){

           $skills = StudentEmployment::find(base64_decode($id))->delete();
           return redirect('/student/profile')->with('success','Work Experience Removed');
   }

   public function profile_image_form(){
       return view('students.profile_image_form');
   }
   public function profile_img(Request $request){
       if( $request->image ){
           $imageName = time().'.'.$request->image->extension();
           $request->image->move(public_path('student_img'), $imageName);

           $profile = Student::find(Auth::user()->student->id);
           $profile->image = $imageName;
           $profile->save();

           return redirect('/student/profile')->with('success','Profile Image Updated!');
       }
   }

   public function accomplishments(){
       $accomplishments = StudentAccomplishment::where('student_id',Auth::user()->student->id)->get();
       return view('students.accomplishments')->with('accomplishments',$accomplishments );
   }

   public function accomplishment_new(){
       return view('students.accomplishment_form');
   }

//    public function accomplishment_save(Request $request){
//        $accomplishment = new StudentAccomplishment;
//        $accomplishment->student_id = Auth::user()->student->id;

//        // Convert input dates to MM-DD-YYYY format
//        $date_start = date("m-d-Y", strtotime($request->date_start));
//        $date_end = date("m-d-Y", strtotime($request->date_end));

//        // Calculate total hours rendered
//        $total_hours_rendered = 0;

//        $monitorings = StudentMonitoring::where('student_id', $accomplishment->student_id)
//        ->whereNotNull('remarks')
//        ->get();

//        foreach ($monitorings as $monitoring) {
//            $date_log = $monitoring->date_log;
//            $log_date = Carbon::createFromFormat('m-d-Y', $date_log);
//            $start = Carbon::parse($request->date_start);
//            $end = Carbon::parse($request->date_end);

//            // Get the dates between $start and $end
//            $dates_between = [];
//            $dates_log = [];
//            for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
//                $dates_between[] = $date->format('Y-m-d');
//            }

//            if ($log_date->between($start, $end)) {
//                $dates_log[] = $log_date->format('Y-m-d');
//                $total_hours_rendered = $this->calculateTotalHours($monitorings);
//            }

//            if (count($dates_between) != count($dates_log)) {
//                $total_hours_rendered == 0;
//            }
//        }



//        if ($total_hours_rendered == 0) {
//            $total_hours_rendered = null;
//        }

//        // Save the accomplishment with total hours rendered
//        $accomplishment->date_start = $date_start;
//        $accomplishment->date_end = $date_end;
//        $accomplishment->hours_rendered = $total_hours_rendered;
//        $accomplishment->accomplishment = urlencode($request->accomplishment);
//        $accomplishment->status = "";
//        $accomplishment->save();

//        return redirect('/student/accomplishments')->with('success','Accomplishment Saved!');
//    }

    public function accomplishment_update($id){
        $accomplishment = StudentAccomplishment::findOrFail(base64_decode($id));
        return view('students.accomplishment_update_form', compact('accomplishment'));
    }

    public function accomplishment_update_save(Request $request, $id){
        $accomplishment = StudentAccomplishment::findOrFail(base64_decode($id));

        // Convert input dates to MM-DD-YYYY format
        $date_start = date("m-d-Y", strtotime($request->date_start));
        $date_end = date("m-d-Y", strtotime($request->date_end));

        // Calculate total hours rendered
        $total_hours_rendered = 0;

        $monitorings = StudentMonitoring::where('student_id', $accomplishment->student_id)
        ->whereNotNull('remarks')
        ->get();

        foreach ($monitorings as $monitoring) {
            $date_log = $monitoring->date_log;
            $log_date = Carbon::createFromFormat('m-d-Y', $date_log);
            $start = Carbon::parse($request->date_start);
            $end = Carbon::parse($request->date_end);

            // Get the dates between $start and $end
            $dates_between = [];
            $dates_log = [];
            for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
                $dates_between[] = $date->format('Y-m-d');
            }

            if ($log_date->between($start, $end)) {
                $dates_log[] = $log_date->format('Y-m-d');
                $total_hours_rendered = $this->calculateTotalHours($monitorings);
            }

            if (count($dates_between) != count($dates_log)) {
                $total_hours_rendered == 0;
            }
        }



        if ($total_hours_rendered == 0) {
            $total_hours_rendered = null;
        }

        // Update the existing accomplishment
        $accomplishment->date_start = $date_start;
        $accomplishment->date_end = $date_end;
        $accomplishment->hours_rendered = $total_hours_rendered;
        $accomplishment->accomplishment = urlencode($request->accomplishment);
        $accomplishment->save();

        return redirect('/student/accomplishments')->with('success','Accomplishment Updated!');
    }

    public function completion(){
        $ojt = StudentOjt::where('student_id',Auth::user()->student->id)->first();
        return view('students.completion')->with('ojt',$ojt);
    }
    public function completion_form(){
        return view('students.completion_form');
    }
    public function completion_save(Request $request){

        // return $request->reflection;
        $certificate = strtoupper('certificate_'.Auth::user()->student->student_number);
        $reflection = strtoupper('reflection_'.Auth::user()->student->student_number);
        // return  $refrection;

        $request->certification->move(public_path('student_completion'), $certificate.'.pdf');
        $request->reflection->move(public_path('student_completion'), $reflection.'.pdf');

        $ojt = StudentOjt::where('student_id',Auth::user()->student->id)->first();
        $ojt->certificate = $certificate.'.pdf' ;
        $ojt->reflection = $reflection.'.pdf' ;
        $ojt->save() ;
        return redirect('/student/completion')->with('success','Files Uploaded!');

    }

    public function evaluation_view($id){

        $student = Student::find(base64_decode($id));
        // dd($student);
        $ojt = StudentOjt::where('student_id',$student->id)->first();
        // dd($ojt);
        $evaluation = StudentEvaluation::where('student_id',$student->id)->first();
        // dd($evaluation);
        // return $ojt;
        return view('students.evaluation_view')->with('evaluation',$evaluation)->with('ojt',$ojt)->with('student',$student);
    }

    public function reflection_upload(Request $request) {
        $student = Student::find(Auth::user()->student->id);
        $studentId =Auth::user()->student->id;
        $job = Job::find($studentId);

        $ojt = StudentOjt::where('student_id', $studentId);

        if(!$ojt) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        // Move uploaded files to public directory
        $or = strtoupper($student->last_name . ' ' . $student->first_name . ' Reflection'.'.pdf');
        $request->or->move(public_path('student_completion'), $or);

        $ojt->update([
            'reflection' => $or
        ]);

        return redirect('/student/forms/downloadable')->with('success','Overall Reflection Suubmitted!');
    }

    public function accomplishment_save(Request $request){
        $accomplishment = new StudentAccomplishment;
        $accomplishment->student_id = Auth::user()->student->id;

        // Convert input dates to MM-DD-YYYY format
        $date_start = date("m-d-Y", strtotime($request->date_start));
        $date_end = date("m-d-Y", strtotime($request->date_end));

        // Initialize total hours rendered
        $total_hours_rendered = 0;

        // Retrieve monitorings within the specified date range and have remarks
        $monitorings = StudentMonitoring::where('student_id', $accomplishment->student_id)
            ->where('date_log', '>=', $date_start)
            ->where('date_log', '<=', $date_end)
            ->whereNotNull('remarks')
            ->get();

        // Calculate total hours rendered based on monitorings
        $total_hours_rendered = $this->calculateTotalHours($monitorings);

        // If no total hours rendered, set it to null
        if ($total_hours_rendered == 0) {
            $total_hours_rendered = null;
        }

        // Save the accomplishment with total hours rendered
        $accomplishment->date_start = $date_start;
        $accomplishment->date_end = $date_end;
        $accomplishment->hours_rendered = $total_hours_rendered;
        $accomplishment->accomplishment = urlencode($request->accomplishment);
        $accomplishment->status = "";
        $accomplishment->save();

        return redirect('/student/accomplishments')->with('success','Accomplishment Saved!');
    }

    // Helper function to calculate total hours between time_in and time_out
    private function calculateTotalHours($monitorings) {
        $total_seconds = 0;

        foreach ($monitorings as $monitoring) {
            $date_raw = explode('-', $monitoring->date_log);

            $time_in_raw_ampm = explode(' ', $monitoring->time_in);
            $time_in_raw = explode(':', $time_in_raw_ampm[0]);

            $time_out_raw_ampm = explode(' ', $monitoring->time_out);
            $time_out_raw = explode(':', $time_out_raw_ampm[0]);

            // Adjust hour for PM times
            if ($time_in_raw_ampm[1] == "PM") {
                $time_in_raw[0] += 12;
            }
            if ($time_out_raw_ampm[1] == "PM") {
                $time_out_raw[0] += 12;
            }

            $date1 = strtotime("{$date_raw[2]}-{$date_raw[0]}-{$date_raw[1]} {$time_in_raw[0]}:{$time_in_raw[1]}:{$time_in_raw[2]}");
            $date2 = strtotime("{$date_raw[2]}-{$date_raw[0]}-{$date_raw[1]} {$time_out_raw[0]}:{$time_out_raw[1]}:{$time_out_raw[2]}");

            $diff = abs($date2 - $date1);
            $total_seconds += $diff; // Accumulate total seconds
        }

        // Convert total seconds to HH:MM:SS format
        $hours = floor($total_seconds / 3600);
        $minutes = floor(($total_seconds % 3600) / 60);
        $seconds = $total_seconds % 60;

        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    }

}
