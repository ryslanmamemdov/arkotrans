@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="card-header"><h5>{{$title}}</h5></div>

        <div class="card-body">
            <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-outline-primary" href="{{route('transportdatatypes.add')}}" type="button">Новый тип</a>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Code</th>
                    <th scope="col">Тип</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                @if ($item)
                    @php
                    $datatype = DataType::TYPE;
                    @endphp
                    <tbody>
                    @foreach ($item as $i)
                        <tr>
                            <th scope="row">{{$i->id}}</th>
                            <td>{{$i->name}}</td>
                            <td>{{$i->code}}</td>
                            <td>{{array_search ($i->type, $datatype)}}</td>
                            <td>
                                <a href="{{route('transportdatatypes.edit', $i->id)}}" class="link-dark text-decoration-none">
                                    <span class="nav-icon cil-highlighter"></span>
                                </a>                                &nbsp;
                                <a href="{{route('transportdatatypes.delete', $i->id)}}"
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
                <a class="btn btn-outline-primary" href="{{route('transportdatatypes.add')}}" type="button">Новый тип</a>
            </div>
        </div>
    </div>
@endsection
