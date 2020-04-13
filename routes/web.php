<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('api/price', 'HomeController@getAPI');
Route::group(['namespace'=>'Frontend'], function() {
	Route::get('/', 'FrontendsController@getHome');
	Route::get('/contact', 'FrontendsController@getContact');
	Route::post('/contact', 'FrontendsController@postContact');
	Route::group(['prefix'=>'videos'], function() {
		Route::get('/', 'FrontendsController@getVideos');
		Route::get('/search/', 'FrontendsController@getVideosSearch');
		Route::get('/category/{slug}', 'FrontendsController@getVideosCategorySlug');
		Route::get('/{slug}', 'FrontendsController@getVideosDetailSlug');
		Route::get('/detail/{slug}', 'FrontendsController@getVideosDetailSlug');
	});
	Route::group(['prefix'=>'news'], function() {
		Route::get('/', 'FrontendsController@getNews');
		Route::get('/search/', 'FrontendsController@getNewsSearch');
		Route::get('/category/{slug}', 'FrontendsController@getNewsDetailCategorySlug');
		Route::get('/{slug}', 'FrontendsController@getNewsDetailSlug');
	});
	Route::group(['prefix'=>'review'], function() {
		Route::post('/product', 'FrontendsController@productReviews');
		Route::post('/cate', 'FrontendsController@cateReviews');
		Route::post('/news', 'FrontendsController@newsReviews');
		Route::post('/videos', 'FrontendsController@videosReviews');
	});
	Route::get('/category/{slug}', 'FrontendsController@getCategorySlug');
	Route::get('/product/{slug}', 'FrontendsController@getProductDetail');
	Route::get('/agency', 'FrontendsController@getAgency');
	Route::get('/support', 'FrontendsController@getSupport');
	Route::get('/search', 'FrontendsController@getSearch');
	Route::get('/login', 'FrontendsController@getAccount');
	Route::post('/login', 'FrontendsController@postAccount');
	Route::get('/register', 'FrontendsController@getRegister');
	Route::post('/register', 'FrontendsController@postRegister');
	Route::get('/cart', 'FrontendsController@getCarts');
	Route::post('/cart', 'FrontendsController@postCarts');
	Route::get('/pay', 'FrontendsController@getPays');
	Route::post('/pay', 'FrontendsController@postPays');
	// Đăng nhập thanh toán
	Route::post('pay/login', 'FrontendsController@postPayLogin');

	Route::post('/view', 'FrontendsController@postView');
	Route::post('/addtocart', 'FrontendsController@addProductToCart');
	Route::post('/deltocart', 'FrontendsController@delProductToCart');
	Route::get('/listtocart', 'FrontendsController@listToCart');

	Route::group(['prefix'=>'account'], function() {
		Route::get('/', 'FrontendsController@getAccountInfo');
		Route::get('/my-info', 'FrontendsController@myInfo');
		Route::get('change-name', 'FrontendsController@changeName');
		Route::post('change-name', 'FrontendsController@postChangeName');
		Route::get('change-phone', 'FrontendsController@changePhone');
		Route::post('change-phone', 'FrontendsController@postChangePhone');
		Route::get('change-address', 'FrontendsController@changeAddress');
		Route::post('change-address', 'FrontendsController@postChangeAddress');

		Route::get('orders', 'FrontendsController@listOrderAccount');
		Route::get('history', 'FrontendsController@listOrderHistoryAccount');
		Route::get('reviews', 'FrontendsController@listReviewAccount');

		Route::get('/logout', 'FrontendsController@getAccountLogout');
	});
});

Route::group(['namespace'=>'Backend', ], function() {
	Route::group(['middleware'=>'checklogin'], function() {
		Route::get('quantri/login', 'HomesController@getLogin');
		Route::post('quantri/login', 'HomesController@postLogin');
	});

	Route::group(['prefix'=>'admin', 'middleware'=>['checkadmin', 'checklogoutadmin']], function() {
		Route::get('/logout', 'HomesController@getLogout');
		Route::get('/', 'HomesController@getAdminHome');
		Route::get('/profile', 'HomesController@getProfile');
		Route::post('/profile', 'HomesController@postProfile');

		Route::group(['prefix'=>'account'], function() {
			Route::get('/', 'AccountsController@getAccount');
		});

		Route::group(['prefix'=>'category'], function() {
			Route::get('/', 'CategoriesController@getCategory');
			Route::get('/list_parent', 'CategoriesController@listParentCategories');
			Route::post('/add', 'CategoriesController@addCategory');
			Route::post('/del', 'CategoriesController@delCate');
		});

		Route::group(['prefix'=>'product'], function() {
			Route::get('/', 'ProductsController@getProduct');
			Route::get('/add', 'ProductsController@getAddProduct');
			Route::post('/add', 'ProductsController@postAddProduct');
			Route::get('/update/{id}', 'ProductsController@getUpdateProduct');
			Route::post('/update/{id}', 'ProductsController@postUpdateProduct');
			Route::post('/upload', 'ProductsController@uploadImgProduct');
			Route::post('/del', 'ProductsController@postDeleteProducts');
		});

		Route::group(['prefix'=>'post'], function() {
			Route::get('/', 'PostsController@getPosts');
			Route::get('/add', 'PostsController@getAddPosts');
			Route::post('/add', 'PostsController@postAddPosts');
			Route::get('/update/{id}', 'PostsController@getUpdatePosts');
			Route::post('/update/{id}', 'PostsController@postUpdatePosts');
			Route::post('/del', 'PostsController@postDeletePosts');
		});

		Route::group(['prefix'=>'video'], function() {
			Route::get('/', 'VideosController@getVideos');
			Route::get('/add', 'VideosController@getAddVideos');
			Route::post('/add', 'VideosController@postAddVideos');
			Route::get('/update/{id}', 'VideosController@getUpdateVideos');
			Route::post('/update/{id}', 'VideosController@postUpdateVideos');
			Route::post('/del', 'VideosController@postDeleteVideos');
		});

		Route::group(['prefix'=>'contact'], function() {
			Route::get('/', 'ContactsController@getContacts');
			Route::post('/del', 'ContactsController@postDeleteContacts');
		});

		Route::group(['prefix'=>'order'], function() {
			Route::get('/', 'OrdersController@listOrders');
			Route::post('confirm', 'OrdersController@confirmOrders');
			Route::post('/del', 'OrdersController@delOrders');
		});

		Route::group(['prefix'=>'setting'], function() {
			Route::get('/', 'SettingsController@getSetting');
			Route::get('/other', 'SettingsController@getOtherSetting');
			Route::post('/other', 'SettingsController@postOtherSetting');
			Route::post('/seo_index', 'SettingsController@postSeoIndexSetting');
			Route::get('/slider', 'SettingsController@getSlider');
			Route::get('/slider/add', 'SettingsController@getAddSlider');
			Route::post('/slider/add', 'SettingsController@postAddSlider');
			Route::get('/slider/update/{id}', 'SettingsController@getUpdateSlider');
			Route::post('/slider/update/{id}', 'SettingsController@postUpdateSlider');
			Route::post('/slider/del', 'SettingsController@postDeleteSliders');
		});


		Route::group(['prefix'=>'operation'], function() {
			Route::get('/', 'OperationController@getOperation');
			Route::post('/add_month', 'OperationController@addMonth');

			// Route::get('/add_room', 'OperationController@getAddRoom');
			// Route::post('/add_room', 'OperationController@postAddRoom');

			Route::get('/edit_room/{id}', 'OperationController@getEditRoom');
			Route::post('/edit_room/{id}', 'OperationController@postEditRoom');

			Route::get('total', 'OperationController@getTotal');
			Route::post('total', 'OperationController@postTotal');
		});
	});
});
