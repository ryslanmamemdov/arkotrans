<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrailersController extends Controller
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
        $item = Transport::all()->where('type',Transport::TRAILERS);
        $title = 'Все прицепы';

        return view('admin.trailers.index', ['item' => $item, 'title' => $title]);
    }

    public function add()
    {
        $item = new Transport();
        $title = 'Новый прицеп';
        return view('admin.trailers.addedit',['item' => $item, 'title' => $title]);
    }

    public function store(Request $request)
    {
        $validator = self::validateRequest($request);

        if ($validator->passes()) {
            $item = Transport::storeRecord($request);

            session()->flash('message', 'Добавлен новый прицеп - '.$item->number);
            return redirect(route('trailers'));
        }

        return redirect(route('trailer.add'))
            ->withErrors($validator)
            ->withInput();
    }

    public function edit($id)
    {
        $item = Transport::find($id);
        if ($item)
            $title = 'Редактировать прицеп';
        return view('admin.trailers.addedit', compact('item', 'title'));

        session()->flash('error', 'Не найдено!');
        return redirect(route('trailers'));
    }

    public function update(Request $request, $id)
    {
        $validator = self::validateRequest($request);
        if ($validator->passes()) {
            $item = Transport::updateRecord($request, $id);

            session()->flash('message', 'Прицеп '.$item->number.' отредактирована');
            return redirect(route('trailers'));
        }

        return redirect(route('trailer.edit',$id))
            ->withErrors($validator)
            ->withInput();
    }
    public function delete($id)
    {
        $item = Transport::find($id);
        if ($item){
            session()->flash('message', 'Удалён прицеп - '.$item->name.' '.$item->surname);
            $item->delete();
        }
        return redirect(route('trailers'));

        session()->flash('error', 'Не найдено!');
        return redirect(route('trailers'));
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
