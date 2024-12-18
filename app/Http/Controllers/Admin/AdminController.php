<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        $data['total_users']=User::count();
        $data['total_category']=Category::count();
        return view("dashboard",$data);
    }
    public function viewExpenses(Request $request){
        $expenses =Expense::query();
        if(($request->category && $request->category!='')){
            $expenses->where('category_id', $request->category);
        }
        if($request->date && $request->date!= ''){
            $expenses->whereDate('expense_date', '=',$request->date);
        }
        $data['expenses_list'] = $expenses->with(['user','category'])->get();
        $data['categoey_list'] = Category::get();
        return view("expense",$data);
    }
    public function viewUsers(Request $request){
        if($request->status && $request->status != "" && $request->id && $request->id != ""){
            $user = User::find($request->id);
            if($request->status=='active'){
                $user->status='inactive';
            }else{
                $user->status= 'active';
            }
            $user->save();
        }
        $data['users_list'] = User::with('expenses')->get();
        return view("users",$data);
    }
    public function category(Request $request){
        $data['category_list'] = Category::get();
        return view("category",$data);
    }
    public function categoryStore(Request $request){
        $credentials = $request->validate([
            'category_name' => ['required'],
        ]);
        $category = Category::create($credentials);
        return redirect()->route('admin.category')->with('success','category Added Successfully');
    }
    public function viewUsersDetails($id){
        $data['user_data']= User::findOrFail($id);
        $data['users_expenses_list'] = Expense::with('category')->where('user_id',$id)->get();
        return view("usersExpensesDetails",$data);
    }

    
    
}
