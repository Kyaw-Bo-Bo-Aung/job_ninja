<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeekerProfile;
use App\Models\EducationDetail;

class ProfileController extends Controller
{
    public function index(){
        return view('job_seeker.index');
    }

    public function setting(){
        return view('job_seeker.profile_setting');
    }

    public function create(){
        return view('job_seeker.create');
    }

    public function store(Request $request){
        $request->validate([
            'fname' => ['required', 'min:2', 'max:225'],
            'lname' => ['required', 'min:2', 'max:225'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:2', 'max:20'],
            'cposition' => ['required', 'min:2', 'max:225'],
            'photo' => ['image']
        ]);
        
        $profile = SeekerProfile::firstOrNew(['user_id' => auth()->user()->id]);
        $profile->fname = $request->fname;
        $profile->lname = $request->lname;
        $profile->current_position = $request->cposition;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->photo = 'photo';
        $profile->user_id = auth()->user()->id;
        $profile->save();

        return redirect()->route('profile.education-info-create');
    }

    public function createEdu(){
        return view('job_seeker.create-edu');
    }

    public function storeEdu(Request $request){
        $certificate_degree_names = $request->certificate_degree_name;
        $institute_university_names = $request->institute_university_name;
        $starting_dates = $request->starting_date;
        $completion_dates = $request->completion_date;

        foreach($certificate_degree_names as $key => $val){
            EducationDetail::firstOrCreate([
                'certificate_degree_name' => $certificate_degree_names[$key],
                'institute_university_name' => $institute_university_names[$key],
                'starting_date' => $starting_dates[$key],
                'completion_date' => $completion_dates[$key],
                'seeker_profile_id' => auth()->user()->profile->id
            ]);
        }

        echo "success";
    }
}
