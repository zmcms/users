@extends('themes.zmcms.backend.main')
@section('content')
<h1 class="">Użytkownik "{{$data[0]->login}}"</h1>
<form class="micro12" id="zmcms_users_frm_panel" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <input type="hidden" name="token" id="token" value="{{$data[0]->token}}">
    <label class="micro12 mini6 small3">
        <span class="micro3">E-mail</span>
        <input class="micro9" type="text" name="mail" id="mail" value="{{$data[0]->mail}}">
    </label>
    <label class="micro12 mini6 small3">
        <span class="micro3">Login</span>
        <input class="micro9" type="text" name="login" id="login" value="{{$data[0]->login}}">
    </label>
    <label class="micro12 mini6 small3">
        <span class="micro3 small6">Potwierdzony?</span>
        <input class="micro9 small6" type="text" name="confirmed" id="confirmed" value="{{$data[0]->confirmed}}">
    </label>
    <label class="micro12 mini6 small3">
        <span class="micro3 small6">Aktywny?</span>
        <select class="micro9 small6" name="active" id="active">
            <option value="0" @if($data[0]->active == '1')selected="selected" @endif>NIE</option>
            <option value="1" @if($data[0]->active == '1')selected="selected" @endif>TAK</option>
        </select>
    </label>
    <label class="micro12 mini6 small4">
        <span class="micro3">Imię</span>
        <input class="micro9" type="text" name="name" id="name" value="{{$data[0]->name}}">
    </label>
    <label class="micro12 mini6 small4">
        <span class="micro3">Nazwisko</span>
        <input class="micro9" type="text" name="last_name" id="last_name" value="{{$data[0]->last_name}}">
    </label>
    <label class="micro12 mini6 small4">
        <span class="micro3">Nick</span>
        <input class="micro9" type="text" name="nick" id="nick" value="{{$data[0]->nick}}">
    </label>
    <label class="micro12 mini6 small2">
        <span class="micro4">Płeć</span>
        <select class="micro8" name="sex" id="sex">
            <option value="0" @if($data[0]->sex == 'M')selected="selected" @endif>Mężczyzna</option>
            <option value="1" @if($data[0]->sex == 'W')selected="selected" @endif>Kobieta</option>
            <option value="1" @if($data[0]->sex == 'NS')selected="selected" @endif>Nie podano</option>
        </select>
    </label>
    <label class="micro12 mini6 small3">
        <span class="micro3 small6">Data urodzenia</span>
        <input class="micro9 small6" type="text" name="birthday" id="birthday" value="{{$data[0]->birthday}}">
    </label>
    
    <label class="micro12 mini6 small3">
        <span class="micro3">Rola</span>
        <select class="micro8" name="role_id" id="role_id">
            <option value="1" @if($data[0]->role_id == 'superadmin')selected="guest" @endif>Gość</option>
            <option value="1" @if($data[0]->role_id == 'Ssuperadmin')selected="editor" @endif>Redaktor</option>
            <option value="0" @if($data[0]->role_id == 'superadmin')selected="selected" @endif>Superadmin</option>
            <option value="1" @if($data[0]->role_id == '')selected="guest" @endif>Nie wybrano</option>
        </select>
        {{-- <input class="micro9" type="text" name="role_id" id="role_id" value="{{$data[0]->role_id}}"> --}}
    </label>
    <label class="micro12 mini6 small4">
        <span class="micro3 small3">Ilustracja</span>
        <input class="micro9 small6" type="text" name="ilustration" id="ilustration" value="{{$data[0]->ilustration}}">
        <button id="backend_user_ilustration" class="small3">Wybierz</button>
    </label>
    <label class="micro12 mini6 small3">
        <span class="micro12">Liczba dozwolonych pomyłek: {{$data[0]->total_login_try}}</span>
    </label>
    <label class="micro12 mini6 small2">
        <span class="micro12">Pomyłki: {{$data[0]->total_login_tries}}</span>
    </label>
    <label class="micro12 mini6 small7">
        <span class="micro3">Strona startowa</span>
        <input class="micro9" type="text" name="homepage" id="homepage" value="{{$data[0]->homepage}}">
    </label>
    <button id="btn_save">Zapisz zmiany</button>
    <button id="btn_new">Nowy użytkownik</button>
    <button id="btn_del" class="del">Usuń użytkownika</button>
</form>
@endsection