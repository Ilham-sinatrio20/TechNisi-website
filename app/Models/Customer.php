<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Transaction;

class Customer extends Model {
    use HasFactory;

    protected $table = 'Customer';
    protected $guarded = ['cust_id'];
    protected $primaryKey = 'cust_id';
    protected $fillable = [
        'address',
        'photos',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
