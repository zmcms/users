<?php
namespace Zmcms\Users\Backend\Controllers;
use Illuminate\Http\Request;
use Session;
class ZmcmsUsersController extends \App\Http\Controllers\Controller
{
	public function zmcms_backend_user_login(Request $request){
		$data['u'] = strip_tags($request->all()['u']);
		$data['p'] = strip_tags($request->all()['p']);
		return $result = \Zmcms\Users\Backend\Db\Queries::check_login_data($data);
	}
	public function zmcms_users_frm_panel(){
		$data = \Zmcms\Users\Backend\Db\Queries::get_user_data(Session::get('backend_user')['token']);
		return view('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_users_frm_account', compact('data'));
	}
	public function zmcms_users_logout(){
		Session::forget('backend_user');
		return redirect(Config('zmcms.main.backend_prefix').'/login');
	}
	public function zmcms_users_frm_panel_save(Request $request){
		$data = print_r($request->all());
		return '<p style="color: #fff"><pre>'.$data.'</pre></p>';
	}
	public function zmcms_users_frm_panel_new_user(Request $request){
		return '<p style="color: #fff">zmcms_users_frm_panel_new_user</p>';
	}
	public function zmcms_users_frm_panel_delete_user(Request $request){
		return '<p style="color: #fff">zmcms_users_frm_panel_delete_user</p>';
	}

}
