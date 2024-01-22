<!-- resources/views/uf/ras.blade.php -->

@foreach ($ras as $raId => $raName)
    <option value="{{ $raId }}">{{ $raName }}</option>
@endforeach
