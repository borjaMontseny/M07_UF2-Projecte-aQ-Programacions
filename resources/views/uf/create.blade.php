@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Uf
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} UF</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ufs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="modul_id">{{ __('Modul') }}</label>
                                <select class="form-control" id="modul_id" name="modul_id">
                                    @foreach ($moduls as $modul)
                                        <option value="{{ $modul->id }}">{{ $modul->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @include('uf.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
