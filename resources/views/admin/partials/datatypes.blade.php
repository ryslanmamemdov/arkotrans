@if ($dataTypeList)
    @php
        $datatype = \app\Models\DataType::TYPE;
    @endphp
    <h6>Данные по машине</h6>
    @foreach ($dataTypeList as $item)
        @switch($item->type)
            @case(array_search ($item->type, $datatype)=='NUM')
                <div class="col-md-4">
                    <label class="form-label" for="{{ $item->code }}">{{ $item->name }}</label>
                    <input class="form-control" id="{{ $item->code }}" name="{{ $item->code }}" value="{{ old($item->code) }}" type="number">
                </div>
            @break
            @case(array_search ($item->type, $datatype)=='DATE')
                <div class="col-md-4">
                    <label class="form-label" for="{{ $item->code }}">{{ $item->name }}</label>
                    <input class="form-control" id="{{ $item->code }}" name="{{ $item->code }}" min='1950-01-01'
                        max='' value="{{
                        //($fillItem && $fillItem->dob)?date('Y-m-d', ($fillItem->dob)):old($item->code)
                        old($item->code)
                    }}" type="date">
                </div>
            @break
            @case(array_search ($item->type, $datatype)=='STR')
            @default
                <div class="col-md-4">
                    <label class="form-label" for="{{ $item->code }}">{{ $item->name }}</label>
                    <input class="form-control" id="{{ $item->code }}" name="{{ $item->code }}" value="{{ old($item->code) }}" type="text">
                </div>
            @break


        @endswitch

    @endforeach
@endif
