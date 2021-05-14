@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
<h1 class="">Użytkownik "{{$data[0]->login}}"</h1>
<form class="micro12" id="zmcms_users_frm_panel" method="post" enctype="multipart/form-data">
    <ul>
        <li>Liczba dozwolonych pomyłek: {{$data[0]->total_login_try}}</li>
        <li>Pomyłki: {{$data[0]->total_login_tries}}</li>
    </ul>
    {!! csrf_field() !!}
    <input type="hidden" name="token" id="token" value="{{$data[0]->token}}">
    <div class="micro6 small3">
        <input id="zufmp_email"  type="text" name="mail" value="{{$data[0]->mail}}" placeholder=" ">
        <label for="zufmp_email">E-mail</label>
    </div>
    <div class="micro6 small3">
        <input id="zufmp_login"  type="text" name="login" value="{{$data[0]->login}}" placeholder=" ">
        <label for="zufmp_login">Login</label>
    </div>
    <div class="micro6 small3">
        <input id="zufmp_confirmed" type="text" name="confirmed" value="{{$data[0]->confirmed}}" placeholder=" ">
        <label for="zufmp_confirmed">Potwierdzony?</label>
    </div>
    <div class="micro6 small3">
        <select id="zufmp_active" name="active" id="active">
            <option value="0" @if($data[0]->active == '1')selected="selected" @endif>NIE</option>
            <option value="1" @if($data[0]->active == '1')selected="selected" @endif>TAK</option>
        </select>
        <label for="zufmp_active" >Aktywny?</label>
    </div>
    <div class="micro12 small4">
        <input id="zufmp_lname" type="text" name="name" id="name" value="{{$data[0]->name}}" placeholder=" ">
        <label for="zufmp_lname">Imię</label>
    </div>
    <div class="micro12 small4">
        <input id="zufmp_last_name" type="text" name="last_name" id="last_name" value="{{$data[0]->last_name}}" placeholder=" ">
        <label for="zufmp_last_name">Nazwisko</label>
    </div>
    <div class="micro12 small2">
        <input id="zufmp_last_nick" type="text" name="nick" value="{{$data[0]->nick}}" placeholder=" ">
        <label for="zufmp_last_nick">Nick</label>
    </div>
    <div class="micro12 small2">
        <select id="zufmp_last_sex" name="sex" id="sex">
            <option value="0" @if($data[0]->sex == 'M')selected="selected" @endif>Mężczyzna</option>
            <option value="1" @if($data[0]->sex == 'W')selected="selected" @endif>Kobieta</option>
            <option value="1" @if($data[0]->sex == 'NS')selected="selected" @endif>Nie podano</option>
        </select>
        <label for="zufmp_last_sex" class="micro12 mini6 small2">Płeć</label>
    </div>
    <div class="micro12 small3">
        <input id="zufmp_last_birthday" type="date" name="birthday" value="{{$data[0]->birthday}}" placeholder=" ">
        <label for="zufmp_last_birthday" >Data urodzenia</label>
    </div>
    <div class="micro12 small3">
        <select id="zufmp_last_roleid" name="role_id" id="role_id">
            <option value="1" @if($data[0]->role_id == 'superadmin')selected="guest" @endif>Gość</option>
            <option value="1" @if($data[0]->role_id == 'Ssuperadmin')selected="editor" @endif>Redaktor</option>
            <option value="0" @if($data[0]->role_id == 'superadmin')selected="selected" @endif>Superadmin</option>
            <option value="1" @if($data[0]->role_id == '')selected="guest" @endif>Nie wybrano</option>
        </select>
        <label for="zufmp_last_roleid">Rola</label>
    </div>
    <div class="micro12 small3">
        <div class="micro8 small7">
            <input id="zufmp_last_ilustration" type="text" name="ilustration" value="{{$data[0]->ilustration}}" placeholder=" ">
            <label for="zufmp_last_ilustration">Ilustracja</label>
        </div>
        <div class="micro4 small5">
            <button id="backend_user_ilustration" data-selectfld="ilustration">Wybierz</button>
        </div>
    </div>
    <div class="micro12 small3">
        <input for="zufmp_last_homepage"type="text" name="homepage" value="{{$data[0]->homepage}}"placeholder=" ">
        <label id="backend_user_homepage">Strona startowa</label>
    </div>
    <div class="micro12">
        <button class="micro12" id="zuf_btn_save">Zapisz zmiany</button>
        <button class="micro12" id="zuf_btn_new">Nowy użytkownik</button>
        <button class="micro12" id="zuf_btn_del" class="del">Usuń użytkownika</button>
    <div class="micro12 small3">
</form>
@endsection