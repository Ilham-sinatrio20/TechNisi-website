<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Technician;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\TechnicianRequest;
use App\Http\Requests\TransactionRequest;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;

class TechnicianController extends Controller
{
    public function createTrans(TechnicianRequest $request)
    {
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

    public function showTech($id)
    {
        $tech = Technician::select(
            'technician_id',
            'specialist_id',
            'user_id',
            'technician.desc',
            'certification',
            'address',
            'photos',
            's.id_specialist',
            's.category AS spesialis',
            'u.id',
            'u.name AS name',
            'u.email',
            'u.phone AS phone',
        )
            ->join('specialization AS s', 'technician.specialist_id', '=', 's.id_specialist')
            ->join('users AS u', 'technician.user_id', '=', 'u.id')
            ->join('transaction AS t', 'technician.technician_id', '=', 't.id_technician')
            ->where('technician_id', $id)
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
            'transaction.created_at AS dates'
        )
            ->join('customer AS c', 'transaction.customer_id', '=', 'c.cust_id')
            ->join('technician AS t', 'transaction.id_technician', '=', 't.technician_id')
            ->join('users AS u', 'c.user_id', '=', 'u.id')
            ->join('users AS u2', 't.user_id', '=', 'u2.id')
            ->where('id_technician', $id)
            ->get();

        return view('teknisi.detail-tech', [
            'data' => $tech,
            'no' => 1,
            'title' => 'Detail Teknisi',
            'trans' => $transaction,
        ]);
    }

    public function showAll()
    {
        $spec = Specialization::select('id_specialist', 'category')->get();
        $data = Technician::select('technician_id AS id_tech', 'specialization.category AS category', 'specialist_id', 'users.name AS name', 'user_id',
        'desc', 'certification', 'address', 'photos')
        ->join('specialization', 'technician.specialist_id', '=', 'specialization.id_specialist')
        ->join('users', 'technician.user_id', '=', 'users.id')
        ->orderBy('id_tech', 'asc')
        ->paginate(6);

        $data = Technician::select(
            'technician_id AS id_tech',
            'specialization.category AS category',
            'specialist_id',
            'users.name AS name',
            'user_id',
            'desc',
            'certification',
            'address',
            'photos'
        )
            ->join('specialization', 'technician.specialist_id', '=', 'specialization.id_specialist')
            ->join('users', 'technician.user_id', '=', 'users.id')
            ->orderBy('id_tech', 'asc')
            ->get();

        return view('teknisi.list-tech', ['data' => $data, 'spec' => $spec, 'title' => 'Teknisi']);
    }

    // public function showAll() {
    //     $data = Transaction::select(
    //         'trans_id', 'level', 'desc',
    //         'price', 'status', 'customer_id', 'id_technician',
    //         'c.cust_id', 'c.user_id', 't.technician_id',
    //         't.user_id', 'u.name AS user_name', 'u2.name AS tech_name')
    //     ->join('customer AS c', 'transaction.customer_id', '=', 'c.cust_id')
    //     ->join('technician AS t', 'transaction.id_technician', '=', 't.technician_id')
    //     ->join('users AS u', 'c.user_id', '=', 'u.id')
    //     ->join('users AS u2', 't.user_id', '=', 'u2.id')
    //     ->orderBy()
    //     ->get();

    //     // ->with('customer:cust_id,user_id')
    //     // ->with('technician:technician_id,user_id')

    //     return response()->json(['data' => $data]);
    // }

    public function showTrans($id)
    {
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

        // $data = Transaction::select('trans_id', 'level',
        // 'desc', 'price', 'status', 'customer_id', 'id_technician')
        // ->with('customer:cust_id,user_id')
        // ->with('technician:technician_id,user_id')
        // ->where('trans_id', $id)->first();

        return response()->json(['data' => $data]);
    }

    public function checkOrder($id)
    {
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

        // $data = Transaction::select('trans_id', 'level',
        // 'desc', 'price', 'status', 'customer_id', 'id_technician')
        // ->with('customer:cust_id,user_id')
        // ->with('technician:technician_id,user_id')
        // ->where('trans_id', $id)->first();

        // return response()->json(['data' => $data]);
        return view(
            'teknisis.statistik',
            ['data' => $data]
        );
    }

    public function statistik()
    {
        $id_user = auth()->user()->id;
        $id_tech = Technician::where('user_id', '=', $id_user)->first();
        $data = Transaction::where('id_technician', '=', $id_tech->technician_id)->get();
        return view(
            'teknisi.statistik',
            [
                'data' => $data,
                'title' => "Statistik Teknisi"
            ]
        );
    }

    public function destroy($id)
    {
        $cust = Transaction::where('trans_id', '=', $id)->delete();
        return response()->json(['message' => 'Succesfully delete data']);
    }

    public function updateTech(TechnicianRequest $request, UserRequest $req, $id)
    {
        $request->validated();
        //$req->validated();
        $tech = Technician::where('technician_id', $id)->first();
        $id_ = $tech->user_id;
        $user = User::select('id', 'name', 'email', 'username', 'phone')->where('id', $tech->user_id)->first();

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
        $tech->desc = $request->desc;
        $tech->certification = $request->certification;
        $tech->address = $request->address;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->username = $req->username;
        $user->phone = $req->phone;
        $tech->save();
        $user->update();
        return response()->json(["Message"   => "Technician has successfully update"]);
    }
}
