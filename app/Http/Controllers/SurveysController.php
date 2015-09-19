<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SurveyUserInfoRequest;

use App\EducationalAttainment;
use App\ProfessionalExamPassed;
use App\TrainingOrAdvancedStudy;
use App\EmploymentData;
use App\Survey;
use App\Profile;

use Auth;

class SurveysController extends Controller
{

    public function __construct(){
    
        $this->middleware('auth');
            
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('survey.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if ($id == 1) {

            return view('survey.index');

        } else if ($id == 2) {

            return view('survey.educational_background.educational_attainment');
            
        } else if ($id == 3) {

            return view('survey.educational_background.professional_exams_passed');
            
        } else if ($id == 4) {

            return view('survey.training_or_advanced_studies.index');
            
        } else if ($id == 5) {

            return view('survey.employment_data.index');

        }
    }


    public function save_profile(SurveyUserInfoRequest $request){

        if (!Auth::user()->profile()->first()) {
    
            Auth::user()->profile()->create($request->all());

        }

        return redirect('survey/2');
            
    }


    public function store_educational_attainments(Request $request, $num){

        $request_data = $request->all();

        for ($i = 1; $i <= $num; $i++) {

            $request_data['degree'] = $request_data['degree_'.$i];
            unset($request_data['degree_'.$i]);

            $request_data['college_or_university'] = $request_data['college_or_university_'.$i];
            unset($request_data['college_or_university_'.$i]);

            $request_data['year_graduated'] = $request_data['year_graduated_'.$i];
            unset($request_data['year_graduated_'.$i]);

            $request_data['honors_or_awards'] = $request_data['honors_or_awards_'.$i];
            unset($request_data['honors_or_awards_'.$i]);

            $educational_attainment = new EducationalAttainment($request_data);

            $educational_attainment->department()->associate(Auth::user()->department);

            Auth::user()->educational_attainments()->save($educational_attainment);

        }

        return redirect('survey/3');
                
    }    


    public function store_professional_exams_passed(Request $request, $num){
    
        $request_data = $request->all();

        for ($i = 1; $i <= $num; $i++) {


            $request_data['name_of_exam'] = $request_data['name_of_exam_'.$i];
            unset($request_data['name_of_exam_'.$i]);

            $request_data['date_taken'] = $request_data['date_taken_'.$i];
            unset($request_data['date_taken_'.$i]);

            $request_data['rating'] = $request_data['rating_'.$i];
            unset($request_data['rating_'.$i]);

            $professional_exam_passed = new ProfessionalExamPassed($request_data);

            $professional_exam_passed->department()->associate(Auth::user()->department);

            Auth::user()->professional_exams_passed()->save($professional_exam_passed);
            
    
        }

        return redirect('survey/4');

    }


    public function store_trainings_or_studies(Request $request, $num){
    
        $request_data = $request->all();

        for ($i = 1; $i <= $num; $i++) {


            $request_data['training_or_advanced_study'] = $request_data['training_or_advanced_study_'.$i];
            unset($request_data['training_or_advanced_study_'.$i]);

            $request_data['duration'] = $request_data['duration_'.$i];
            unset($request_data['duration_'.$i]);

            $request_data['institution'] = $request_data['institution_'.$i];
            unset($request_data['institution_'.$i]);

            $training_or_advanced_study = new TrainingOrAdvancedStudy($request_data);

            $training_or_advanced_study->department()->associate(Auth::user()->department);

            Auth::user()->training_or_advanced_studies()->save($training_or_advanced_study);
            
    
        }

        return redirect('survey/5');
            
    }


    public function store_employment_data(Request $request, $is_employed){
    
        if ($is_employed === 'no') {

            $request_data = $request->all();

                $temp = $request_data["reasons_not_yet_employed"];

                $i = null;

                for ($x = 0; $x < count($temp); $x++) {

                    $i .= $x === 0 ? $temp[$x] : ','.$temp[$x] ;   

                }

                $request_data["reasons_not_yet_employed"] = $i;
                
            $employment_data = new EmploymentData($request_data);

            $employment_data->department()->associate(Auth::user()->department);

            Auth::user()->employment_data()->save($employment_data);

        } else {

            $request_data = $request->except('reasons_not_yet_employed','reasons_not_yet_employed_others');

                /*if ($request_data['is_first_job'] === 'no') {

                    $temp = $request_data["reasons_for_changing_job"];

                    $i = null;

                    for ($x = 0; $x < count($temp); $x++) {

                        $i .= $x === 0 ? $temp[$x] : ','.$temp[$x] ;   

                    }

                    $request_data["reasons_for_changing_job"] = $i;

                }*/

            $employment_data = new EmploymentData($request_data);

            $employment_data->department()->associate(Auth::user()->department);

            Auth::user()->employment_data()->save($employment_data);

        }

        return redirect('articles');
            
    }



    public function edit_employment_data(){
    
        $employment_data = Auth::user()->employment_data;

        return view('profiles.edit_employment_data',compact('employment_data'));
            
    }


    public function update_employment_data(Request $request, $id){
    

        $request_data = $request->all();

            /*if ($request_data['is_first_job'] === 'no') {

                $temp = $request_data["reasons_for_changing_job"];

                $i = null;

                for ($x = 0; $x < count($temp); $x++) {

                    $i .= $x === 0 ? $temp[$x] : ','.$temp[$x] ;   

                }

                $request_data["reasons_for_changing_job"] = $i;

            }*/

        //Set to empty
        $request_data["reasons_not_yet_employed"] = '';
        $employment_data = EmploymentData::findOrFail($id);
        $employment_data->update($request_data);

        return redirect('profiles');
            
    }



    public function list_survey(){
    
        $educational_attainments = EducationalAttainment::paginate(20);
        $professional_exams_passed = ProfessionalExamPassed::paginate(20);
        $training_or_advanced_studies = TrainingOrAdvancedStudy::paginate(20);
        $employment_data = EmploymentData::paginate(20);

        return view('survey.list',compact('educational_attainments','professional_exams_passed','training_or_advanced_studies','employment_data'));
            
    }


    public function filter($department_id){

        if ($department_id === '0') {

            $educational_attainments = EducationalAttainment::paginate(20);
            $professional_exams_passed = ProfessionalExamPassed::paginate(20);
            $training_or_advanced_studies = TrainingOrAdvancedStudy::paginate(20);
            $employment_data = EmploymentData::paginate(20);

        } else {
    
            $educational_attainments = EducationalAttainment::where('department_id',$department_id)->paginate(20);
            $professional_exams_passed = ProfessionalExamPassed::where('department_id',$department_id)->paginate(20);
            $training_or_advanced_studies = TrainingOrAdvancedStudy::where('department_id',$department_id)->paginate(20);
            $employment_data = EmploymentData::where('department_id',$department_id)->paginate(20);

        }

        return view('survey.includes.survey_list',compact('educational_attainments','professional_exams_passed','training_or_advanced_studies','employment_data'));
            
    }

}
