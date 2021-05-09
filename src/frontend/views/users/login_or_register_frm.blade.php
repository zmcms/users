@extends('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.main')
@section('content')
	<header>
	<h1>{{___('Konto użytkownika')}}</h1>	
	</header>
	<content>
		<section class="micro12">
			<section class="user_action_box micro12 mini6 small6">
				<h4>{{ ___('Logowanie') }}</h4>
				<form>
					<div class="micro12">
						<input type="text" id="login" name="login" placeholder=" ">
						<label for="login">{{ ___('Login') }}</label>
					</div>
					<div class="micro12">
						<input type="password" id="passwd" name="passwd" placeholder=" ">
						<label for="passwd">{{ ___('Hasło') }}</label>
					</div>
					<button>{{ ___('Zaloguj się') }}</button>
					<div class="micro12">
						<a href="#">{{___('Nie pamiętam hasła')}}</a>
					</div>
				</form>
			</section>
		
			<section class="user_action_box micro12 mini6 small6">
				<h4>{{ ___('Nowe konto') }}</h4>
				<p>{{___('Jeżeli nie masz jeszcze u nas konta, możesz je założyć już teraz. Zarejestrowani i aktywni użytkownicy mają u nas różne bonusy.')}}</p>
				<a href="/{{Config(Config('zmcms.frontend.theme_name').'.main.frontend_prefix').'/usr/register'}}" class="btn">{{ ___('Zarejestruj się') }}</a>
			</section>
		</section>
	</content>
@endsection