<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransportDataTypesController extends Controller
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
        $item = DataType::all();
        $title = 'Все типы данных';

        return view('admin.transportdatatypes.index', ['item' => $item, 'title' => $title]);
    }

    public function add()
    {
        $item = new DataType();
        $title = 'Новый тип';
        return view('admin.transportdatatypes.addedit', ['item' => $item, 'title' => $title]);
    }

    public function store(Request $request)
    {
        $validator = self::validateRequest($request);

        if ($validator->passes()) {
            $item = DataType::storeRecord($request);

            session()->flash('message', 'Добавлено новое поле - ' . $item->name);
            return redirect(route('transportdatatypes'));
        }

        return redirect(route('transportdatatypes.add'))
            ->withErrors($validator)
            ->withInput();
    }

    public function edit($id)
    {
        $item = DataType::find($id);
        if ($item)
            $title = 'Редактировать тип';
        return view('admin.transportdatatypes.addedit', compact('item', 'title'));

        session()->flash('error', 'Не найдено!');
        return redirect(route('transportdatatypes'));
    }

    public function update(Request $request, $id)
    {
        $validator = self::validateRequest($request, $id);
        if ($validator->passes()) {
            $item = DataType::updateRecord($request, $id);

            session()->flash('message', 'Тип "' . $item->name . '" отредактировано');
            return redirect(route('transportdatatypes'));
        }

        return redirect(route('transportdatatypes.edit', $id))
            ->withErrors($validator)
            ->withInput();
    }
    public function delete($id)
    {
        $item = DataType::find($id);
        if ($item) {
            session()->flash('message', 'Удало поле - ' . $item->name . ' ' . $item->surname);
            $item->delete();
        }
        return redirect(route('transportdatatypes'));

        session()->flash('error', 'Не найдено!');
        return redirect(route('transportdatatypes'));
    }

    public function validateRequest(Request $request, $id = null)
    {
        $rules = [
            'name' => 'required|max:255',
            'code' => 'required|max:25|unique:datatypes,code,' . $id
        ];
        $message = [
            'name.required' => 'Поле Название обязательно для заполнения',
            'name.max' => 'Длина поле Название должна быть до :max символов',
            'code.required' => 'Поле Код обязательно для заполнения',
            'code.max' => 'Длина поле Код должна быть до :max символов',
            'code.unique' => 'Поле с таким Кодом существует',
        ];
        return Validator::make($request->all(), $rules, $message);
    }
}
