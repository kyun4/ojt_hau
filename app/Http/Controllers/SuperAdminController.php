<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcademicYear;
use App\School;
use App\Profile;
use App\User;
use App\Student;
use Mail;
use App\Mail\MailPass;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function academic_year(){
        $acads = AcademicYear::latest()->first();
        return view('admin.academic_year_list')->with('acads',$acads);
    }
    public function academic_year_form(){
        $acads = AcademicYear::latest()->first();
        return view('admin.academic_year_form')->with('acads',$acads);
    }
    public function academic_year_save(Request $request){
        $acad = new AcademicYear;
        $acad->academic_year = $request->a_year;
        $acad->semester = $request->sem;
        $acad->save();
        return redirect('/admin/academic/year/list')->with('success','Acadmic Year and Semester Updated');
    }
    public function school(){
        $schools = School::all();
        return view('admin.school_list')->with('schools',$schools);
    }
    public function school_form(){
        return view('admin.school_form');
    }
    public function school_save(Request $request){
        $school = new School;

        $internship_duration = $request->internship_duration.':00:00';

        $school->school = strtoupper($request->school);
        $school->internship_duration = $internship_duration;
        $school->status = "Active";
        $school->save();
        return redirect('/admin/school/list')->with('success','School Added: '.$school->school);
    }

    public function school_update_form($id){
        $school = School::find(base64_decode($id));
        return view('admin.school_up_form')->with('school',$school);
    }
    public function school_update($id,Request $request){

        $school = School::find(base64_decode($id));

        $internship_duration = $request->internship_duration.':00:00';

        $school->school = strtoupper($request->school);
        $school->internship_duration = $internship_duration;
        $school->save();
        return redirect('/admin/school/list')->with('success','School Updated: '.$school->school);
    }
    public function accounts(){
        $accounts = User::where('role_id','2')->get();
        return view('admin.account_list')->with('accounts',$accounts);
    }
    public function account_form(){
        $schools = School::all();
        return view('admin.account_form')->with('schools',$schools);
    }
    public function account_form_update($id){
        $schools = School::all();
        $account = User::find(base64_decode($id));
        return view('admin.account_form_update')->with('account',$account)->with('schools',$schools);
    }
    public function account_save(Request $request){
        // return dd($request);
        $profile = new Profile;
        $profile->school_id = $request->school_id;
        $profile->last_name = strtoupper($request->last_name);
        $profile->first_name = strtoupper($request->first_name);
        $profile->middle_name = strtoupper($request->middle_name);
        $profile->save();

        $user = new User;
        $user->role_id = '2';
        $user->profile_id = $profile->id;
        $user->student_id = '0';
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = md5($request->username);
        $user->status = 'Active';
        $user->stat = '0';
        $user->save();
        return redirect('/admin/accounts/coordinators')->with('success','New Account Created: '.$user->username);
    }
     public function account_update($id,Request $request){
        // return dd($request);

        $account = User::find(base64_decode($id));

        $profile = Profile::find($account->profile->id) ;
        $profile->school_id = $request->school_id;
        $profile->last_name = strtoupper($request->last_name);
        $profile->first_name = strtoupper($request->first_name);
        $profile->middle_name = strtoupper($request->middle_name);
        $profile->save();

        $user =  User::find(base64_decode($id));
        $user->role_id = '2';
        $user->profile_id = $profile->id;
        $user->student_id = '0';
        $user->username = $request->username;
        // $user->password = md5($request->username);
        $user->status = 'Active';
        $user->stat = '0';
        $user->save();
        return redirect('/admin/accounts/coordinators')->with('success','Updated Account: '.$user->username);
    }
    public function account_archive($id){

        $user =  User::find(base64_decode($id));
        if ($user->status == 'Active') {
            $user =  User::find(base64_decode($id));
            $user->status = 'Archived';
            $user->save();
            return redirect('/admin/accounts/coordinators')->with('success','Archived Account Successfull: '.$user->username);
        }
        else{
            $user =  User::find(base64_decode($id));
            $user->status = 'Active';
            $user->save();
            return redirect('/admin/accounts/coordinators')->with('success','Restore Account Successfull: '.$user->username);
        }
    }
    public function password_reset($id){

        $user = User::find(base64_decode($id));
        $details = [
            'username' => $user->username,
            'password' => $user->username
        ];
        Mail::to($user->email)->send(new MailPass($details));
        // dd("Email is Sent.");
        $user = User::find(base64_decode($id));
        $user->password = md5($user->username);
        $user->save();
        return redirect('/admin/accounts/coordinators')->with('success','Password Reset on Student Username: '.$user->username);
    }
    public function school_archive($id){

        $school =  School::find(base64_decode($id));
        if ($school->status == 'Active') {
            $school =  School::find(base64_decode($id));
            $school->status = 'Archived';
            $school->save();
            return redirect('/admin/school/list')->with('success','Archived School Successfull: '.$school->username);
        }
        else{
            $school =  School::find(base64_decode($id));
            $school->status = 'Active';
            $school->save();
            return redirect('/admin/school/list')->with('success','Restore School Successfull: '.$school->username);
        }
    }


    public function dashboard(){
        $users = User::all();
        $students = User::all()->pluck('student_id');
        $students_unreg = Student::whereNotIn('id',$students)->get();
        $schools = School::all();
        // return $students_unreg;
        return view('admin.dashboard')->with('users',$users)->with('students_unreg',$students_unreg)->with('schools',$schools);
    }

    public function profile(){
        // $users = User::all();
        // $students = User::all()->pluck('student_id');
        // $students_unreg = Student::whereNotIn('id',$students)->get();
        // return $students_unreg;
        // return view('admin.profile')->with('users',$users)->with('students_unreg',$students_unreg);
        $student = auth()->user(); // Retrieve the authenticated user

        return view('admin.profile')->with('student', $student);
    }

    public function profile_basic(){
        return view('admin.update_basic_form');
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
        return redirect('/admin/profile')->with('success','Basic Information Updated!');
    }

    public function profile_banner(){
        return view('admin.update_banner_form');
    }
    public function profile_banner_update(Request $request){

        if( $request->banner ){
            $imageName = time().'.'.$request->banner->extension();
            $request->banner->move(public_path('admin/img/'), $imageName);

            $profile = Profile::find(Auth::user()->profile->id);
            $profile->banner = $imageName;
            $profile->save();

            return redirect('/admin/profile')->with('success','Profile Image Updated!');
        }


    }
}
