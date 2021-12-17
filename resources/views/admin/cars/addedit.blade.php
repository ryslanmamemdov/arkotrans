@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{$title}}</h5>
        </div>
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ ($item && $item->id)?route('car.update', $item->id):route('car.store') }}">
                @csrf
                <div class="col-md-6">
                    <label class="form-label" for="number">Номер</label>
                    <input class="form-control" id="number" name="number" value="{{ ($item && $item->number)?$item->number:old('number') }}" type="text" placeholder="AA1234" required>
                </div>
                <div class="col-md-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" id="status" name="status"
                            @if ($item && $item->status || old('status'))
                               checked
                            @endif
                        type="checkbox">
                        <label class="form-check-label" for="status">Cтатус</label>
                    </div>
                </div>
                <input type="hidden" name="type" value="{{\App\Models\Transport::CARS}}" />
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
