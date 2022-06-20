<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Technician;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller {
    public function register(UserRequest $request) {
        $request->validated();
        // $insertion = User::create([$users]);
        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->id_role = $request->id_role;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = now();
        $user->save();
        Alert::success('Success', 'Success Create Data');
        return redirect()->route('login.auth')->with('success', 'Success Create Data');

    }

    public function statistik() {
        if(auth()->user()->id_role == 2) {
            $id_cust = Customer::select('cust_id AS cust_id', 'user_id')->where('user_id', '=', Auth::user()->id)->first();
            $dataseluruh = Transaction::where('customer_id', '=', $id_cust->cust_id)->orderBy('created_at', 'desc')->get();
            $dataringan = Transaction::where('customer_id', '=', $id_cust->cust_id)->where('level', 'Ringan')->orderBy('created_at', 'desc')->get();
            $datasedang = Transaction::where('customer_id', '=', $id_cust->cust_id)->where('level', 'Sedang')->orderBy('created_at', 'desc')->get();
            $databerat = Transaction::where('customer_id', '=', $id_cust->cust_id)->where('level', 'Berat')->orderBy('created_at', 'desc')->get();
            return view(
                'statistik',
                [
                    'dataseluruh' => $dataseluruh,
                    'levelringan' => $dataringan,
                    'levelsedang' => $datasedang,
                    'levelberat' => $databerat,
                    'title' => "Statistik Customer",
                ]
            );
        } else if (auth()->user()->id_role == 3) {
            $id_tech = Technician::where('user_id', '=', Auth::user()->id)->first();
            $dataseluruh = Transaction::where('id_technician', '=', $id_tech->technician_id)->orderBy('created_at', 'desc')->get();
            $dataringan = Transaction::where('id_technician', '=', $id_tech->technician_id)->where('level', '=', 'Ringan')->orderBy('created_at', 'desc')->get();
            $datasedang = Transaction::where('id_technician', '=', $id_tech->technician_id)->where('level', '=', 'Sedang')->orderBy('created_at', 'desc')->get();
            $databerat = Transaction::where('id_technician', '=', $id_tech->technician_id)->where('level', '=', 'berat')->orderBy('created_at', 'desc')->get();
            return view(
                'statistik',
                [
                    'dataseluruh' => $dataseluruh,
                    'levelringan' => $dataringan,
                    'levelsedang' => $datasedang,
                    'levelberat' => $databerat,
                    'title' => "Statistik Teknisi",
                ]
            );
        } else {
            return redirect()->route('index.home');
        }
    }
}

