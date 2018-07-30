<?php

function global_var($var_name) {
	$row = DB::table('global_vars')->where('var_name', '=', $var_name)->first();
	return $row->var_value;
}

function menu() {
	return DB::table('menu')->where('status', '=', 1)->get();
}

function cocial_networks() {
	return DB::table()->where('status', '=', 1)->get();
}