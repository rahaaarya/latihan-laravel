<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    public function alldata() {
        return DB::table('user')->get();
    }
    public function addData($data) {
        return DB::table('user')->insert($data);
    }
  
}