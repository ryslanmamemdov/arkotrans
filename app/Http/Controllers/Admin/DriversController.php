<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriversController extends Controller
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
    public function index(Request $request)
    {
        $item = Driver::all();

        return view('admin.drivers.index', ['item' => $item]);
    }

    public function add()
    {
        $item = new Driver();
        return view('admin.drivers.addedit',['item' => $item]);
    }

    public function store(Request $request)
    {
        $validator = self::validateRequest($request);

        if ($validator->passes()) {
            $item = Driver::storeRecord($request);

            session()->flash('message', 'Добавлен новый водитель - '.$item->name.' '.$item->surname);
            return redirect(route('drivers'));
        }

        return redirect(route('driver.add'))
            ->withErrors($validator)
            ->withInput();
    }

    public function edit($id)
    {
        $item = Driver::find($id);
        if ($item)
            return view('admin.drivers.addedit', compact('item'));

        session()->flash('error', 'Не найдено!');
        return redirect(route('drivers'));
    }

    public function update(Request $request, $id)
    {
        $validator = self::validateRequest($request);
        if ($validator->passes()) {
            $item = Driver::updateRecord($request, $id);

            session()->flash('message', 'Водитель отредактирован - '.$item->name.' '.$item->surname);
            return redirect(route('drivers'));
        }

        return redirect(route('driver.edit',$id))
            ->withErrors($validator)
            ->withInput();
    }
    public function delete($id)
    {
        $item = Driver::find($id);
        if ($item)
            session()->flash('message', 'Удалён водитель - '.$item->name.' '.$item->surname);
            Driver::find($id)->delete();
        return redirect(route('drivers'));

        session()->flash('error', 'Не найдено!');
        return redirect(route('drivers'));
    }

    public function validateRequest(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'dob' => 'required|date',
            'email' => 'max:255'
        ];
        $message = [
            'name.required' => 'Поле Имя обязательно для заполнения',
            'name.max' => 'Поле Имя длина должна быть до :max символов',
            'surname.required' => 'Поле Фамилия обязательно для заполнения',
            'surname.max' => 'Поле Имя длина должна быть до :max символов',
            'dob.required' => 'Поле День Рождения обязательно для заполнения'
        ];
        return Validator::make($request->all(), $rules, $message);
    }
}
