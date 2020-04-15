@extends('layouts.main')

@section('title', 'Clientes')

@section('content-title', 'Actualizar mis datos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('clients.update') }}" method="POST">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="name">Nombre o razón social</label>
                            <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ Auth::user()->name }}">
                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            <label for="rfc">RFC</label>
                            <input type="text" class="form-control {{ $errors->first('rfc') ? 'is-invalid' : '' }}" name="rfc" id="rfc" value="{{ Auth::user()->rfc }}">
                            {!! $errors->first('rfc', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            <label for="cfdi">Uso de CFDi</label>
                            <select class="form-control" name="uso_cfdi" id="cfdi">
                                <option value="P01">P01 - Por definir</option>
                                <option value="G01">G01 - Adquisición de mercancías</option>
                                <option value="G03">G03 - Gastos en general</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="text" class="form-control {{ $errors->first('phone') ? 'is-invalid' : '' }}" name="phone" id="phone" value="{{ Auth::user()->phone }}">
                            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}" name="email" id="email" value="{{ Auth::user()->email }}">
                            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                            <button type="button" class="btn btn-link btn-block" onclick="history.back();return false;">Atrás</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
