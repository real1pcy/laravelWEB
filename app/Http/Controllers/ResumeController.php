<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use App\Models\Specialties;

use App\Models\Resumes;
use App\Models\Students;


class ResumeController extends Controller
{
    public function index(){
         $resumes = Resumes::where('student_id',1)->get();
         $student = Students::findOrFail(1);
         $specialties = DB::table('specialties')->get();
        return view('resumes.index',['resumes'=>$resumes,'specialties'=>$specialties, 'student'=>$student]);   
    }


    public function create(){
        $specialties = DB::table('specialties')->orderBy('name','asc')->get();
          
       return view('resumes.create',['specs'=>$specialties]);   
   }

   public function store(){


        $resume=new Resumes();
        $resume->full_name=request('full_name');
        $resume->email=request('email');
        $resume->phone_number=request('phone_number');
        $resume->url_portfolio=request('url_portfolio');
        $resume->spec_id=request('spec_id');
        $resume->salary=request('salary');
        $resume->description=request('description');
        $resume->view_count=0;
        $resume->resume_text=request('description');

        $resume->student_id=1;
    
        $resume->save();
        error_log($resume);
        return redirect('/resume');   
    }

    public function show($id){
        $resume = Resumes::findOrFail($id);
        $specialties = DB::table('specialties')->get();
       return view('resumes.show',['resume'=>$resume,'specialties'=>$specialties]);   
    }

    public function destroy($id){
        $resume = Resumes::findOrFail($id);

        $resume->delete();
       return redirect('/resume');   
    }

    public function update(){

        $resume = Resumes::find(request('id'));
        
        $resume->full_name=request('full_name');
        $resume->email=request('email');
        $resume->phone_number=request('phone_number');
        $resume->url_portfolio=request('url_portfolio');
        $resume->spec_id=request('spec_id');
        $resume->salary=request('salary');
        $resume->description=request('description');
        $resume->view_count=0;
        $resume->resume_text=request('description');

      //  $resume->student_id=1;
      //  
    
        $resume->save();
        error_log($resume);
        return redirect('/resume');   
    }
}
