<?php

namespace App\Http\Controllers;
USE App\Models\User;
use Illuminate\Http\Request;

class userscontroller extends Controller
{
       public function index()
    {
    	
    	  $users = User::get();
    	return view('layout.users',compact('users'));
    }

public function show()
    {
        //
    }

    public function create()
    {
  
    	
    return view('layout.addusers');
    }


     public function store(Request $request)
    {
            
        $name= request('name');
        $email= request('email');
        $address= request('address');
        $phonenumber= request('phonenumber');
        $type= request('type');
        $password= request('password');
        $gender= request('gender');

        $jobtitle_ar= request('jobtitle_ar');
        $jobtitle_en= request('jobtitle_en');
        $status= request('status');

       if ($request->photo) 
       {
          $photo = time().'.'.$request->photo->extension();  
         $request->photo->move(public_path('/'), $photo);
        
             
       }

       else
       {
        $photo='';
       }

       
           
          $users= User::create([
        'name' =>$name,
         'email'=> $email,
        'address'=> $address,
        'phonenumber'=> $phonenumber,
        'type'=> $type,
           'jobtitle_ar'=> $jobtitle_ar,
          'jobtitle_en' => $jobtitle_en,
        'status'=> $status,
            'photo'=>$photo,
            'gender'=>$gender,
            'password'=> bcrypt($password)


        

         ]);
  session()->flash('success', trans('admin.Added successfully'));


          return redirect('users');
    }

   public function update(Request $request)
{

       
       $id=request('User_id');
      $User =User::where('id',$id)->first();
   


      $name= request('name');
        $email= request('email');
        $address= request('address');
        $phonenumber= request('phonenumber');
        $type= request('type');

        $jobtitle_ar= request('jobtitle_ar');
        $jobtitle_en= request('jobtitle_en');
        $status= request('status');
        $gender= request('gender');

       if ($request->photo) 
       {
          $photo = time().'.'.$request->photo->extension();  
         $request->photo->move(public_path('/'), $photo);
        
             
       }

       else

       {
            $photo= $User->photo;
       }

      
 if (request('password'))
  {


    if($request['password'] != null  )
        {
            $password = bcrypt(request('password'));
        }


        $users= User::where('id',$id)->update([
         'name' =>$name,
         'email'=> $email,
        'address'=> $address,
        'phonenumber'=>$phonenumber,
        'type'=> $type,
           'jobtitle_ar'=> $jobtitle_ar,
          'jobtitle_en' => $jobtitle_en,
        'status'=> $status,

            'gender'=>$gender,

            'photo'=>$photo,
            'password'=>$password


        

         ]);


 session()->flash('success', trans('admin.Modified successfully'));
  return redirect('users');
  }

       
         $users= User::where('id',$id)->update([
         'name' =>$name,
         'email'=> $email,
        'address'=> $address,
        'phonenumber'=>$phonenumber,
        'type'=> $type,
           'jobtitle_ar'=> $jobtitle_ar,
          'jobtitle_en' => $jobtitle_en,
        'status'=> $status,

            'gender'=>$gender,

            'photo'=>$photo,
           


        

         ]);

  return redirect('users');
}


    public function edit($id)

    {

      
	    $users =User::where('id',$id)->first();
    	
    	return view('layout.updateusers',compact('users'));


    }

   public function delete($id)
    {
         User::where('id',$id)->delete();

          return redirect('layout.users');
         
    }
}
