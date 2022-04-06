<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\total_history;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use Carbon\Carbon;

class UserReportsController extends Controller
{  

    public function list_period()
    {
      
         $data = Document::where('id','0')->paginate(25);
        $total_files = Document::where('status','active')->count('number_of_image');
        $number_of_image = Document::where('status','active')->sum('number_of_image');
        $from = null;
        $to = null;
       

     // return   $total_files = Document::where('user_id',auth()->user()->id)->whereYear('created_at',$selected_year)->where('status','active')->count('doc_numbers');

          // $number_of_image = Document::where('user_id',auth()->user()->id)->whereYear('created_at',$selected_year)->where('status','active')->sum('number_of_image');

      
       
        return view('reports.user.reports_period', compact( 'data','from','to','total_files','number_of_image'));
    }

    public function search_period(Request $request){

        $data = $this->validate(\request(),
        [
            'from_date' => 'required',
            'to_date' => 'required|after:from_date'
        ]);
       $from = $request->from_date;
       $to = $request->to_date;
       $mytime = Carbon::now();
        $selected_year = Carbon::now()->year ;
        $selected_month = Carbon::now()->month ;
        $total_files = Document::where('user_id',auth()->user()->id)
                        ->where('created_at', '>=', $from)
                        ->where('created_at', '<=', $to)
                        ->where('status','active')
                        ->count('doc_numbers');
        $number_of_image = Document::where('status','active')->sum('number_of_image');

        $data = Document::where('user_id',auth()->user()->id)
                        ->where('created_at', '>=', $from)
                        ->where('created_at', '<=', $to)
                        ->where('status','active')
                        ->paginate(25);

        return view('reports.user.reports_period', compact( 'data' , 'total_files' ,'from','to','number_of_image'));
    }

    public function list_monthly(){
        $mytime = Carbon::now();
        $selected_year = Carbon::now()->year ;
        $selected_month = Carbon::now()->month ;
        $total_files = Document::where('user_id',auth()->user()->id)
                        ->whereMonth('created_at',$selected_month)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->count('doc_numbers');
         $number_of_image = Document::where('user_id',auth()->user()->id)->whereMonth('created_at',$selected_month)->where('status','active')->sum('number_of_image');

        $data = Document::where('user_id',auth()->user()->id)
                        ->whereMonth('created_at',$selected_month)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->paginate(25);

        return view('reports.user.reports_monthly', compact( 'data','selected_year','selected_month','total_files','number_of_image'));
    }

    public function search_monthly(Request $request){
        $mytime = Carbon::now();
        $selected_year = $request->year;
        $selected_month = $request->month;

        $total_files = Document::where('user_id',auth()->user()->id)
                        ->whereMonth('created_at',$selected_month)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->count('doc_numbers');
      $number_of_image = Document::where('user_id',auth()->user()->id)->whereMonth('created_at',$selected_month)->where('status','active')->sum('number_of_image');

        $data = Document::where('user_id',auth()->user()->id)
                        ->whereMonth('created_at',$selected_month)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->paginate(25);

        return view('reports.user.reports_monthly',  compact( 'data' , 'selected_year','selected_month','total_files','number_of_image' ));
    }


    public function list_yearly()
    {

        $mytime = Carbon::now();
         $selected_year = Carbon::now()->year ;

         $total_files = Document::where('user_id',auth()->user()->id)->whereYear('created_at',$selected_year)->where('status','active')->count('doc_numbers');

           $number_of_image = Document::where('user_id',auth()->user()->id)->whereYear('created_at',$selected_year)->where('status','active')->sum('number_of_image');


         $data = Document::where('user_id',auth()->user()->id)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->select(DB::raw(
                            'count(doc_numbers) as count_doc_numbers , MONTH(created_at) month,sum(number_of_image) as sum_number_of_image'))
                        
                        ->groupBy('month')
                        ->paginate(25);

        return view('reports.user.reports_yearly', compact( 'data' , 'selected_year','total_files','number_of_image' ));
    }   

    public function search_yearly(Request $request){
        $mytime = Carbon::now();
        $selected_year = $request->year;
        $id= null ;

        $total_files = Document::where('user_id',auth()->user()->id)->whereYear('created_at',$selected_year)->where('status','active')->count('doc_numbers');
          $number_of_image = Document::where('user_id',auth()->user()->id)->whereYear('created_at',$selected_year)->where('status','active')->sum('number_of_image');

        $data = Document::where('user_id',auth()->user()->id)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->select(DB::raw(
                            'count(doc_numbers) as count_doc_numbers , MONTH(created_at) month,sum(number_of_image) as sum_number_of_image'))
                        
                        ->groupBy('month')
                        ->paginate(25);

        return view('reports.user.reports_yearly',compact( 'data' , 'selected_year','total_files','number_of_image' ));
    }

  
}   