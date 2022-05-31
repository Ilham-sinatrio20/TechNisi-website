<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Message;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\TransactionRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller {

    public function createCust(CustomerRequest $request){
        $request->validated();
        $data = new Customer();
        $data->name = $request->name;
        $data->address = $request->address;
        $data->user_id = $request->user_id;
        $data->save();
        return response()->json(['message' => 'Customer created successfully']);
    }

    public function updateTrans(TransactionRequest $req, $id){
        $req->validated();
        $data = Transaction::select('desc', 'price')
        ->where('customer_id', $id)
        ->where('status', '!=', 'Complete')
        ->get();

        $data->desc = $req->desc;
        $data->price = $req->price;
        $data->update();
        return response()->json(["Message"   => "Transaction has successfully update"]);
    }

    public function showAll(){
        $cust = Customer::select('cust_id', 'address', 'user_id', 'u.name', 'u.email', 'u.phone', 'u.username')
        ->join('users AS u', 'customer.user_id', '=', 'u.id')->get();
        // $cust = Customer::select('cust_id', 'address', 'user_id')
        // ->with('user:id,name,email,phone')->get();
        return response()->json(['cust' => $cust]);
    }

    public function showCust($id){
        $cust = Customer::select('photos', 'cust_id', 'address', 'customer.user_id',
        'u.name AS name', 'u.email AS email', 'u.phone AS phone', 'u.username AS username', 'r.name AS role_name',
        'u.id_role AS role_id')
        ->join('users AS u', 'customer.user_id', '=', 'u.id')
        ->join('role AS r', 'u.id_role', '=', 'r.id')
        ->where('u.username', 'LIKE', '%'.$id.'%')->first();
        return response()->json(['cust' => $cust]);
    }

    public function destroy($id){
        $cust = Customer::where('cust_id', '=', $id)->first();
        $user = User::where('id', '=', $cust->user_id)->delete();

        return response()->json(['message' => 'Succesfully delete data']);
    }

    public function updateCust(CustomerRequest $request, UserRequest $req, $id){
        $request->validated();
        //$req->validated();
        $cust = Customer::where('cust_id', $id)->first();
        $id_ = $cust->user_id;
        $user = User::select('id', 'name', 'email', 'username', 'phone')->where('id', $cust->user_id)->first();

        if($request->hasFile('photos')){
            $path = 'assets/image/cust'.$cust->photos;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('photos');
            $ext = $file->getClientOriginalExtension();
            $img_name = time().'.'.$ext;
            $file->move('assets/image/cust', $img_name);
            $cust->photos = $img_name;
        }
        $cust->address = $request->address;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->username = $req->username;
        $user->phone = $req->phone;
        $cust->save();
        $user->update();
        return response()->json([
            "Message"   => "Customer has successfully update",
            "user_id" => $cust->user_id,
            "users_id" => $user->id,
            "name" => $req->name,
            "email" => $req->email,
            "username" => $req->username,
            "phone" => $req->phone,
            "address"   => $request->address,
            "photos"    => $request->photos
        ]);
    }
}
