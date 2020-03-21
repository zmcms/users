@extends('themes.zmcms.backend.main')
@section('content')
<form id="zmcms_users_frm_login" method="post" enctype="multipart/form-data">
	<div class="msg"></div>
	{!! csrf_field() !!}
	<label class="micro12">
		<input  class="micro12" type="text" name="u" id="" value="" placeholder="Podaj login" >
	</label>
	<label class="micro12">
		<input  class="micro12" type="password" name="p" id="p" value="" placeholder="Podaj hasło" >
	</label>
	<button>Zaloguj</button>
	<a class="block_lnk" href="#">Nie pamiętam hasła</a>
</form>
@endsection