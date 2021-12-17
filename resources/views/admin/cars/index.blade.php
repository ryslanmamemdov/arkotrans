@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="card-header"><h5>{{$title}}</h5></div>

        <div class="card-body">
            <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-outline-primary" href="{{route('car.add')}}" type="button">Новая маниша</a>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Номер</th>
                    <th scope="col">Статус</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                @if ($item)
                    <tbody>
                    @foreach ($item as $i)
                        <tr>
                            <th scope="row">{{$i->id}}</th>
                            <td>{{$i->number}}</td>
                            <td>
                                @if($i->status)
                                    <span class="nav-icon cil-check-circle link-success"></span>
                                @else
                                    <span class="nav-icon cil-x-circle link-danger"></span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('car.edit', $i->id)}}" class="link-dark text-decoration-none">
                                    <span class="nav-icon cil-highlighter"></span>
                                </a>
                                &nbsp;
                                <a href="{{route('car.delete', $i->id)}}"
                                   onclick="return confirm('Удалить водителя?')" class="link-dark text-decoration-none">
                                    <span class="nav-icon cil-delete"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach($item)
                    </tbody>
                @endif
            </table>
            <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-outline-primary" href="{{route('car.add')}}" type="button">Новая маниша</a>
            </div>
        </div>
    </div>
@endsection
