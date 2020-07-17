<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    function index(){
        $customer= DB::select('SELECT * FROM customer WHERE `is_delete` = 0');
        return view('modules.customer.index',['customer'=>$customer]);       
    }
    function create(){
        return view('modules.customer.create');       
    }
    function store(Request $request){
        $customer= DB::insert('INSERT INTO `customer` (`name`,`phone`,`email`,`address`)
        VALUES(?,?,?,?)', [$request->name,$request->phone,$request->email,$request->address]);
        return redirect('/customer/index');       
    }
    function show($id){
        $customer= DB::select('SELECT * FROM customer WHERE `id` = ?',[$id]);
        return view('modules.customer.show',['customer'=>$customer]);       
    }
    function edit($id){
        $customer= DB::select('SELECT * FROM customer WHERE `id` = ?',[$id]);
        return view('modules.customer.edit',['customer'=>$customer[0]]);       
    }
    function update(Request $request,$id){
        $customer=DB::update('UPDATE `customer` SET
        `name` = ?,`phone` = ?,`email` = ?,`address` = ?
        WHERE `id` = ?', [$request->name,$request->phone,$request->email,$request->address,$id]);
        return redirect('/customer/index');         
    }
    function delete($id){
        DB::update('UPDATE `customer` SET
        `is_delete` = 1
        WHERE `id` = ?', [$id]);
        return redirect('/customer/index');    
    }
}
