<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Employee;
use DB;
use Carbon\Carbon;

class CaptureController extends Controller
{
  public function insert(Request $request){
          $rules = [
        'temp' => 'required|numeric|required|between:0,99.99',
          ];
          $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
            return redirect('home')
            ->withInput()
            ->withErrors($validator);
      }
      else{
              $data = $request->input();
              try{
                $works_number = Auth::user()->works_number;
                $day = Carbon::now()->dayOfWeek;
                $visited = DB::select("SELECT * FROM employees WHERE works_number = ? AND week_day = ?",[$works_number,$day]);

                if(!empty($visited)){
                  return redirect()->back()->with('error_message', 'Temparature Already Captured Today');
                }
                $employee = new Employee;
                $employee->temp = $data['temp'];
                $employee->works_number = Auth::user()->works_number;
                $employee->week_day = Carbon::now()->dayOfWeek;
                $employee->save();
                echo "<script>alert('Temparature Captured Successfully')</script>";
                //return redirect('home')->with('status',"Insert successfully");
                return redirect()->back()->with('message', 'Temparature Captured Successfully');
        }
        catch(Exception $e){
          //return redirect('home')->with('failed',"operation failed");
          return Redirect::back()->withErrors(['msg', $e->getMessage()]);
        }
      }
  }
}
