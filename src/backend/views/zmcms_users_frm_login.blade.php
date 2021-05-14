@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
<form id="zmcms_users_frm_login" method="post" enctype="multipart/form-data">
	<div class="msg"></div>
	{!! csrf_field() !!}
	<input id="zufl_login" type="text" name="u" id="" value="" placeholder=" " >
	<label for="zufl_login">Login</label>
	<input id="zufl_pass"  type="password" name="p" id="p" value="" placeholder=" ">
	<label for="zufl_pass">Podaj hasło</label>
	<div class="micro12">
	<button>Zaloguj</button>
		<div class="micro12">
	</div>
		<a class="block_lnk" href="#">Nie pamiętam hasła</a>
	</div>
</form>
@endsection