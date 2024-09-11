<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    @foreach ($fields as $field)
        <div class="form-group mb-2">
            <label>{{ @$field['label'] ?? $field['name'] }}:</label>
            @switch (@$field['type'])
                @case('textarea')
                    <textarea class="form-control" name="{{ $field['name'] }}"></textarea>
                    @break
                @case('select')
                    <select class="form-select" name="{{ $field['name'] }}">
                        @foreach ($field['options'] as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                    @break
                @default
                    <input class="form-control" type="{{ @$field['type'] ?? 'text' }}" name="{{ $field['name'] }}" />
            @endswitch
        </div>
    @endforeach
</form>