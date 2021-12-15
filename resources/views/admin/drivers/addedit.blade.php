@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Водитель</h5>
        </div>
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ ($item && $item->id)?route('driver.update', $item->id):route('driver.store') }}">
                @csrf
                <div class="col-md-6">
                    <label class="form-label" for="name">Имя</label>
                    <input class="form-control" id="name" name="name" value="{{ ($item && $item->name)?$item->name:old('name') }}" type="text" placeholder="Уася" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="surname">Фамилия</label>
                    <input class="form-control" id="surname" name="surname" value="{{ ($item && $item->surname)?$item->surname:old('surname') }}" type="text" placeholder="Пупкин" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="dob">День Рождения (мм/дд/гггг)</label>
                    <input class="form-control" id="dob" name="dob" min='1950-01-01'
                        max='<?= date('Y-m-d', strtotime('-18 years')) ?>' value="{{ ($item && $item->dob)?date('Y-m-d', ($item->dob)):old('dob') }}" type="date" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="email">Е-майл</label>
                    <input class="form-control" id="email" name="email" value="{{ ($item && $item->email)?$item->email:old('email') }}" type="email" placeholder="vasja@mail.ru">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
