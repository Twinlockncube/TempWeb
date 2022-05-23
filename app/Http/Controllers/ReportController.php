<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class ReportController extends Controller
{

    public function fetch(Request $request){
        $data = $request->input();
        $date = $data['end_date'];
        $users = DB::select(
          "SELECT u.surname,u.name,e.works_number,
                GROUP_CONCAT( if(e.week_day=1,temp,NULL) ) AS 'Mon',
                GROUP_CONCAT( if(e.week_day=2,temp,NULL) ) AS 'Tue',
                GROUP_CONCAT( if(e.week_day=3,temp,NULL) ) AS 'Wed',
                GROUP_CONCAT( if(e.week_day=4,temp,NULL) ) AS 'Thu',
                GROUP_CONCAT( if(e.week_day=5,temp,NULL) ) AS 'Fri'
           FROM employees e LEFT JOIN users u ON u.works_number = e.works_number
           WHERE e.created_at BETWEEN DATE_SUB(?,INTERVAL 4 DAY)
           AND DATE_ADD(?,INTERVAL 1 DAY) GROUP BY e.works_number ORDER BY u.surname ASC",[$date,$date]
          );
        return view('report_view',['users'=>$users,'end_date'=>$date]);
    }

}
