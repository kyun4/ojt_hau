<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Profile;
use App\Job;
use App\AcademicYear;
use App\StudentApplication;
use App\StudentAccomplishment;
use App\StudentOjt;
use App\StudentMonitoring;
use App\Signatory;
use App\StudentEvaluation;
use Shuchkin\SimpleXLSX;
use Auth;

use Illuminate\Support\Facades\Log;

use Mail;
use App\Mail\MailPass;
use App\Mail\MailNewAcc;

class CoordinatorController extends Controller
{

    public function dashboard(){
        $accomplishments = StudentAccomplishment::whereNotNull('status')
                             ->orWhere('status', '!=', '')
                             ->get();
        $students = Student::where('school_id',Auth::user()->profile->school_id)->get();
        // return count($students);
        $partners = Profile::where('school_id',Auth::user()->profile->school_id)->where('company_name','!=','')->get();

        #applied Students

        #hired Students
        $students_data = Student::where('school_id',Auth::user()->profile->school_id)->pluck('id');
        $ojt_countings = StudentOjt::whereIn('student_id',$students_data)->get();
        #applied Students
        $applied = StudentApplication::whereIn('student_id',$students_data)->where('status','Recruited')->get();


        #not hired Students
        $ojt_data = StudentOjt::all()->pluck('student_id');
        $student_not_hired = Student::whereNotIn('id',$ojt_data)->where('school_id',Auth::user()->profile->school_id)->get();
        return view('coor.dashboard', compact('partners', 'students', 'student_not_hired', 'ojt_countings', 'accomplishments'));
    }
    public function dashboard_table($target){
        if($target == "not_hired"){

            $students = Student::where('school_id',Auth::user()->profile->school_id)->get();
            // return count($students);
            $partners = Profile::where('school_id',Auth::user()->profile->school_id)->where('company_name','!=','')->get();

            #applied Students

            #hired Students
            $students_data = Student::where('school_id',Auth::user()->profile->school_id)->pluck('id');
            $ojt_countings = StudentOjt::whereIn('student_id',$students_data)->get();
            #applied Students
            $applied = StudentApplication::whereIn('student_id',$students_data)->where('status','Recruited')->get();


            #not hired Students
            $ojt_data = StudentOjt::all()->pluck('student_id');
            $student_not_hired = Student::whereNotIn('id',$ojt_data)->where('school_id',Auth::user()->profile->school_id)->get();



            $ojt_data = StudentOjt::all()->pluck('student_id');
            $students_table = Student::whereNotIn('id',$ojt_data)->where('school_id',Auth::user()->profile->school_id)->orderBy('last_name','asc')->get();
            return view('coor.dashboard_not_hired')->with('students_table',$students_table)->with('partners',$partners)->with('students',$students)->with('student_not_hired',$student_not_hired)->with('ojt_countings',$ojt_countings);;
        }
        elseif($target == "Completed"){
            #hired Students
            $students_data = Student::where('school_id',Auth::user()->profile->school_id)->orderBy('last_name','asc')->pluck('id');
            $students = StudentOjt::whereIn('student_id',$students_data)->where('status','COMPLETED')->get();
            return view('coor.dashboard_completed')->with('students',$students);
        }
        elseif($target == "On-Going"){
            #hired Students
            $students_data = Student::where('school_id',Auth::user()->profile->school_id)->orderBy('last_name','asc')->pluck('id');
            $students = StudentOjt::whereIn('student_id',$students_data)->where('status','ON-GOING')->get();
            return view('coor.dashboard_on_going')->with('students',$students);
        }
    }
    public function list(){
        $students = Student::orderBy('last_name','asc')->get();
        return view('coor.list')->with('students',$students);
    }
    public function for_req(){
        $students = StudentApplication::where('status', '!=', 'Approved')->get();
        // return $students;
        return view('coor.for_requirement')->with('students',$students);
    }
    public function for_com(){
        $students = StudentOjt::all();
        return view('coor.for_completion')->with('students',$students);
    }
    public function for_com_approve($id){
        $student = StudentOjt::where('student_id', base64_decode($id))->first();
        $student->status = 'COMPLETED';
        $student->save();

        return redirect('/coor/student/for/completion')->with('success', 'Student Completion Approved!');
    }

    public function accomplishments(){
        $accomplishments = StudentAccomplishment::with('student')
                             ->whereNotNull('status')
                             ->orWhere('status', '!=', '')
                             ->get();

        $sections = Student::pluck('section')->unique();

        return view('coor.accomplishments', compact('accomplishments', 'sections'));
    }



    public function accomplishment_grade(Request $request){
        $accomplishmentId = $request->input('accomplishment_id');

        $grade = $request->input('grade');
        $comment = $request->input('comment');

        $accomplishment = StudentAccomplishment::findOrFail($accomplishmentId);
        $accomplishment->status = 'Graded';
        $accomplishment->grade = $grade;
        $accomplishment->comment = $comment;
        $accomplishment->save();

        return back()->with('success', 'Accomplishment grade updated successfully.');
    }

    public function uploading_form(){
        return view('coor.upload_form');
    }

    public function upload_preview(Request $request){
       $students = SimpleXLSX::parse($request->file);
       return view('coor.uploaded')->with('students',$students);
    }
    public function student_save(Request $request){
        $totalStudents = Student::count();
        $counter = 0;
        $academic = AcademicYear::latest()->first();
        foreach($request->student_number as $student_number){
            $student = new Student;
            $student->school_id = Auth::user()->profile->school->id;
            $student->academic_year_id = $academic->id;
            $student->student_token = $request->last_name[$counter][0].$student_number.$request->first_name[$counter][0];
            $student->student_number = $student_number;
            $student->last_name = $request->last_name[$counter];
            $student->first_name = $request->first_name[$counter];
            $student->middle_name = $request->middle_name[$counter];
            $student->year = $request->year[$counter];
            $student->section = $request->section[$counter];
            $student->program = $request->program[$counter];
            $student->status = "Unregistered";
            $student->stat = "0";
            $student->save();
            $counter++;
        }
        return redirect('/coor/student/list')->with('success','Students Uploaded');
    }
    public function change_password(){
        $user = Auth::user();
        return view('coor.change_password')->with('user',$user);
    }
    public function password_save(Request $request){
        $user = User::find(Auth::user()->id);
        $user->password = md5($request->password);
        $user->save();
        return redirect('/coor/student/list')->with('success','Password Updated');
    }
    public function password_reset_part($id){
        $student = Profile::find(base64_decode($id));
        // $id = base64_decode($id);
        // dd($id);

        $user = User::where('profile_id',$student->id)->first();
        $user->password = md5($user->username);
        $user->save();

        $details = [
            'username' => $user->username,
            'password' => $user->username
        ];
        Mail::to($user->email)->send(new MailPass($details));

        return redirect('/coor/accounts')->with('success','Password Reset on Student Username: '.$user->username);
    }
    public function password_reset_stud($id){
        $student = Student::find(base64_decode($id));

        $user = User::where('student_id',$student->id)->first();
        $user->password = md5($user->username);
        $user->save();

        $details = [
            'username' => $user->username,
            'password' => $user->username
        ];
        Mail::to($user->email)->send(new MailPass($details));

        return redirect('/coor/student/list')->with('success','Password Reset on Student Username: '.$user->username);
    }
    public function approve_app($id){

        $academic = AcademicYear::latest()->first();

        $student = StudentApplication::find(base64_decode($id));
        $student->status = "Approved";
        $student->save();

        $job = Job::find($student->job_id);


        $ojt = new StudentOjt;
        $ojt->student_id = $student->student_id;
        $ojt->job_id = $student->job_id;
        $ojt->partner_id = $job->user->id;
        $ojt->academic_year_id = $academic->id;
        $ojt->status = "ON-GOING";
        $ojt->save();

        return redirect('/coor/student/for/requirements')->with('success','Approve Application: '.$student->student->student_number);
    }

    public function students_monitoring($id){
        $student = Student::find(base64_decode($id));
        $monitorings = StudentMonitoring::where('student_id',base64_decode($id))->get();

        $students_data = Student::where('school_id',Auth::user()->profile->school_id)->pluck('id');
        $ojt_countings = StudentOjt::whereIn('student_id',$students_data)->get();
        $profile_data = Profile::all();
      

      

      
        // return $students;
        return view('coor.monitoring')->with('student',$student)->with('monitorings',$monitorings)->with('ojt', $ojt_countings)->with('partners', $profile_data);

    }
    public function user_profile(){
        return view('coor.user_profile');
    }
    public function profile_basic(){
        return view('coor.update_basic_form');
    }
    public function profile_basic_update(Request $request){
        $user = User::find(Auth::user()->id);
        $user->email = strtolower($request->email);
        $user->save();

        $profile = Profile::find($user->profile_id);
        $profile->first_name = $request->first_name;
        $profile->middle_name = $request->middle_name;
        $profile->last_name = $request->last_name;
        $profile->save();
        return redirect('/coor/profile')->with('success','Basic Information Updated!');
    }
    public function profile_signatory(){
        return view('coor.update_signatory_form');
    }
    public function profile_signatory_update(Request $request){

        if(isset(Auth::user()->profile->signatory->school_id)){
            $signatory = Signatory::where('school_id',Auth::user()->profile->signatory->school_id)->latest()->first();
            // return $signatory;
            $signatory->first_name = $request->first_name;
            $signatory->middle_name = $request->middle_name;
            $signatory->last_name = $request->last_name;
            $signatory->position = $request->position;
            $signatory->save();
            return redirect('/coor/profile')->with('success','Signatory Updated!');
        }
        else{
            $signatory = new  Signatory;
            $signatory->school_id = Auth::user()->profile->school_id;
            $signatory->first_name = $request->first_name;
            $signatory->middle_name = $request->middle_name;
            $signatory->last_name = $request->last_name;
            $signatory->position = $request->position;
            $signatory->stat = '0';
            $signatory->save();
            return redirect('/coor/profile')->with('success','Signatory Updated!');
        }


        $signatory = Signatory::where('school_id',Auth::user()->profile->signatory->school_id)->latest()->first();
        // return $signatory;
        $signatory->first_name = $request->first_name;
        $signatory->middle_name = $request->middle_name;
        $signatory->last_name = $request->last_name;
        $signatory->position = $request->position;
        $signatory->save();
        return redirect('/coor/profile')->with('success','Signatory Updated!');
    }

    public function profile_banner(){
        return view('coor.update_banner_form');
    }
    public function profile_banner_update(Request $request){

        if( $request->banner ){
            $imageName = time().'.'.$request->banner->extension();
            $request->banner->move(public_path('coor_img'), $imageName);

            $profile = Profile::find(Auth::user()->profile->id);
            $profile->banner = $imageName;
            $profile->save();

            return redirect('/coor/profile')->with('success','Profile Image Updated!');
        }


    }


    public function student_profile_form($id){
        $student = Student::find(base64_decode($id));
        return view('coor.profile_form')->with('student',$student);
     }
     public function student_profile_update($id,Request $request){
        // return dd($request);

        $student = Student::find(base64_decode($id));

        $user = User::find($student->user->id);
        $user->email = strtolower($request->email);
        $user->save();
        $student = Student::find(base64_decode($id));
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;

        $student->program = $request->program;
        $student->year = $request->year;
        $student->section = $request->section;

        $student->parent_first_name = $request->parent_first_name;
        $student->parent_middle_name = $request->parent_middle_name;
        $student->parent_last_name = $request->parent_last_name;
        $student->contact = $request->contact;
        $student->address = $request->house." ".$request->barangay.", ".$request->city.", ".$request->province;
        $student->save();
        return redirect()->back()->with('success','Basic Information Updated');
     }


    public function accounts(){
        $users = User::where('role_id',3)->get();
        
        $partners = Profile::where('school_id',Auth::user()->school_id)->get();
        $students_ojt = StudentOjt::all();
        $students = Student::all();
        // return $users;
        return view('coor.accounts')->with('users',$users)->with('partners',$partners)->with('students_ojt',$students_ojt)->with('students',$students);
    }

     public function account_archive($role,$id){
        $user =  User::find(base64_decode($id));
        if ($user->status == 'Active') {
            $user =  User::find(base64_decode($id));
            $user->status = 'Archived';
            $user->save();
            if(base64_decode($role) == 'partners') return redirect('/coor/accounts')->with('success','Archived Account Successfull: '.$user->username);
            else return redirect('/coor/accounts')->with('success','Archived Account Successfull: '.$user->username);
        }
        else{
            $user =  User::find(base64_decode($id));
            $user->status = 'Active';
            $user->save();
            if(base64_decode($role) == 'partners') return redirect('/coor/accounts')->with('success','Restore Account Successfull: '.$user->username);
            else return redirect('/coor/accounts')->with('success','Restore Account Successfull: '.$user->username);
        }
    }
    public function account_update($id,Request $request){
        // return dd($request);

        $account = User::find(base64_decode($id));

        $profile = Profile::find($account->profile->id) ;
        $profile->company_name = strtoupper($request->name);
        $profile->company_address = strtoupper($request->add);
        $profile->company_position = strtoupper($request->position);
        $profile->first_name = strtoupper($request->first_name);
        $profile->middle_name = strtoupper($request->middle_name);
        $profile->last_name = strtoupper($request->last_name);
        $profile->save();

        $user =  User::find(base64_decode($id));
        $user->email = $request->email;
        $user->save();
        return redirect('/coor/accounts')->with('success','Updated Account: '.$user->username);
    }

    public function account_form(){
        return view('coor.account_form');
    }
    public function account_form_update($id){
        $account = User::find(base64_decode($id));
        return view('coor.account_form_update')->with('account',$account);
    }
    public function account_save(Request $request){
            // return dd($request);
            $profile = new Profile;
            $profile->school_id = Auth::user()->profile->school_id;
            $profile->company_name = strtoupper($request->name);
            $profile->company_address = strtoupper($request->add);
            $profile->company_position = strtoupper($request->position);
            $profile->first_name = strtoupper($request->first_name);
            $profile->middle_name = strtoupper($request->middle_name);
            $profile->last_name = strtoupper($request->last_name);
            $profile->save();

            $user = new User;
            $user->role_id = '3';
            $user->profile_id = $profile->id;
            $user->student_id = '0';
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = md5($request->username);
            $user->status = 'Active';
            $user->stat = '0';
            $user->save();

            $details = [
                'username' => $user->username,
                'password' => $user->username
            ];
            Mail::to($user->email)->send(new MailNewAcc($details));

            return redirect('/coor/accounts')->with('success','New Account Created: '.$user->username);
    }

    public function evaluation_view($id){
        $student = Student::find(base64_decode($id));
        $ojt = StudentOjt::where('student_id',$student->id)->first();
        $evaluation = StudentEvaluation::where('student_id',$student->id)->first();
        // return $ojt;
        return view('coor.evaluation_view')->with('evaluation',$evaluation)->with('ojt',$ojt)->with('student',$student);
    }

    public function evaluation_view_print($id){
        $student = Student::find(base64_decode($id));
        $ojt = StudentOjt::where('student_id',$student->id)->first();
        $evaluation = StudentEvaluation::where('student_id',$student->id)->first();
        // return $ojt;
        return view('coor.evaluation_view_report')->with('evaluation',$evaluation)->with('ojt',$ojt)->with('student',$student);
    }

    public function accomplishment_view($id){
        $student = Student::find(base64_decode($id));
        $accomplishments = StudentAccomplishment::where('student_id',$student->id)->get();
        return view('coor.accomplishment_view')->with('accomplishments',$accomplishments)->with('student',$student);
    }

    public function student_profile($id){
        $student  = Student::find(base64_decode($id));
        return view('coor.profile')
            ->with('student',$student )
        ;
    }
}