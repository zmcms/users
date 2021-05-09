@extends('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.main')
@section('content')
	<header>
	<h1>{{___('Rejestracja konta użytkownika')}}</h1>	
	<pre>{{print_r($data, true)}}</pre>
	</header>
	<content>
		@if($err!=[])
			<ul>
			@foreach($err as $e)
			<li>{{$e}}</li>
			@endforeach
			</ul>
		@endif
		@if(isset($data['result']))
		<pre>{{print_r($data['result'], true)}}</pre>
		@endif
		<form method="POST" action="{{Request::url()}}" accept-charset="UTF-8" id="valuationFrm" enctype="multipart/form-data">

			<input type="hidden" name="MAX_FILE_SIZE" value="4194304" /> 

			<div class="micro12 mini6 small6">
				<input type="email" id="mail" name="mail" placeholder=" " value="{{$data['post']['mail'] ?? null}}" required/>
				<label for="mail">{{___('E-mail') }}</label>
			</div>
			<div class="micro12 mini6 small6">
				<input type="text" id="login" name="login" placeholder=" " value="{{$data['post']['login'] ?? null}}" required/>
				<label for="login">{{___('Podaj login') }}</label>
			</div>
			<div class="micro12 mini6 small6">
				<input type="password" id="password" name="password" placeholder=" " value="{{$data['post']['password'] ?? null}}" equired/>
				<label for="password">{{___('Podaj hasło') }}</label>
			</div>
			<div class="micro12 mini6 small6">
				<input type="password" id="password_confirm" name="password_confirm" placeholder=" " value="{{$data['post']['password_confirm'] ?? null}}" required/>
				<label for="password_confirm">{{___('Potwierdź hasło') }}</label>
			</div>
			<div class="micro12">
				<div class="micro12 mini2 small2">
					<select id="sex" name="sex" placeholder=" ">
    				    <option value="W">{{___('Pani')}}</option>
    				    <option value="M">{{___('Pan')}}</option>
    				    <option value="NS">{{___('Nie podaję')}}</option>
    				</select>
					<label for="sex">{{___('Płeć') }}</label>
				</div>
				<div class="micro12 mini5 small5">
					<input type="text" id="login" name="name" placeholder=" " value="{{$data['post']['name'] ?? null}}" />
					<label for="mail">{{___('Imię') }}</label>
				</div>
				<div class="micro12 mini5 small5">
					<input type="text" id="login" name="last_name" placeholder=" " value="{{$data['post']['last_name'] ?? null}}" />
					<label for="mail">{{___('Nazwisko') }}</label>
				</div>
			</div>
			<div class="micro12">
				<input type="checkbox" id="contact_frm_gdpr_agreement" name="gdpr_agreement">
				<label for="contact_frm_gdpr_agreement"> Wyrażam zgodę na przetwarzanie danych osobowych zgodnie z postanowieniami <a href="#">regulaminu</a>.</label>
			</div>
			<input type="submit" value="{{___($settings['btnsave'])}}" >
		</form>
	</content>
@endsection

{{-- 
		$settings=[
			'title'	=> ___('Rejestracja konta użytkownika'),
			'action' => 'create',
			'btnsave' => 'Zarejestruj',
		];

token
mail
login
active
role_id
name
last_name
nick
sex
ilustration
birthday
confirmed
login_try
total_login_try
homepage
password --}}