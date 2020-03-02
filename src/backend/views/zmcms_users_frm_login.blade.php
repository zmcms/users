@extends('themes.zmcms.backend.main')
@section('content')
<form id="zmcms_users_frm_login" method="post" enctype="multipart/form-data">
	<input type="text" name="u" id="" value="" placeholder="Podaj login" >
	<input type="password" name="p" id="p" value="" placeholder="Podaj hasło" >
	<button>Zaloguj</button>
	<a href="#">Nie pamiętam hasła</a>
</form>
@endsection