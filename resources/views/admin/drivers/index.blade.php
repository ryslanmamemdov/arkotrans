@extends('admin.layouts.app')

@section('content')

            <div class="card">
                <div class="card-header"><h5>{{ __('Drivers') }}</h5></div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-outline-primary" href="{{route('driver.add')}}" type="button">Новый водитель</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Фамилия</th>
                                <th scope="col">День Р.</th>
                            </tr>
                        </thead>
                        @if ($item)
                            <tbody>
                                @foreach ($item as $i)
                                    <tr>
                                        <th scope="row">{{$i->id}}</th>
                                        <td>{{$i->name}}</td>
                                        <td>{{$i->surname}}</td>
                                        <td>{{$i->dob}}</td>
                                    </tr>
                                @endforeach($item)
                            </tbody>
                        @endif
                    </table>
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-outline-primary" href="{{route('driver.add')}}" type="button">Новый водитель</a>
                    </div>
                </div>
            </div>
@endsection