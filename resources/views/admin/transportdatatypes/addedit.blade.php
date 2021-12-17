@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{$title}}</h5>
        </div>
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ ($item && $item->id)?route('transportdatatypes.update', $item->id):route('transportdatatypes.store') }}">
                @csrf
                <div class="col-md-6">
                    <label class="form-label" for="name">Название</label>
                    <input class="form-control" id="name" name="name" value="{{ ($item && $item->name)?$item->name:old('name') }}" type="text" placeholder="Окта Страхование" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="code">Код</label>
                    <input class="form-control" id="code" name="code" value="{{ ($item && $item->code)?$item->code:old('code') }}" type="text" placeholder="OCTA" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="type">Тип данных</label>
                    <select class="form-select" id="type" name="type">
                        @foreach(\App\Models\DataType::TYPE AS $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                        @endforeach
{{--                        max='<?= date('Y-m-d', strtotime('-18 years')) ?>' value="{{ ($item && $item->dob)?date('Y-m-d', ($item->dob)):old('dob') }}" type="date" required>--}}
                    </select>
                </div>
                <input type="hidden" name="forwho" value="{{\App\Models\DataType::FORTRANSPORT}}" />
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
