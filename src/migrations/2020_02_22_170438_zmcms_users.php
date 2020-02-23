<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ZmcmsUsers extends Migration{
	public function up(){
		$tblNamePrefix=(Config('database.prefix')??'');
		$tblName=$tblNamePrefix.'frontend_users';
		Schema::create($tblName, function($table){$table->string('token', 75);}); // token uzytkownika
		Schema::table($tblName, function($table){$table->string('mail', 50)->unique();}); // e-mail użyty do rejestracji uzytkownika
		Schema::table($tblName, function($table){$table->string('login', 15)->unique();});  // wybrany login użytkowika
		Schema::table($tblName, function($table){$table->string('active', 1);}); // 1- aktywny, 0- nieaktywny
		Schema::table($tblName, function($table){$table->string('role_id', 15)->nullable();});  //Identyfikator roli użytkownika, np.: administrator, redaktor itp.
		Schema::table($tblName, function($table){$table->string('name', 50);}); // Imię
		Schema::table($tblName, function($table){$table->string('last_name', 50);}); // Nazwisko
		Schema::table($tblName, function($table){$table->string('nick', 50)->nullable();});  // Nick
		Schema::table($tblName, function($table){$table->enum('sex', ['M','W', 'NS']);}); //M- man W-Woman NS - not specified
		Schema::table($tblName, function($table){$table->string('ilustration', 255)->nullable();});
		Schema::table($tblName, function($table){$table->date('birthday')->nullable();}); // Data urodzin
		Schema::table($tblName, function($table){$table->string('confirmed', 1);});
		Schema::table($tblName, function($table){$table->tinyInteger('login_try')->default(Config('zmcms.frontend_users.max_login_try'));});
		Schema::table($tblName, function($table){$table->tinyInteger('total_login_try')->default(Config('zmcms.frontend_users.max_total_login_try'));});		
		Schema::table($tblName, function($table){$table->string('homepage', 70)->default(Config('zmcms.frontend_users.default_home_page'));});
		Schema::table($tblName, function($table){$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));});//Imię
		Schema::table($tblName, function($table){$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));});//Imię
		Schema::table($tblName, function($table){$table->primary('token');});


		$tblName=$tblNamePrefix.'backend_users';
		Schema::create($tblName, function($table){$table->string('token', 75);}); // token uzytkownika
		Schema::table($tblName, function($table){$table->string('mail', 50)->unique();}); // e-mail użyty do rejestracji uzytkownika
		Schema::table($tblName, function($table){$table->string('login', 15)->unique();});  // wybrany login użytkowika
		Schema::table($tblName, function($table){$table->string('active', 1);}); // 1- aktywny, 0- nieaktywny
		Schema::table($tblName, function($table){$table->string('role_id', 15)->nullable();});  //Identyfikator roli użytkownika, np.: administrator, redaktor itp.
		Schema::table($tblName, function($table){$table->string('name', 50);}); // Imię
		Schema::table($tblName, function($table){$table->string('last_name', 50);}); // Nazwisko
		Schema::table($tblName, function($table){$table->string('nick', 50)->nullable();});  // Nick
		Schema::table($tblName, function($table){$table->enum('sex', ['M','W', 'NS']);}); //M- man W-Woman NS - not specified
		Schema::table($tblName, function($table){$table->string('ilustration', 255)->nullable();});
		Schema::table($tblName, function($table){$table->date('birthday')->nullable();}); // Data urodzin
		Schema::table($tblName, function($table){$table->string('confirmed', 1);});
		Schema::table($tblName, function($table){$table->tinyInteger('login_try')->default(Config('zmcms.backend_users.max_login_try'));});
		Schema::table($tblName, function($table){$table->tinyInteger('total_login_try')->default(Config('zmcms.backend_users.max_total_login_try'));});		
		Schema::table($tblName, function($table){$table->string('homepage', 70)->default(Config('zmcms.backend_users.default_home_page'));});
		Schema::table($tblName, function($table){$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));});//Imię
		Schema::table($tblName, function($table){$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));});//Imię
		Schema::table($tblName, function($table){$table->primary('token');});

	}
	public function down(){
	}
}
