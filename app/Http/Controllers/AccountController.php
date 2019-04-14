<?php

namespace App\Http\Controllers;

use App\Account;

use App\Department;
use App\Category;
use Illuminate\Http\Request;
use App\User;
use Auth;

use Redirect;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
        {
            $this->middleware('is_admin');
        }

        public function index()
        {
            $id=Auth::user()->id;
        //    $result = \DB::table('users')->select('*')->where('user_type','!=',$id)
        // ->paginate(10);

           $result = \DB::table('users')
        ->leftJoin('categories', 'users.premium_id' , '=', 'categories.id' )
        ->select('categories.id as pre_id','categories.primeum','users.*')->where('users.user_type','0')
        ->paginate(10);

            // echo "<pre>"; print_r($result);exit;
            // $premium = Category::get();
            

            return view('titlelist',['users' => $result]);
        }
        public function add()
        {

                $pre = Department::get();

                return view('addtitle' , ['pre' => $pre]);

            //
           

        }
          public function adddept (Request $request)
        {
            // echo $request['service_name']; exit;
             if($request['services'] == 0 || !isset($request['services']))
            {
                return Redirect::back()->withErrors(['Please select Premium', 'errors']);
            }
            if($request['acc_name'] == '' || !isset($request['acc_name']))
            {
                return Redirect::back()->withErrors(['Please Enter Service Name', 'errors']);
            }
           

            $check = Account::where('acc_name',$request['acc_name'])->exists();
            if($check == true)
            {
                return Redirect::back()->withErrors([ 'Account Name already exists', 'errors']);
            }
            // dd($check);
            $add = new Account;
            $add->service_id = $request['services'];
            $add->acc_name = $request['acc_name'];
            $added=$add->save();
            // return view('/department');
            return redirect('/admin/account')->with('success', $request['acc_name'].' has been added successfully');
        }
        public function deptchange($id)
        {
            // echo $id;exit;  
             $acc = Account::find($id);
         
             $get =  \DB::table('users')->select('name','status')->where('id',$id)->first();
             $changestatus = $get->status;
             // echo $changestatus;exit;
             if($changestatus == '0'){
               $statuschange =  \DB::table('users')->where('id',$id)->update(array('status' =>'1'));
           }
             else{ 
              $statuschange =  \DB::table('users')->where('id',$id)->update(array('status' =>'0'));
          }

             // $uname = $status->name;
             // echo "<pre>";print_r($changestatus);exit; 
              // $statuschange =  \DB::table('users')->where('id',$id)->update(array('status' =>$changestatus));

        return Redirect::back()->withErrors(' $uname status changed','errors');
            
        }
        public function updatedept(Request $request,$id)
        {
             // dd($request['premium']);
            // echo "<pre>";print_r($request['services']);exit;

            if($request['services'] == 0 || !isset($request['services']))
            {
                return Redirect::back()->withErrors(['Please select services', 'errors']);
            }
            if($request['acc_name'] == '' || !isset($request['acc_name']))
            {
                return Redirect::back()->withErrors(['Please Enter Account Name ', 'errors']);
            }
           
           

            // $check = Department::where('service_name',$request['service_name'])->exists();
            // if($check == true)
            // {
            //     return Redirect::back()->withErrors([ 'Service Name has already exists', 'errors']);
            // }


            $acc = Account::find($id);
             $acc->service_id = $request['services'];
            $acc->acc_name = $request['acc_name'];
            $acc->save();
            return redirect('/admin/account')->with('warning', $request['acc_name'].' has been updated successfully');
        }
        public function deptdelete($id)
        {

            // print_r($id);exit;
            //
            $dept = User::find($id);
            // print_r($dept);exit;
            $dept->delete();
            return redirect('/admin/users')->with('success', 'Deleted successfully');
        }

        public function paymentlist()
        {
            $result = \DB::table('payments')
            ->leftJoin('categories', 'categories.id' , '=',  'payments.premium_id')
            ->leftJoin('users', 'users.id' , '=',  'payments.userid')
            ->select('categories.id as pre_id','categories.primeum','payments.*','users.name')
            ->paginate(10);

    // echo "<pre>";print_r($result);exit;
            // $result = \DB::table('payments')->get();
            return view('paymentlist',['payment' => $result]);
        }


       
}
