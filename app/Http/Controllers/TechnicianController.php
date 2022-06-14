<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Technician;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TechnicianRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\TransactionRequest;

class TechnicianController extends Controller {
    public function createTrans(TechnicianRequest $request) {
        $request->validated();
        $tech = new Technician;
        if ($request->hasFile('photos')) {
            $path = 'assets/image/tech' . $tech->photos;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('photos');
            $ext = $file->getClientOriginalExtension();
            $img_name = time() . '.' . $ext;
            $file->move('assets/image/tech', $img_name);
            $tech->photos = $img_name;
        }
        $tech->specialist_id = $request->customer_id;
        $tech->user_id = $request->user_id;
        $tech->desc = $request->desc;
        $tech->certification = $request->certification;
        $tech->address = $request->address;
        $tech->save();

        return response()->json(['message' => 'Successfully create transaction']);
    }

    public function showTech($name) {
        $tech = Technician::select(
            'technician_id',
            'specialist_id',
            'user_id',
            'technician.desc',
            'certification',
            'address',
            'photos',
            's.id_specialist',
            's.category AS category',
            'u.id',
            'u.name AS name',
            'u.email',
            'u.phone AS phone',
        )
        ->join('specialization AS s', 'technician.specialist_id', '=', 's.id_specialist')
        ->join('users AS u', 'technician.user_id', '=', 'u.id')
        ->join('transaction AS t', 'technician.technician_id', '=', 't.id_technician')
        ->where('u.name', $name)
        ->first();

        $transaction = Transaction::select(
            'trans_id',
            'level',
            'transaction.desc as description',
            'price',
            'status',
            'customer_id',
            'id_technician',
            'c.cust_id',
            'c.user_id',
            't.technician_id',
            't.user_id',
            'u.name AS user_name',
            'u2.name AS tech_name',
            'u.username AS username',
            'transaction.created_at AS dates',
            't.specialist_id AS specialist_id'
        )
        ->join('customer AS c', 'transaction.customer_id', '=', 'c.cust_id')
        ->join('technician AS t', 'transaction.id_technician', '=', 't.technician_id')
        ->join('users AS u', 'c.user_id', '=', 'u.id')
        ->join('users AS u2', 't.user_id', '=', 'u2.id')
        ->join('specialization', 't.specialist_id', '=', 'specialization.id_specialist')
        ->where('u2.name', $name)
        ->get();

        return view('teknisi.detail-tech', [
            'data' => $tech,
            'title' => 'Detail Teknisi',
            'trans' => $transaction,
        ]);
    }

    public function showAll() {
        $spec = Specialization::select('id_specialist', 'category')->get();
        $data = Technician::select(
            'technician_id', 'u.name AS name', 'u.id'
        )
        ->join('users AS u', 'technician.user_id', '=', 'u.id')
        ->orderBy('u.name', 'asc')
        ->where('u.id_role', 3)
        ->paginate(6);

        return view('teknisi.list-tech', [
            'data' => $data,
            'spec' => $spec,
            'title' => 'Teknisi'
        ]);
    }

    public function showTrans($id) {
        $data = Transaction::select(
            'trans_id',
            'level',
            'desc',
            'price',
            'status',
            'customer_id',
            'id_technician',
            'c.cust_id',
            'c.user_id',
            't.technician_id',
            't.user_id',
            'u.name AS user_name',
            'u2.name AS tech_name'
        )
            ->join('customer AS c', 'transaction.customer_id', '=', 'c.cust_id')
            ->join('technician AS t', 'transaction.id_technician', '=', 't.technician_id')
            ->join('users AS u', 'c.user_id', '=', 'u.id')
            ->join('users AS u2', 't.user_id', '=', 'u2.id')
            ->where('trans_id', $id)->first();

        return response()->json(['data' => $data]);
    }

    public function checkOrder($id) {
        $data = Transaction::select(
            'trans_id',
            'level',
            'desc',
            'price',
            'status',
            'customer_id',
            'id_technician',
            'c.cust_id',
            'c.user_id',
            't.technician_id',
            't.user_id',
            'u.name AS user_name',
            'u2.name AS tech_name'
        )
            ->join('customer AS c', 'transaction.customer_id', '=', 'c.cust_id')
            ->join('technician AS t', 'transaction.id_technician', '=', 't.technician_id')
            ->join('users AS u', 'c.user_id', '=', 'u.id')
            ->join('users AS u2', 't.user_id', '=', 'u2.id')
            ->where('id_technician', $id)->get();

        return view(
            'teknisis.statistik',
            ['data' => $data]
        );
    }
    public function destroy($id)
    {
        $cust = Transaction::where('trans_id', '=', $id)->delete();
        return response()->json(['message' => 'Succesfully delete data']);
    }

    public function updateTech(TechnicianRequest $request, UserRequest $req, $username)
    {
        $request->validated();
        $req->validated();
        $user = User::where('username', $username)->first();
        $tech = Technician::where('user_id', $user->id)->first();

        if($request->file('photos')){
            if(request('oldImage')) {
                Storage::delete(request('oldImage'));
            }
            $tech['photos'] = $request->file('photos')->store('tech-images');
        }
        $tech->desc = $request->desc;
        $tech->certification = $request->certification;
        $tech->address = $request->address;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->username = $req->username;
        $user->phone = $req->phone;
        $tech->save();
        $user->update();
        Alert::success('Success', 'Update Technician Sukses');
        return back();
    }

    public function edit($username){
        $users = Technician::select('photos', 'technician_id', 'address', 'user_id', 'certification', 'desc',
        'u.name AS name', 'u.email AS email', 'u.phone AS phone', 'u.username AS username', 'r.name AS role_name',
        'u.id_role AS role_id', 's.category AS category', 's.id_specialist AS id_specialist')
        ->join('users AS u', 'technician.user_id', '=', 'u.id')
        ->join('role AS r', 'u.id_role', '=', 'r.id')
        ->join('specialization AS s', 'technician.specialist_id', '=', 's.id_specialist')
        ->where('username', $username)->first();
        //dd($users);
        return view('edit', [
            'title' => 'Edit Profile',
            'users' => $users
        ]);
    }

    public function myProfile()
    {
        $dataProfile = auth()->user();
        $status = (Role::where('id', $dataProfile->id_role)->first())->name;
        return view(
            'teknisi.my_profile',
            [
                'status' => $status,
                'data' => $dataProfile,
                'title' => "My Profile",
            ]
        );
    }
}


/*
    public function statistik() {
        $id_tech = Technician::where('user_id', '=', auth()->user()->id)->first();
        $dataseluruh = Transaction::where('id_technician', '=', $id_tech->technician_id)->orderBy('level', 'asc')->get();
        $dataringan = Transaction::where('id_technician', '=', $id_tech->technician_id)->where('level', '=', 'Ringan')->get();
        $datasedang = Transaction::where('id_technician', '=', $id_tech->technician_id)->where('level', '=', 'Sedang')->get();
        $databerat = Transaction::where('id_technician', '=', $id_tech->technician_id)->where('level', '=', 'berat')->get();
        $count = 0;
        return view(
            'teknisi.statistik',
            [
                'dataseluruh' => $dataseluruh,
                'levelringan' => $dataringan,
                'levelsedang' => $datasedang,
                'levelberat' => $databerat,
                'total' => $count,
                'title' => "Statistik Teknisi",
            ]
        );
    }
*/

        // if ($request->hasFile('photos')) {
        //     $path = 'assets/image/tech' . $tech->photos;
        //     if (File::exists($path)) {
        //         File::delete($path);
        //     }
        //     $file = $request->file('photos');
        //     $ext = $file->getClientOriginalExtension();
        //     $img_name = time() . '.' . $ext;
        //     $file->move('assets/image/tech', $img_name);
        //     $tech->photos = $img_name;
        // }
















/*

        // $data = Technician::select(
        //     'technician_id AS id_tech',
        //     'specialization.category AS category',
        //     'specialist_id',
        //     'users.name AS name',
        //     'user_id',
        //     'desc',
        //     'certification',
        //     'address',
        //     'photos'
        // )
        //     ->join('specialization', 'technician.specialist_id', '=', 'specialization.id_specialist')
        //     ->join('users', 'technician.user_id', '=', 'users.id')
        //     ->orderBy('id_tech', 'asc')
        //     ->get();
*/
