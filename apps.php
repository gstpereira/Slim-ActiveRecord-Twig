<?php

	require_once "app/controller.php";
	require_once "app/controllers/admin/LoginController.php";
	require_once "app/controllers/admin/AdminController.php";
	require_once "app/controllers/IndexController.php";
	require_once "app/controllers/admin/UsuarioController.php";
	require_once "app/controllers/admin/GaleriaController.php";
	
	$loginController = new LoginController();
	$usuarioController = new UsuarioController();
	$indexController = new IndexController();
	$adminController = new AdminController();
	$galeriaController = new GaleriaController();
