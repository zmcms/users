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



<p>Czyli jak przewidzieli psychologowie, lubimy suspens, czerpiemy ze strachu brakującą dawkę adrenaliny, a może jak piszą psychoterapeuci "Za podstawowy aspekt, odpowiadający za zamiłowanie ludzkości do odczuwania strachu, uznawane jest to, że kiedy się boimy, to ta właśnie emocja typowo przesłania wszelkie inne myśli, które wcześniej znajdowały się w naszych głowach".</p>
<p>Wydaje mi się, że wielu z nas ma teraz w życiu wystarczająco trudno. Dodatkowo negatywne odczucia związane z koronawirusem i związanymi z nim obostrzeniami przechylają szalę niebezpiecznie tylko w jedną stronę negatywnych odczuć. Można wręcz pomyśleć, że żyjemy w czasach ostatecznych.</p>
<p><strong>Stąd moja kontrpropozycja. Sprawdzony "Książkowy Pakiet Antystresowy", na który składają się następujące tytuły:</strong></p>
<ul>
<li>Jaroslav Hašek, <strong>Przygody Dobrego Wojaka Szwejka, t.1.2.</strong></li>
<li>Charles de Coster,<strong> Przygody Dyla Sowizdrzała i Jagnuszka Poczciwca</strong></li>
<li>Miguela de Cervantesa,<strong> Przemyślny szlachcic don Kichot z Manczy</strong>, t.1.2.,koniecznie w nowym tłumaczeniu Wojciecha Charchalisa</li>
<li>Francisco de Quevedo, <span class="citation"><strong> Żywot młodzika niepoczciwego imieniem Pablos czyli wzór dla obieżyświatów i zwierciadło filutów,</strong> w świetnym tłumaczeniu Kaliny Wojciechowskiej</span></li>
<li>Francois Rabelais, <strong>Gargantua i Pantagruel</strong></li>
<li>Geoffrey Chauser, <strong>Opowieści kantenberyjskie</strong></li>
<li>Giovanni Boccaccio, <strong>Dekameron</strong></li>
<li>Anonim, <strong>Łazik z Tormesu</strong></li>
<li>Lawrence Sterne, <strong>Życie i myśli JW Pana Tristrama Shandy</strong></li>
<li>Włodzimierz Wojnowicz, <strong><span class="st">Życie i niezwykłe <em>przygody żołnierza</em> Iwana <em>Czonkina</em></span></strong></li>
<li>Efraim Sevela<strong>, Monia Cackens</strong></li>
<li>Karel Čapek, <strong>Bajki i przypowiastki</strong></li>
<li>Karel Čapek, <strong>Nowele i Opowiadamia</strong></li>
<li>Bohumil Hrabal,<strong> Postrzyżyny</strong></li>
<li>Ilf i Pietrow, <strong>Dwanaście krzeseł</strong></li>
<li><span class="st">Jaroslav <em>Hašek</em></span><strong>,<em>Tasiemiec Księżnej Pani i inne opowieści</em></strong></li>
<li>Karel Michal, <strong>Straszydła na co dzień</strong></li>
<li>Evżen Boćek, <strong>Arystokratka na koniu,</strong></li>
<li>Evżen Boćek,<strong> Arystokratka w ukropie</strong></li>
<li>Evżen Boćek,<strong> Ostatnia Arystokratka<br /></strong><br /></li>
</ul>
<p style="margin-bottom: 0cm; line-height: 100%;" align="left"><span class="citation">Dominują czescy autorzy, ale moim zdaniem tylko oni mają to poczucie humoru w tej części Europy, który można nazwać zdrowym.</span></p>
<p style="margin-bottom: 0cm; line-height: 100%;" align="left"><span class="citation">Gwarantowana dawka dobrego humoru, świetnej zabawy literackimi konwencjami. Ten mój zestaw antystresowy przetestowany został w moim bliskim i tym nieco dalszym otoczeniu - na rodzinie, przyjaciołach i części znajomych. Nikt nie wnosił reklamacji! </span></p>
<p style="margin-bottom: 0cm; line-height: 100%;" align="left"><span class="citation">A jaki jest Twój "Książkowy Pakiet Antystresowy"? Napisz - <a href="mailto:redakcja@ksiazka.net.pl">redakcja@ksiazka.net.pl</a></span></p>
<p style="margin-bottom: 0cm; line-height: 100%;" align="left"> </p>
<p style="margin-bottom: 0cm; line-height: 100%;" align="left"><span class="citation">Gabriel Leonard Kamiński </span></p>