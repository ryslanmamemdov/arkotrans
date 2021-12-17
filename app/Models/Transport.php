<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    protected $table = 'transports';
    const CARS = 1;
    const TRAILERS = 2;

    public function storeRecord($request)
    {
        $item = new Transport;
        $item = self::saveRecord($item, $request);

        return $item;
    }

    public function updateRecord($request, $id)
    {
        $item = Transport::find($id);
        $item = self::saveRecord($item, $request);

        return $item;
    }

    public function saveRecord($item, $request){
        $item->number = $request->number;
        $item->type = $request->type;
        $item->status = ($request->status)?1:0;

        $item->save();

        return $item;
    }
}
