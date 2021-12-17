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

    public static function storeRecord($request)
    {
        $item = new DataType;
        $item = self::saveRecord($item, $request);

        return $item;
    }

    public static function updateRecord($request, $id)
    {
        $item = DataType::find($id);
        $item = self::saveRecord($item, $request);

        return $item;
    }

    public static function saveRecord($item, $request)
    {
        $item->name = $request->name;
        $item->code = $request->code;
        $item->type = $request->type;
        $item->forwho = $request->forwho;

        $item->save();

        return $item;
    }

    public static function getDataTypesForCar(){
        return DataType::where('forwho', self::FORTRANSPORT)->get();
    }
}
