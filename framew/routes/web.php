<?php




$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api){
	$api->group([ 'namespace' => 'App\Http\Controllers'],function($api){
		//latest
		$api->get('news','ApiController@getNews');
		//detail
		$api->get('detail-news/{id}','ApiController@getDetailNews');
		//news by type
		$api->get('news-by-type/{id_type}','ApiController@getNewsByType');
		//dangki
		$api->post('register','ApiController@getAuthenticatedUser');
		//dang nhap
		$api->post('login','ApiController@login');

		//Kiểm tra đăng nhập
		$api->post('check-login','ApiController@checkLogin');


		//quên mật khẩu
		$api->post('forget-password','ApiController@forgetPassword');

		//Đổi mật khẩu
		$api->post('reset-password','ApiController@resetPassword');

		//update info
		$api->get('update-info','ApiController@getUpdateInfo');
		$api->post('update-info',[
			'as'=>'updateinfo',
			'uses'=>'ApiController@postUpdateInfo'
		]);

		//MyCancer Aid
		//list cancer
		$api->get('list-cancer/{id_user}','ApiController@getListCancer');

		//list cancer type
		$api->get('list-cancer-type','ApiController@getAllCancerType');
		//detail list cancer
			//type
			$api->get('detail-list-cancer/type/{id_cancer_type}','ApiController@getDetailTypeListCancer');

			//site
			$api->get('detail-list-cancer/site/{id_user}/{id_cancer_type}','ApiController@getDetailSiteListCancer');

			//diagnosis
			$api->get('detail-list-cancer/diagnosis/{id_user}/{id_cancer_type}','ApiController@getDetailDiagnosisListCancer');

			//pathology
			$api->get('detail-list-cancer/pathology/{id_user}/{id_cancer_type}','ApiController@getDetailPathologyListCancer');

		//add cancer user
		$api->post('add-cancer','ApiController@addCancer');



		$api->get('user',function(){
			$user = App\User::all();
			return $user;
		});
		
	});

	

});



// Route::group(['prefix'=>'api'],function(){
// 	Route::get('news','ApiController@getNews');
// });


Route::get('trangchu',"PageController@getIndex");

Route::get('add-cancer-type',[
	'as'=>'add_cancer_detail',
	'uses'=>'PageController@getAddCancerDetail'
]);

Route::get('test',function(){
	$user = App\User::all();
		return $user;
	});





Auth::routes();

Route::get('/home', 'HomeController@index');




Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Clear Config cleared</h1>';
});
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});
