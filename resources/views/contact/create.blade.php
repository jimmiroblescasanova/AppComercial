@extends('layouts.main')

@section('title', 'Contacto')

@section('content-title', 'Mensaje de contacto')

@section('content')
    <div class="card">
        <div class="card-header">
            Enviar un mensaje a mi agente de venta
        </div>
        <div class="card-body">
            <form action="{{ route('clients.contact.send') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="subject">Asunto:</label>
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Asunto del mensaje" value="este es un mensaje de prueba">
                    {!! $errors->first('subject', '<span class="text-muted">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label for="message">Mensaje:</label>
                    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Escribe tu mensaje">probando un mensaje de contacto</textarea>
                    {!! $errors->first('message', '<span class="text-muted">:message</span>') !!}
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar mensaje</button>
            </form>
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>
@stop
