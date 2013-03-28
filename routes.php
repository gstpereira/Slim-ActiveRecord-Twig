<?php

	$c->app->get('/', array($indexController, 'index'))->name('home');

	$c->app->get('/admin/', array($loginController, 'index'))->name('admin');
	$c->app->map('/login/', array($loginController, 'index'))->via('GET', 'POST')->name('login');
	$c->app->map('/admin/cadastro/usuario', array($usuarioController, 'cadastro'))->via('GET', 'POST')->name('cadastro_usuario');
	$c->app->map('/conta/', array($usuarioController, 'conta'))->via('GET', 'POST')->name('conta');
	$c->app->map('/conta/configuracao/', array($loginController, 'configuracao'))->via('GET', 'POST')->name('conta_configuracao');
	$c->app->get('/logout/', array($loginController, 'logout'))->name('logout');
	
	$c->app->get('/admin/index/', array($adminController, 'index'))->name('admin_index');
	$c->app->get('/admin/galeria/', array($galeriaController, 'index'))->name('galeria');
	$c->app->get('/admin/galeria/cadastro', array($galeriaController, 'cadastro'))->name('galeria_cadastro');
	
	
