<!-- resources/views/modul/ufs.blade.php -->

@foreach ($ufs as $ufId => $ufName)
    <option value="{{ $ufId }}">{{ $ufName }}</option>
@endforeach
