<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    //
    protected $guarded = [];
    public static function createKey($numOfKeys){

        $keysArr = [];
        $main = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        for($i=0; $i<$numOfKeys; $i++){
            $str = "";
            for($j=0; $j<8; $j++){

                $str = $str.$main[rand(0, strlen($main)-1)];

            }
//            $keyAlreadyPresent = Voucher::where('key', $str)->get();
//            if($keyAlreadyPresent == null){
//                array_push($keysArr, $str);
//            }
//            else{
//                Voucher::createKey($numOfKeys-$i);
//            }
            array_push($keysArr, $str);

        }
        return $keysArr;
    }
}
