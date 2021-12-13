<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

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

        return view('admin.drivers.index', ['item'=>$item]);
    }

    public function add()
    {
        return view('admin.drivers.addedit', ['action'=>'add']);
    }

    public function store(Request $request)
    {
        $a = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'dob' => 'required|date',
            'email' => 'max:255'
        ]);
        dd($a);

        return redirect(route('driver.edit', 1));
    }
    public function edit(Request $request, $id)
    {
        $item = Driver::find($id);
        if($item)
            return view('admin.drivers.addedit', ['action'=>'edit', 'item'=>$item]);

        session()->flash('error', 'Не найдено!');
        return redirect(route('drivers'));
    }
}
