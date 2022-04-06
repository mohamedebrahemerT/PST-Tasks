<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\total_history;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use Carbon\Carbon;
use App\Models\City;

class SuperAdminReportsController extends Controller
{ 
    public function list_period()
    {
        
        $data = Document::where('id','0')->paginate(25);
        $total_files = Document::where('status','active')->count('doc_numbers');
         $number_of_image = Document::where('status','active')->sum('number_of_image');
        $from = null;
       $to = null;
return view('reports.super_admin.reports_period', compact( 'data','total_files','from','to','number_of_image'));
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
        $total_files = Document::where('date', '>=', $from)
                        ->where('date', '<=', $to)
                        ->where('status','active')
                        ->count('doc_numbers');
        $number_of_image = Document::where('date', '>=', $from)
                        ->where('date', '<=', $to)
                        ->where('status','active')
                        ->sum('number_of_image');

        $data = Document::where('date', '>=', $from)
                        ->where('date', '<=', $to)
                        ->where('status','active')
                        ->orderBy('created_at','desc')
                        ->paginate(25);
        return view('reports.super_admin.reports_period', compact( 'data' ,'from','to','total_files','number_of_image'));
    }

    public function list_user_period(){
        $data = Document::where('id','0')->paginate(25);
        $total_files = Document::where('status','active')->count('number_of_image');
         $number_of_image = Document::where('status','active')->sum('number_of_image');
        $from = null;
        $to = null;
        $user_id = 0 ;
        $user_data = User::where('parent_id',auth()->user()->id)->pluck('name','id');
        return view('reports.super_admin.reports_period_with_user', compact( 'data','from','to','user_data','user_id','total_files','number_of_image'));
    }


    public function search_user_period(Request $request){
        $user_id = $request->user_id;
        $from = $request->from_date;
        $to = $request->to_date;
        $mytime = Carbon::now();
        $selected_year = Carbon::now()->year ;
        $selected_month = Carbon::now()->month ;

         if($request->user_id !=null && $request->from_date ==null &&$request->to_date == null){
             $data = $this->validate(\request(),
            [
                'user_id' =>'required'
            ]);
            $total_files = Document::where('user_id',$user_id)
                        ->where('status','active')
                        ->count('doc_numbers');
            $number_of_image = number_of_image::where('status','active')->sum('number_of_image');

            $data = Document::where('user_id',$user_id)
                        ->where('status','active')
                        ->orderBy('created_at','desc')
                        ->paginate(25);

         }else{
            $data = $this->validate(\request(),
            [
                'from_date' => 'required',
                'to_date' => 'required|after:from_date',
                'user_id' =>'required'
            ]);

            $total_files = Document::where('user_id',$user_id)
                        ->where('parent_id',auth()->user()->id)
                        ->where('date', '>=', $from)
                        ->where('date', '<=', $to)
                        ->where('status','active')
                        ->count('doc_numbers');
           $number_of_image = number_of_image::where('status','active')->sum('number_of_image');
            $data = Document::where('user_id',$user_id)
                        ->where('parent_id',auth()->user()->id)
                        ->where('date', '>=', $from)
                        ->where('date', '<=', $to)
                        ->where('status','active')
                        ->orderBy('date','desc')
                        ->paginate(25);
         }
        $user_data = User::where('parent_id',auth()->user()->id)->pluck('name','id');
        return view('reports.super_admin.reports_period_with_user', compact( 'data' , 'total_files' ,'from','to','user_data','user_id','number_of_image'));
    }

    

    public function list_monthly()
    {
        $mytime = Carbon::now();
        $selected_year = Carbon::now()->year ;
        $selected_month = Carbon::now()->month ;
        $total_files = Document::whereMonth('created_at',$selected_month)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->count('doc_numbers');
    $number_of_image = Document::whereMonth('created_at',$selected_month)->where('status','active')->sum('number_of_image');


        $data = Document::whereMonth('created_at',$selected_month)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->orderBy('created_at','desc')
                        ->paginate(25);

        return view('reports.super_admin.reports_monthly', compact( 'data' , 'selected_year','selected_month','total_files','number_of_image' ));
    }

    public function search_monthly(Request $request){
        $mytime = Carbon::now();
        $selected_year = $request->year;
        $selected_month = $request->month;

        $total_files = Document::whereMonth('created_at',$selected_month)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->count('doc_numbers');
 $number_of_image = Document::whereMonth('created_at',$selected_month)->where('status','active')->sum('number_of_image');        

        $data = Document::whereMonth('created_at',$selected_month)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->orderBy('created_at','desc')
                        ->paginate(25);

        return view('reports.super_admin.reports_monthly',  compact( 'data' , 'selected_year','selected_month','total_files' ,'number_of_image'));
    }


    public function list_yearly(){
        $mytime = Carbon::now();
        $selected_year = Carbon::now()->year ;
        
        $total_files = Document::whereYear('created_at',$selected_year)->where('status','active')->count('doc_numbers');

        $number_of_image = Document::whereYear('created_at',$selected_year)->where('status','active')->sum('number_of_image');

        $data = Document::whereYear('created_at',$selected_year)
                        ->where('status','active')
                      ->select(DB::raw(
                            'count(doc_numbers) as count_doc_numbers , MONTH(created_at) month,sum(number_of_image) as sum_number_of_image'))
                        
                        ->groupBy('month')
                        ->orderBy('created_at','desc')
                        ->paginate(25);

        return view('reports.super_admin.reports_yearly', compact( 'data' , 'selected_year','total_files','number_of_image' ));
    }   

    public function search_yearly(Request $request){
        $mytime = Carbon::now();
        $selected_year = $request->year;
        $id= null ;
        $total_files = Document::whereYear('created_at',$selected_year)->where('status','active')->count('doc_numbers');

        $number_of_image = Document::whereYear('created_at',$selected_year)->where('status','active')->sum('number_of_image');

        $data = Document::whereYear('created_at',$selected_year)
                        ->where('status','active')
                       ->select(DB::raw(
                            'count(doc_numbers) as count_doc_numbers , MONTH(created_at) month,sum(number_of_image) as sum_number_of_image'))
                        
                        ->groupBy('month')
                        ->orderBy('created_at','desc')
                        ->paginate(25);

        return view('reports.super_admin.reports_yearly',  compact( 'data' , 'selected_year','total_files' ,'number_of_image'));
    }
    public function month_details(Request $request,$month,$year){
        $mytime = Carbon::now();
        $selected_year = $year;
        $selected_month = $month;
        $total_files = Document::whereMonth('created_at',$selected_month)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->count('doc_numbers');
          $number_of_image = Document::whereMonth('created_at',$selected_month)->where('status','active')->sum('number_of_image');
             
        $data = Document::whereMonth('created_at',$selected_month)
                        ->whereYear('created_at',$selected_year)
                        ->where('status','active')
                        ->orderBy('created_at','desc')
                        ->paginate(25);
        return view('reports.super_admin.month_details',  compact( 'data' , 'selected_year','selected_month','total_files','number_of_image' ));
    }


    public function citiesreport ()
    {

         $cities = City::orderBy('name_ar','asc')->paginate(10);
        
        return view('reports.super_admin.citiesreport',compact('cities')); 
    }

    public function Graphdisplay($id)
    {

          
 $city = City::where('id',$id)->first();



             $data = Document::where('city_id',$id)
                        ->where('status','active')
                       ->select(DB::raw(
                            'count(doc_numbers) as count_doc_numbers , MONTH(created_at) month,sum(number_of_image) as sum_number_of_image'))
                        
                        ->groupBy('month')
                        ->orderBy('created_at','desc')
                        ->first();

                    if ($data)
                     {
                          $count_doc_numbersval =$data['count_doc_numbers'];
                   $number_of_imageval=$data['sum_number_of_image'];

 $total_filesR =$data['count_doc_numbers'];
                   $number_of_imageR=$data['sum_number_of_image'];
 

                   




                   $count_doc_numbers[] = null ;

                   $count_doc_numbers[0] = $count_doc_numbersval ;
                  

              $count_doc_numbers = json_encode($count_doc_numbers);

            //////////////

             $number_of_image[] = null ;

                   $number_of_image[0] = $number_of_imageval ;
                   

            $number_of_image = json_encode($number_of_image);
         

             $users = User::where('city_id',$id)->get();

            $cityarr[] = null ;

            foreach ($users as $key => $user) 
            {
                $cityarr[$key] = $user->name ;
                 
            }


                   
                   

              $cityarr = json_encode($cityarr);


                    }
                    else
                    {
session()->flash('danger', trans('admin.nodata'));
            return back();

                    }


                

  
       
        return view('reports.super_admin.Graphdisplay',compact('count_doc_numbers','number_of_image','city','cityarr','total_filesR','number_of_imageR')); 
         
    }

    
}   