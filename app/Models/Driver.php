<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'drivers';

    public function storeRecord($request)
    {
        $item = new Driver;
        $item = self::saveRecord($item, $request);

        return $item;
    }

    public function updateRecord($request, $id)
    {
        $item = Driver::find($id);
        $item = self::saveRecord($item, $request);

        return $item;
    }

    public function saveRecord($item, $request){
        $item->name = $request->name;
        $item->surname = $request->surname;
        $item->dob = strtotime($request->dob);
        $item->status = ($request->status)?1:0;
        if ($request->email)
            $item->email = $request->email;

        $item->save();

        return $item;
    }
}
