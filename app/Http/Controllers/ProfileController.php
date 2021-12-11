<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeekerProfile;
use App\Models\EducationDetail;
use App\Models\ExperienceDetail;

class ProfileController extends Controller
{
    private function isInputFieldEmpty($input_fields){
        return count($input_fields) <= 1;
    }

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
        if($this->isInputFieldEmpty($request->all())){ 
            return redirect()->route('profile.education-info-create')
                            ->withErrors(['empty_input' => 'We recommend you to fill your education informations.']);
        }
        
        $certificate_degree_names = $request->certificate_degree_name;
        $institute_university_names = $request->institute_university_name;
        $starting_dates = $request->starting_date;
        $completion_dates = $request->completion_date;

        foreach($certificate_degree_names as $key => $val){
        $profile = 
            EducationDetail::firstOrCreate(
            [
                'certificate_degree_name' => $certificate_degree_names[$key],
                'institute_university_name' => $institute_university_names[$key],
                'seeker_profile_id' => auth()->user()->profile->id
            ],
            [
                'starting_date' => $starting_dates[$key],
                'completion_date' => $completion_dates[$key]
            ]);
        }

        return redirect()->route('profile.experience-info-create');
    }

    public function editEdu(EducationDetail $education_detail){
        return view('job_seeker.edit-edu', compact('education_detail'));
    }

    public function updateEdu(Request $request,EducationDetail $education_detail){
        $education_detail->certificate_degree_name = $request->certificate_degree_name;
        $education_detail->institute_university_name = $request->institute_university_name;
        $education_detail->starting_date = $request->starting_date;
        $education_detail->completion_date = $request->completion_date;
        $education_detail->update();

        return redirect()->route('profile.education-info-create');        
    }

    public function deleteEdu(EducationDetail $education_detail){
        $education_detail->delete();
        return redirect()->route('profile.education-info-create');
    }


    public function createExp() {
        return view('job_seeker.create-exp');
    }

    public function storeExp(Request $request) {
        $job_titles = $request->job_title;
        $company_names = $request->company_name;
        $job_locations = $request->job_location;
        $start_dates = $request->start_date;
        $end_dates = $request->end_date;
        $descriptions = $request->description;

        foreach($job_titles as $key => $val){
            ExperienceDetail::firstOrCreate(
            [ 
                'start_date' => $start_dates[$key],
                'end_date' => $end_dates[$key]
            ],
            [
                'job_title' => $job_titles[$key],
                'company_name' => $company_names[$key],
                'job_location' => $job_locations[$key],
                'description' => $descriptions[$key],
                'seeker_profile_id' => auth()->user()->profile->id
            ]);
        }

        echo "success";
    }
}
