<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $item = Transport::all()->where('type',Transport::CARS);
        $title = 'Все машины';

        return view('admin.cars.index', ['item' => $item, 'title' => $title]);
    }

    public function add()
    {
        $item = new Transport();
        $title = 'Новая машина';
        return view('admin.cars.addedit',['item' => $item, 'title' => $title]);
    }

    public function store(Request $request)
    {
        $validator = self::validateRequest($request);

        if ($validator->passes()) {
            $item = Transport::storeRecord($request);

            session()->flash('message', 'Добавлая новая машина - '.$item->number);
            return redirect(route('cars'));
        }

        return redirect(route('car.add'))
            ->withErrors($validator)
            ->withInput();
    }

    public function edit($id)
    {
        $item = Transport::find($id);
        if ($item)
            $title = 'Редактировать манишу';
            return view('admin.cars.addedit', compact('item', 'title'));

        session()->flash('error', 'Не найдено!');
        return redirect(route('cars'));
    }

    public function update(Request $request, $id)
    {
        $validator = self::validateRequest($request);
        if ($validator->passes()) {
            $item = Transport::updateRecord($request, $id);

            session()->flash('message', 'Машина '.$item->number.' отредактирована');
            return redirect(route('cars'));
        }

        return redirect(route('car.edit',$id))
            ->withErrors($validator)
            ->withInput();
    }
    public function delete($id)
    {
        $item = Transport::find($id);
        if ($item){
            session()->flash('message', 'Удала машина - '.$item->name.' '.$item->surname);
            $item->delete();
        }
        return redirect(route('cars'));

        session()->flash('error', 'Не найдено!');
        return redirect(route('cars'));
    }

    public function validateRequest(Request $request)
    {
        $rules = [
            'number' => 'required|unique:transports|max:10'
        ];
        $message = [
            'number.required' => 'Поле Номер обязательно для заполнения',
            'number.max' => 'Длина поле Номер должна быть до :max символов',
            'number.unique' => 'Транпорт с таким номер существует',
        ];
        return Validator::make($request->all(), $rules, $message);
    }
}
