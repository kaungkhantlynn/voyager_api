<?php

namespace App\Http\Controllers\
Api;

use Illuminate\Http\Request;
use App\Division;
use App\School;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getDivisions(){
        $divisions = Division::where('is_state',false)
                    ->orderBy('name','asc')->get();

        return response()->json($divisions);            
    }

    public function getSchoolsByDivision($division_id){
       
        // $schools = School::where('division_id',$division_id)
        //             ->orderBy('result','desc')
        //             ->paginate(10);
        //             return response()->json($schools);  

        $division = Division::find($division_id);
        $schools = $division->schools()->orderBy('result','desc')->get();

        return response()->json($schools);  
    }

    public function getSchool($id){
        // $school = School::with('division')->findSchool($id);
        // $school = School::findSchool($id);
        $school = School::find($id);

        return response()->json($school);  

    }

    public function getSchoolsByResultRange(Request $request){
        $schools = School::whereBetween('result',[$request->start,$request->end])->get();
        return response()->json($schools);  

    }
}
