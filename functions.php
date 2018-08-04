<?php

function menu() {
	return DB::table('menu')->where('status', '=', 1)->get();
}

function cocial_networks() {
	return DB::table()->where('status', '=', 1)->get();
}

function varNameToLabelFormat($var_name) {
	$var_name = str_replace('_', ' ', $var_name);
	return ucwords($var_name);
}