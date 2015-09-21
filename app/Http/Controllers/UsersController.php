<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\User;

use Auth;

class UsersController extends Controller
{

    public function __construct(){
    
        $this->middleware('admin_or_editor');
            
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::paginate(20);

        return view('users.index',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {

        $user = new User($request->all());

        $new_password = uniqid();
        $new_username = $user['username'];

        $user['password'] = bcrypt($new_password);

        $user->save();

        return view('users.confirmation',compact('new_username','new_password'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('users');
    }


    public function search($column,$input,$department,$order){

        $order_array = explode('.',$order);

        if ($column !== 'industry') {
    
            if($input !== '*') {

                if ($department !== '0') {

                    //Search specific department
                    $users = User::where($column, 'LIKE', '%'.$input.'%')->where('department_id','LIKE', $department)->where('role_id',3)->orderBy($order_array[0],$order_array[1])->paginate(20); 

                } else {
                    //search all departments
                    $users = User::where($column, 'LIKE', '%'.$input.'%')->orderBy($order_array[0],$order_array[1])->paginate(20); 

                }
            
            } else {

                if ($department !== '0') {

                    //Search specific department
                    $users = User::where('department_id','LIKE', $department)->where('role_id',3)->orderBy($order_array[0],$order_array[1])->paginate(20);

                } else {

                    //Search all departments
                    $users = User::orderBy($order_array[0],$order_array[1])->paginate(20);

                }
            
            }

        } else {

            if($input !== '*') {

                if ($department !== '0') {

                    //Search specific department
                    $users = User::where($column, 'LIKE', '%'.$input.'%')->where('department_id','LIKE', $department)->where('role_id',3)->orderBy($order_array[0],$order_array[1])->paginate(20); 

                } else {
                    //search all departments
                    $users = User::where($column, 'LIKE', '%'.$input.'%')->orderBy($order_array[0],$order_array[1])->paginate(20); 

                }
            
            } else {

                if ($department !== '0') {

                    //Search specific department
                    $users = User::where('department_id','LIKE', $department)->where('role_id',3)->orderBy($order_array[0],$order_array[1])->paginate(20);

                } else {

                    //Search all departments
                    $users = User::orderBy($order_array[0],$order_array[1])->paginate(20);

                }
            
            }

        }

        $users->setPath(url('users'.'/'));
    
        return view('users.includes.tbl_user_management_body',compact('users'));
            
    }

}
