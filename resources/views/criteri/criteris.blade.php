<!-- resources/views/criteri/criteris.blade.php -->

@foreach ($criteris as $criteriId => $criteriName)
    <option value="{{ $criteriId }}">{{ $criteriName }}</option>
@endforeach