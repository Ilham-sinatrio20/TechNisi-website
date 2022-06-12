<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Technician;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller {

    public function detailOrder(){
        if(auth()->user()->id_role = 2) {
            //$id_cust = Customer::where('user_id', '=', auth()->user()->id)->first();
            $transaction = Transaction::select('trans_id', 'level', 'transaction.desc AS description', 'price', 'status', 'u.name AS cust_name', 'u.id',
            'c.address AS alamat', 'uc.name AS tech_name', 'uc.phone AS tech_phone', 'u.phone AS cust_phone', 'transaction.created_at AS dates')
            ->join('technician AS t', 't.technician_id', 'transaction.id_technician')
            ->join('users AS uc', 'uc.id', 't.user_id')
            ->join('customer AS c', 'c.cust_id', 'transaction.customer_id')
            ->join('users AS u', 'u.id', 'c.user_id')
            ->where('uc.id', auth()->user()->id)->get();
            return view('teknisi.detailOrder', [
                'transaction' => $transaction,
                'title' => "Detail Order",
            ]);
        } else if (auth()->user()->id_role == 3) {
            //$id_tech = Technician::where('user_id', '=', auth()->user()->id)->first();
            $transaction = Transaction::select('trans_id', 'level', 'transaction.desc AS description', 'price', 'status', 'uc.name AS cust_name', 'ut.id',
            't.address AS alamat', 'ut.name AS tech_name', 'ut.phone AS tech_phone', 'uc.phone AS cust_phone', 'transaction.created_at AS dates')
            ->join('technician AS t', 't.technician_id', 'transaction.id_technician')
            ->join('users AS ut', 'ut.id', 't.user_id')
            ->join('customer AS c', 'c.cust_id', 'transaction.customer_id')
            ->join('users AS uc', 'uc.id', 'c.user_id')
            ->where('ut.id', auth()->user()->id)->get();
            return view('teknisi.detailOrder', [
                'transaction' => $transaction,
                'title' => "Detail Order",
            ]);
        }
    }

    public function createTrans(TransactionRequest $request){
        $request->validated();
        $transaction = new Transaction;
        $transaction->customer_id = $request->customer_id;
        $transaction->id_technician = $request->id_technician;
        $transaction->level = $request->level;
        $transaction->price = $request->price;
        $transaction->status = 'Order';
        $transaction->desc = $request->desc;
        $transaction->save();

        return response()->json(['message' => 'Successfully create transaction']);
    }

    public function showAll(){
        $data = Transaction::select('trans_id', 'level',
        'desc', 'price', 'status', 'customer_id', 'id_technician', 'c.cust_id', 'c.user_id',
        't.technician_id', 't.user_id', 'u.name AS user_name', 'u2.name AS tech_name')
        ->join('customer AS c', 'transaction.customer_id', '=', 'c.cust_id')
        ->join('technician AS t', 'transaction.id_technician', '=', 't.technician_id')
        ->join('users AS u', 'c.user_id', '=', 'u.id')
        ->join('users AS u2', 't.user_id', '=', 'u2.id')
        ->get();

        return response()->json(['data' => $data]);
    }

    public function showTrans($id){
        $data = Transaction::select('trans_id', 'level',
        'desc', 'price', 'status', 'customer_id', 'id_technician', 'c.cust_id', 'c.user_id',
        't.technician_id', 't.user_id', 'u.name AS user_name', 'u2.name AS tech_name')
        ->join('customer AS c', 'transaction.customer_id', '=', 'c.cust_id')
        ->join('technician AS t', 'transaction.id_technician', '=', 't.technician_id')
        ->join('users AS u', 'c.user_id', '=', 'u.id')
        ->join('users AS u2', 't.user_id', '=', 'u2.id')
        ->where('trans_id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function checkOrder($id){
        $data = Transaction::select('trans_id', 'level',
        'desc', 'price', 'status', 'customer_id', 'id_technician', 'c.cust_id', 'c.user_id',
        't.technician_id', 't.user_id', 'u.name AS user_name', 'u2.name AS tech_name')
        ->join('customer AS c', 'transaction.customer_id', '=', 'c.cust_id')
        ->join('technician AS t', 'transaction.id_technician', '=', 't.technician_id')
        ->join('users AS u', 'c.user_id', '=', 'u.id')
        ->join('users AS u2', 't.user_id', '=', 'u2.id')
        ->where('id_technician', $id)->get();

        return response()->json(['data' => $data]);
    }

    public function destroy($id){
        $cust = Transaction::where('trans_id', '=', $id)->delete();
        return response()->json(['message' => 'Succesfully delete data']);
    }

    public function updateTrans(TransactionRequest $request, $id){
        $request->validated();
        $data = Transaction::where('id_technician', $id)->first();

        $data->level = $request->level;
        $data->desc = $request->desc;
        $data->price = $request->price;
        $data->status = $request->status;
        $data->update();
        return response()->json(["Message"   => "Transaction has successfully update"]);
    }
}
