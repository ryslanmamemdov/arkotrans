<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataType extends Model
{
    use HasFactory;

    protected $table = 'datatypes';

    const TYPE = ['NUM' => 1, 'STR' => 2, 'DATE' => 3];
    const FORTRANSPORT = 1;
    const FORPERSON = 2;

    public function storeRecord($request)
    {
        $item = new DataType;
        $item = self::saveRecord($item, $request);

        return $item;
    }

    public function updateRecord($request, $id)
    {
        $item = DataType::find($id);
        $item = self::saveRecord($item, $request);

        return $item;
    }

    public function saveRecord($item, $request)
    {
        $item->name = $request->name;
        $item->code = $request->code;
        $item->type = $request->type;
        $item->forwho = $request->forwho;

        $item->save();

        return $item;
    }
}
