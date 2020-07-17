<?php

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {

    echo 'Hello World!';

});

Route::get('/greeting/{name?}', function ($name = null) {

    if ($name) {

        echo 'Hello ' . $name . '!';

    } else {

        echo 'Hello World!';

    }

});

Route::get('/login', function() {
    return view('login');
});

Route::post('/login', function (Illuminate\Http\Request $request) {
    if ($request->username == 'admin'
    && $request->password == 'admin') {
    return view('welcome_admin');
}

return view('login_error');
});

Route::get('/calculator',function(){
    return view('discount_calculator');
});

Route::post('/display',function(Illuminate\Http\Request $request){
    $productDescription = $request->productDescription;
    $price = $request->price;
    $discountPercent = $request->discountPercent;
    $discountAmount = $price * $discountPercent/100 *0.1;
    $discountPrice = $price +$discountAmount;
    return view('display_discount',compact(['discountPrice', 'discountAmount', 'productDescription', 'price', 'discountPercent']));
});

Route::get('/dictionary',function(){
    return view('dictionary');
});

Route::post('/dictionary',function(){
    $dictionary=[
        'hello'=>'xin chào',
        'class'=>'lớp học',
        'object'=> 'đối tượng',
        'abstract'=> 'trừu tượng'
    ];
    $input = $_POST["key"];
    if(isset($dictionary[$input])){
        $output = $dictionary[$input];
    }else $output = 'Không có trong từ điển';
    return view('dictionary',['input'=>$input,'output' => $output]);
});