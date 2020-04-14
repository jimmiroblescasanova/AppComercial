@extends('layouts.main')

@section('title', 'Contacto')

@section('content-title', 'Mensaje de contacto')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Este mensaje se enviará directamente a mi agente de venta asignado
                </div>
                <div class="card-body">
                    <form action="{{ route('clients.contact.send') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="subject">Asunto:</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Asunto del mensaje">
                            {!! $errors->first('subject', '<span class="text-muted">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="message">Mensaje:</label>
                            <textarea class="form-control" name="message" id="message" rows="3" placeholder="Escribe tu mensaje"></textarea>
                            {!! $errors->first('message', '<span class="text-muted">:message</span>') !!}
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Enviar mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
