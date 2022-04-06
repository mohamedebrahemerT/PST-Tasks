<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use App\Models\Document;

class UsersController extends Controller
{
    public $objectName;
    public $folderView;

    public function __construct(User $model){
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.users.';
    }
    public function index(){
        if(auth()->user()->type == 'super admin'){
            $users = $this->objectName::where('type','admin')->orderBy('name','asc')->paginate(10);
        }else if(auth()->user()->type == 'admin'){
            $users = $this->objectName::where( 'parent_id' , auth()->user()->id )->orderBy('name','asc')->paginate(10);
        }
        return view($this->folderView.'users',compact('users'));
    }
    public function create()
    {

        $admins_city = User::where('type','admin')->get();
        foreach ($admins_city as $key => $admin) {
            $cities_choosen[] = $admin->city_id ;
        }
        if(count($admins_city) == 0)
        {
               
            $cities =City::where('status','active')->pluck('name_ar','id','name_en');

        }else
        {
            // whereNotIn('id',$cities_choosen)->
            $cities =City::where('status','active')->pluck('name_ar','id','name_en');
        }
        return view($this->folderView.'create',compact('cities'));
    }
    public function store(Request $request){
        if(auth()->user()->type == 'super admin'){
            $data = $this->validate(\request(),
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'city_id' => 'required|exists:cities,id',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6', 
            ]);
            $data['type'] = 'admin' ;
            $data['total'] = 0 ;
        }else{
            $data = $this->validate(\request(),
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6', 
            ]);
            $data['type'] = 'user';
            $data['parent_id'] = auth()->user()->id;
        }
        if($request['password'] != null  && $request['password_confirmation'] != null ){
            $data['password'] = bcrypt(request('password'));
            $user = $this->objectName::create($data);
            $user->save();
            session()->flash('success', trans('admin.addedsuccess'));
            return redirect(url('users/create'));
        }
    }
    public function edit($id)
    {
        $cities_choosen[] = null;
        $user_data = $this->objectName::where('id', $id)->first();

         $admins_city = User::where('type','admin')->get();

        foreach ($admins_city as $key => $admin)
         {
            if($admin->city_id != $user_data->city_id)
            {
                $cities_choosen[] = $admin->city_id ;
            }
        }


          $cities_choosen;
             $cities =City::where('status','active')->pluck('name_ar','id','name_en');

        return view($this->folderView.'edit', compact('user_data','cities'));
    }
    public function update(Request $request, $id)
    {
        if(auth()->user()->type == 'super admin' && $request['password'] != null && $request['password_confirmation'] != null){
            $data = $this->validate(\request(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$id,
                'city_id' => 'required',
                'password' => 'min:6|confirmed',
               // 'password_confirmation' => 'min:6', 
            ]);
        }else if(auth()->user()->type == 'super admin' ){
            $data = $this->validate(\request(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$id,
                'city_id' => 'required', 
            ]);
        }else if(auth()->user()->type == 'admin' ){
            $data = $this->validate(\request(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$id,
            ]);
        }else if(auth()->user()->type == 'admin' && $request['password'] != null && $request['password_confirmation'] != null){
            $data = $this->validate(\request(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$id,
                'password' => 'min:6|confirmed',
                //'password_confirmation' => 'min:6', 
            ]);
        }


        if($request['password'] != null  && $request['password_confirmation'] != null )
        {
            $data['password'] = bcrypt(request('password'));
        }
        $this->objectName::where('id',$id)->update($data);
        session()->flash('success', trans('admin.updatSuccess'));
        return redirect(url('users'));
    }
    public function destroy($id){
        if(auth()->user()->type == 'super admin'){
            $users = User::where('parent_id',$id)->get();
            if(count($users) == 0){
                $user = $this->objectName::where('id', $id)->first();
                $user->delete();
                session()->flash('success',trans('admin.deleteSuccess'));
                return back();
            }else{
                session()->flash('danger', trans('admin.no_delete_user'));
                return back();
            }
        }else if(auth()->user()->type == 'admin'){
           $docs = Document::where('user_id',$id)->get();
            if(count($docs) == 0){
                $user = $this->objectName::where('id', $id)->first();
                $user->delete();
                session()->flash('success',trans('admin.deleteSuccess'));
                return back();
            }else{
                session()->flash('danger', trans('admin.no_delete'));
                return back();
            }
        }
    }
    public function update_Actived(Request $request){
        $data['status'] = $request->status ;
        $user = User::where('id', $request->id)->update($data);
        return 1;
    }
}
