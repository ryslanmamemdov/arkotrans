<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    use HasFactory;
    protected $table = 'trailers';

    public function storeRecord($request)
    {
        $item = new Trailer;
        $item = self::saveRecord($item, $request);

        return $item;
    }

    public function updateRecord($request, $id)
    {
        $item = Trailer::find($id);
        $item = self::saveRecord($item, $request);

        return $item;
    }

    public function saveRecord($item, $request){
        $item->number = $request->number;
        $item->status = ($request->status)?1:0;

        $item->save();

        return $item;
    }
}
