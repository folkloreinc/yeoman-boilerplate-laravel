<?php

View::creator(array('layouts.main'), function($view)
{

	$headContainer = Asset::container('head');
	$headContainer->add('modernizr','js/components/modernizr/modernizr.js');
	$headContainer->add('styles','css/main.css');

	//Footer Assets
	$footerContainer = Asset::container('footer');
	$footerContainer->add('utils','js/utils.js');
	if(App::environment() == 'local') {
		$footerContainer->add('main','js/components/requirejs/require.js',array(),array('data-main'=>'/js/main'));
	} else {
		$footerContainer->add('main','js/main.build.js');
	}

	$view->with(array(
		'title' => trans('meta.title'),
		'description' => trans('meta.description'),
		'route' => Route::current() ? Route::current()->getName():'errors.404'
	));

});