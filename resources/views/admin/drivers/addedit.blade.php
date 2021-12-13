@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ __('Drivers') }}</h5>
        </div>
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ route('driver.store') }}">
                @csrf
                <div class="col-md-6">
                    <label class="form-label" for="name">Имя</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Уася" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="surname">Фамилия</label>
                    <input class="form-control" id="surname" name="surname" type="text" placeholder="Пупкин" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="dob">День р. (мм/дд/гггг)</label>
                    <input class="form-control" id="dob" name="dob" min='1899-01-01'
                        max='<?= date('Y-m-d', strtotime('-18 years')) ?>' type="date" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="email">Е-майл</label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="vasja@mail.ru">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
        </div>
    </div>
@endsection
