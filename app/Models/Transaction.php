<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    use HasFactory;

    protected $table = 'Transaction';
    protected $primaryKey = 'trans_id';
    //protected $guarded = ['trans_id'];
    protected $fillable = [
        'trans_id',
        'level',
        'desc',
        'price',
        'status',
        'customer_id',
        'id_technician',
        'created_at',
        'updated_at',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'cust_id');
    }

    public function technician(){
        return $this->belongsTo(Technician::class, 'id_technician', 'technician_id');
    }
}
