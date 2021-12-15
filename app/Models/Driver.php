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
        // Validate the request...

        $item = new Driver;

        $item->name = $request->name;
        $item->surname = $request->surname;
        $item->dob = strtotime($request->dob);
        if ($request->email)
            $item->email = $request->email;

        $item->save();

        return $item;
    }

    public function updateRecord($request, $id)
    {
        // Validate the request...
        $item = Driver::find($id);

        $item->name = $request->name;
        $item->surname = $request->surname;
        $item->dob = strtotime($request->dob);
        if ($request->email)
            $item->email = $request->email;

        $item->save();

        return $item;
    }
}
