<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
	<base href="">
	<title>Festivales</title>
	<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
	<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="Keenthemes | Metronic" />
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="../assets/media/logos/logo.ico" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendor Stylesheets(used by this page)-->
	<link href="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
	<link href="../../assets/plugins/custom/flatpickr/flatpickr.bundle.css" rel="stylesheet" type="text/css" />
	<style>
html {
    overflow-y: scroll !important;
}



</style>


	<!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Aside-->
			<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
				<!--begin::Brand-->
				<div class="aside-logo flex-column-auto" id="kt_aside_logo">
					<!--begin::Logo-->
					<a href=<?= base_url('principal') ?>>
						<img alt="Logo" src="../assets/media/logos/logo.png" class="h-70px logo" />
					</a>
					<!--end::Logo-->
					<!--begin::Aside toggler-->
					<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
						<span class="svg-icon svg-icon-1 rotate-180">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
								<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Aside toggler-->
				</div>
				<!--end::Brand-->
				<!--begin::Aside menu-->
				<div class="aside-menu flex-column-fluid">
					<!--begin::Aside Menu-->
					<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper"
						data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
						data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
						data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">

						<!--begin::Menu-->
						<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
							id="#kt_aside_menu" data-kt-menu="true">

							<!-- Menú principal: Listas > Festivales -->
							<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
								<span class="menu-link">
									<span class="menu-icon">
										<span class="svg-icon svg-icon-2">
											<!-- Ícono -->
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473..." fill="black" />
												<path d="M14.854 11.321C14.7568 11.2282..." fill="black" />
											</svg>
										</span>
									</span>
									<span class="menu-title">Listas</span>
									<span class="menu-arrow"></span>
								</span>

								<div class="menu-sub menu-sub-accordion">
									<div class="menu-item">
										<a class="menu-link" href="<?= base_url('festivales') ?>">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Festivales</span>
										</a>
									</div>
								</div>
							</div>

						</div>
						<!--end::Menu-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside menu-->
				<!--begin::Footer-->
				<div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
					<a href="" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" title="">
						<span class="btn-label">
							<?php if (session()->has('user')): ?>
								<div class="media align-items-center">
									<img alt="" src="../assets/media/avatars/150-25.jpg" class="rounded-circle me-2" style="width: 40px; height: 40px;" />
									<div class="media-body text-light fw-bold">
										<?= session()->get('user')['name'] ?><br>
										<?= session()->get('role')['nombre'] ?>
									</div>
								</div>
							<?php endif; ?>
						</span>
						<!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
						<span class="svg-icon btn-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black" />
								<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</a>
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Footer-->
		</div>
		<!--end::Aside-->
		<!--begin::Wrapper-->
		<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
			<!--begin::Content-->

			<!--begin::Content-->
			<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				<!--begin::Toolbar-->
				<div class="toolbar" id="kt_toolbar" style="margin-top:-65px;">

					<!--begin::Container-->
					<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack ">

						<!--begin::Page title-->
						<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
							<!--begin::Title-->
							<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Festivales</h1>
							<!--end::Title-->
							<!--begin::Separator-->
							<span class="h-20px border-gray-200 border-start mx-4"></span>
							<!--end::Separator-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
								<!--begin::Item-->
								<li class="breadcrumb-item text-muted">
									<a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Principal</a>
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="breadcrumb-item">
									<span class="bullet bg-gray-200 w-5px h-2px"></span>
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="breadcrumb-item text-muted">Listas</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="breadcrumb-item">
									<span class="bullet bg-gray-200 w-5px h-2px"></span>
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<!--end::Item-->
								<!--begin::Item-->
								<!--end::Item-->
								<!--begin::Item-->
								<li class="breadcrumb-item text-dark">Festivales</li>
								<!--end::Item-->
							</ul>
							<!--end::Breadcrumb-->
						</div>
						<!--end::Page title-->
						<!--begin::Actions-->
						<div class="mt-2 mb-2">
							<?php if (session()->has('user')): ?>
								<a href="logout" class="btn btn-danger" id="logoutBtn">Cerrar Sesión</a>
							<?php else: ?>
								<a href="login" class="btn btn-primary me-2">Iniciar Sesion</a>
								<a href="register" class="btn btn-secondary">Registro</a>
							<?php endif; ?>
							<a class="btn btn-primary" href=<?= base_url('principal') ?>>Volver</a>
						</div>
						<!--end::Actions-->
					</div>
					<div class="d-flex align-items-center py-1">
						<!--begin::Wrapper-->
						<div class="me-4">
							<!--begin::Menu-->
							<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
								<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
									<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
									<span class="svg-icon svg-icon-2x mt-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
							</div>
						</div>

					</div>
					<!--end::Container-->
				</div>
				<!--end::Toolbar-->
				<!--begin::Post-->
				<div class="post d-flex flex-column-fluid" id="kt_post">
					<!--begin::Container-->
					<div id="kt_content_container" class="container-xxl">
						<!--begin::Card-->
						<div class="card">
							<!--begin::Card header-->
							<div class="card-header border-0 pt-6">
								<!--begin::Card title-->
								<div class="card-title w-100 d-flex flex-column flex-md-row justify-content-between align-items-center">

									<!-- Buscador -->
									<form method="get" action="<?= base_url('festivales') ?>" class="position-relative w-100 w-md-250px mb-3 mb-md-0">
										<!-- Icono lupa -->
										<span class="svg-icon svg-icon-1 position-absolute ms-6 top-50 translate-middle-y">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
												<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
											</svg>
										</span>
										<input type="text" name="nombre" class="form-control form-control-solid ps-14" placeholder="nombre" value="<?= isset($filters['nombre']) ? esc($filters['nombre']) : '' ?>">
									</form>

									<!-- Botones -->
									<div class="d-flex gap-2 align-items-center">
										<!-- Botón Filtrado -->
										<button type="button" class="btn btn-light-primary px-6" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<span class="svg-icon svg-icon-2 me-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
												</svg>
											</span>
											Filtrado
										</button>

										<!-- Menú Filtrado -->
										<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
											<div class="px-7 py-5">
												<div class="fs-5 text-dark fw-bolder">Filtrado</div>
											</div>
											<div class="separator border-gray-200"></div>
											<div class="px-7 py-5" data-kt-user-table-filter="form">
												<form method="get" action="<?= base_url('festivales') ?>">
													<div class="mb-10">
														<label class="form-label fs-6 fw-bold">Descripción:</label>
														<input type="text" name="descripcion" class="form-control" placeholder="descripción" value="<?= isset($filters['descripcion']) ? esc($filters['descripcion']) : '' ?>">
													</div>
													<div class="mb-10">
														<label class="form-label fs-6 fw-bold">Lugar:</label>
														<input type="text" name="lugar" class="form-control" placeholder="lugar" value="<?= isset($filters['lugar']) ? esc($filters['lugar']) : '' ?>">
													</div>
													<div class="mb-10">
														<label class="form-label fs-6 fw-bold">Fecha:</label>
														<input type="text" name="fecha_creacion" id="fecha_creacion" class="form-control form-control-solid mb-3 mb-lg-0 datepicker" placeholder="Selecciona una fecha" value="<?= isset($filters['fecha_creacion']) ? esc($filters['fecha_creacion']) : '' ?>" />
													</div>
													<div class="d-flex justify-content-end">
														<a href="<?= base_url('/festivales') ?>" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6">Resetear</a>
														<button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Filtrar</button>
													</div>
												</form>
											</div>
										</div>

										<!-- Botón Exportar -->
										<button type="button" class="btn btn-light-primary px-6" data-bs-toggle="modal" data-bs-target="#kt_modal_export_festivales">
											<span class="svg-icon svg-icon-2 me-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
													<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
													<path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
												</svg>
											</span>
											Exportar
										</button>

										<!-- Botón Añadir -->
										<?php if (session()->get('role')['nombre'] == "admin"): ?>
											<a href="<?= base_url('festivales/save') ?>" class="btn btn-primary px-6">
												<span class="svg-icon svg-icon-2 me-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
													</svg>
												</span>
												Añadir Festival
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-0">
								<!--begin::Alert-->
								<?php if (session()->getFlashdata('error')): ?>
									<div class="alert alert-danger">
										<?= session()->getFlashdata('error') ?>
									</div>
								<?php endif; ?>
								<!--end::Alert-->
								<!--begin::Table-->
								<?php if (empty($festivales)): ?>
									<div class="text-center text-danger fs-4" style="margin-top: 90px;">No se encontraron Festivales</div>
								<?php else: ?>
									<!--begin::Table-->
									<div class="table-responsive">
										<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
											<!--begin::Table head-->
											<thead>

												<!--begin::Table row-->
												<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

													<th class="min-w-125px">
														<a href="<?= base_url('festivales?' . http_build_query(array_merge($filters, ['sort' => 'nombre', 'order' => ($sort == 'nombre' && $order == 'ASC') ? 'DESC' : 'ASC', 'page' => $page, 'perPage' => $perPage]))) ?>">
															Nombre
															<?php if ($sort == 'nombre'): ?>
																<span class="svg-icon svg-icon-5 m-0">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="<?= $order == 'ASC' ? 'M12 2L7 12h10L12 2z' : 'M12 22l5-10H7l5 10z' ?>" fill="black" />
																	</svg>
																</span>
															<?php endif; ?>
														</a>
													</th>

													<th class="min-w-125px">
														<a href="<?= base_url('festivales?' . http_build_query(array_merge($filters, ['sort' => 'descripcion', 'order' => ($sort == 'descripcion' && $order == 'ASC') ? 'DESC' : 'ASC', 'page' => $page, 'perPage' => $perPage]))) ?>">
															Descripción
															<?php if ($sort == 'descripcion'): ?>
																<span class="svg-icon svg-icon-5 m-0">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="<?= $order == 'ASC' ? 'M12 2L7 12h10L12 2z' : 'M12 22l5-10H7l5 10z' ?>" fill="black" />
																	</svg>
																</span>
															<?php endif; ?>
														</a>
													</th>

													<th class="min-w-125px">
														<a href="<?= base_url('festivales?' . http_build_query(array_merge($filters, ['sort' => 'fecha_inicio', 'order' => ($sort == 'fecha_inicio' && $order == 'ASC') ? 'DESC' : 'ASC', 'page' => $page, 'perPage' => $perPage]))) ?>">
															Fecha de Inicio
															<?php if ($sort == 'fecha_inicio'): ?>
																<span class="svg-icon svg-icon-5 m-0">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="<?= $order == 'ASC' ? 'M12 2L7 12h10L12 2z' : 'M12 22l5-10H7l5 10z' ?>" fill="black" />
																	</svg>
																</span>
															<?php endif; ?>
														</a>
													</th>

													<th class="min-w-125px">
														<a href="<?= base_url('festivales?' . http_build_query(array_merge($filters, ['sort' => 'fecha_fin', 'order' => ($sort == 'fecha_fin' && $order == 'ASC') ? 'DESC' : 'ASC', 'page' => $page, 'perPage' => $perPage]))) ?>">
															Fecha de Fin
															<?php if ($sort == 'fecha_fin'): ?>
																<span class="svg-icon svg-icon-5 m-0">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="<?= $order == 'ASC' ? 'M12 2L7 12h10L12 2z' : 'M12 22l5-10H7l5 10z' ?>" fill="black" />
																	</svg>
																</span>
															<?php endif; ?>
														</a>
													</th>

													<th class="min-w-125px">
														<a href="<?= base_url('festivales?' . http_build_query(array_merge($filters, ['sort' => 'lugar', 'order' => ($sort == 'lugar' && $order == 'ASC') ? 'DESC' : 'ASC', 'page' => $page, 'perPage' => $perPage]))) ?>">
															Lugar
															<?php if ($sort == 'lugar'): ?>
																<span class="svg-icon svg-icon-5 m-0">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="<?= $order == 'ASC' ? 'M12 2L7 12h10L12 2z' : 'M12 22l5-10H7l5 10z' ?>" fill="black" />
																	</svg>
																</span>
															<?php endif; ?>
														</a>
													</th>

													<th class="min-w-125px">
														<a href="<?= base_url('festivales?' . http_build_query(array_merge($filters, ['sort' => 'fecha_creacion', 'order' => ($sort == 'fecha_creacion' && $order == 'ASC') ? 'DESC' : 'ASC', 'page' => $page, 'perPage' => $perPage]))) ?>">
															Fecha
															<?php if ($sort == 'fecha_creacion'): ?>
																<span class="svg-icon svg-icon-5 m-0">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="<?= $order == 'ASC' ? 'M12 2L7 12h10L12 2z' : 'M12 22l5-10H7l5 10z' ?>" fill="black" />
																	</svg>
																</span>
															<?php endif; ?>
														</a>
													</th>

													<?php if (session()->get('role')['nombre'] == "admin"): ?>
														<th class="text-end min-w-100px">Acciones</th>
													<?php endif; ?>
												</tr>
												<!--end::Table row-->
											</thead>

											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="text-gray-600 fw-bold">
												<?php foreach ($festivales as $festival): ?>
													<!--begin::Table row-->
													<tr class="<?= $festival['is_active'] ? '' : 'text-danger' ?>">
														<!--begin::User=-->
														<td class="d-flex align-items-center ">
															<!--begin:: Avatar -->
															<div class="symbol symbol-circle symbol-40px symbol-md-50px me-3">

																<img alt src="../assets/media/avatars/150-<?= rand(24, 25); ?>.jpg" class="rounded-circle me-2" style="width: 40px; height: 40px;" />

															</div>
															<!--end::Avatar-->
															<!--begin::User details-->
															<div class="d-flex flex-column w-100 text-truncate">
																<p class="mb-1 <?= $festival['is_active'] ? 'text-gray-800 text-primary' : 'text-danger' ?>">
																	<?= esc($festival['nombre']) ?>
																</p>

															</div>
															<!--begin::User details-->
														</td>
														<!--end::User=-->
														<!--begin::Role=-->
														<td>
															<div class="w-100 text-truncate" style="max-width: 150px;"><?= esc($festival['descripcion']) ?></div>
														</td>
														<td>
															<div class="w-100 text-truncate" style="max-width: 150px;"><?= (new DateTime($festival['fecha_inicio']))->format('d/m/Y') ?></div>
														</td>
														<td>
															<div class="w-100 text-truncate" style="max-width: 150px;"><?= (new DateTime($festival['fecha_fin']))->format('d/m/Y') ?></div>
														</td>
														<td>
															<div class="w-100 text-truncate" style="max-width: 150px;"><?= esc($festival['lugar']) ?></div>
														</td>
														<td>
															<div class="w-100 text-truncate" style="max-width: 150px;"><?= (new DateTime($festival['fecha_creacion']))->format('d/m/Y') ?></div>
														</td>
														<!--begin::Joined-->
														<!--begin::Action=-->
														<td class="text-end">
															<?php if (session()->get('role')['nombre'] == "admin"): ?>
																<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acciones
																	<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
																	<span class="svg-icon svg-icon-5 m-0">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
																		</svg>
																	</span>
																	<!--end::Svg Icon--></a>
															<?php endif; ?>
															<!--begin::Menu-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="<?= base_url('festivales/save/' . esc($festival['id'])) ?>" class="menu-link px-3">Editar</a>
																</div>
																<!--end::Menu item-->

																<!-- Mostrar solo uno según estado -->
													<div class="menu-item px-3">
														<a href="<?= base_url('festivales/toggleActive/' . esc($festival['id'])) ?>"
														class="menu-link px-3"
														data-kt-users-table-filter="toggle_active">
															<?= $festival['is_active']
																? '<span class="text-danger">Dar de baja</span>'
																: '<span class="text-success">Dar de alta</span>' ?>
														</a>
													</div>
													
													</div>

															<!--end::Menu-->
														</td>
														<!--end::Action=-->
													</tr>
												<?php endforeach; ?>

											</tbody>
											<!--end::Table body-->
										</table>
									</div>
									<div class="mt-4">
										<!-- En móvil: elementos apilados verticalmente -->
										<div class="d-block d-md-none">
											<!-- Selector de registros en móvil -->
											<div class="d-flex justify-content-center mb-3">
												<form method="get" action="<?= current_url() ?>" class="d-flex align-items-center">
													<label for="perPage" class="me-2 mb-0 small">Mostrar</label>
													<select id="perPage" name="perPage" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
														<option value="5" <?= $perPage == 5 ? 'selected' : '' ?>>5</option>
														<option value="10" <?= $perPage == 10 ? 'selected' : '' ?>>10</option>
														<option value="25" <?= $perPage == 25 ? 'selected' : '' ?>>25</option>
														<option value="50" <?= $perPage == 50 ? 'selected' : '' ?>>50</option>
													</select>
													<span class="ms-2 small">por página</span>
												</form>
											</div>

											<!-- Paginación centrada en móvil -->
											<div class="d-flex justify-content-center">
												<?= $pager->only(['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'lugar', 'fecha_creacion', 'sort', 'order', 'page', 'perPage'])->links("default", "custom_pagination") ?>
											</div>
										</div>
									<?php endif; ?>
									</div>
									<!-- En desktop: layout horizontal -->
									<div class="d-none d-md-flex justify-content-between align-items-center">
										<!-- Selector de registros alineado a la izquierda -->
										<form method="get" action="<?= current_url() ?>" class="d-flex align-items-center">
											<label for="perPage" class="me-2 mb-0">Mostrar</label>
											<select id="perPage" name="perPage" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
												<option value="5" <?= $perPage == 5 ? 'selected' : '' ?>>5</option>
												<option value="10" <?= $perPage == 10 ? 'selected' : '' ?>>10</option>
												<option value="25" <?= $perPage == 25 ? 'selected' : '' ?>>25</option>
												<option value="50" <?= $perPage == 50 ? 'selected' : '' ?>>50</option>
											</select>
											<span class="ms-2">festivales por página</span>
										</form>

										<!-- Paginación centrada -->
										<div class="d-flex justify-content-center flex-grow-1">
											<?= $pager->only(['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'lugar', 'fecha_creacion', 'sort', 'order', 'page', 'perPage'])->links("default", "custom_pagination") ?>
										</div>

										<!-- Espacio vacío para mantener el balance -->
										<div style="width: 200px;"></div>
									</div>
									
							</div>
							
						</div>
						
					</div>
					
					<!--end::Table-->
				</div>
				
				<!--end::Card body-->
			</div>
				<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
		<!--begin::Container-->
		<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
			<!--begin::Copyright-->
			<div class="text-dark order-2 order-md-1">
				<span class="text-muted fw-bold me-1">2025©</span>
				<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Guillermo Mateos Galea</a>
			</div>
			<!--end::Copyright-->
		</div>
		<!--end::Container-->
	</div>
			<!--end::Card-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
	
	</div>

	<!--end::Content-->
	<!--begin::Footer-->

	<!--end::Footer-->
	</div>
	<!--end::Wrapper-->
	</div>
	<!--end::Page-->
	</div>

	<!--end::Root-->

	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
				<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
			</svg>
		</span>
		<!--end::Svg Icon-->
	</div>
	<div class="modal fade" id="kt_modal_export_festivales" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered mw-650px">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="fw-bolder">Exportar Festivales</h2>
					<button type="button" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
						<span class="svg-icon svg-icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
							</svg>
						</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="export-form">
						<div class="mb-10">
							<label class="fs-6 fw-bold form-label mb-2">Selecciona el formato:</label>
							<select id="export-format" class="form-select form-select-solid fw-bolder">
								<option value="csv">CSV (Excel)</option>
							</select>
						</div>
						<div class="text-center">
							<button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancelar</button>
							<button type="button" id="export-excel-btn" class="btn btn-primary">Exportar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!--end::Scrolltop-->
	<!--end::Main-->
	<script>
		var hostUrl = "../assets/";
	</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="../assets/plugins/global/plugins.bundle.js"></script>
	<script src="../assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Vendors Javascript(used by this page)-->
	<script src="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
	<!--end::Page Vendors Javascript-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="../assets/js/custom/widgets.js"></script>
	<script src="../assets/js/custom/apps/chat/chat.js"></script>
	<script src="../assets/js/custom/modals/create-app.js"></script>
	<script src="../assets/js/custom/modals/upgrade-plan.js"></script>
	<script src="../../assets/js/custom/chart.js"></script>
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<!-- DataTables JS -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
	<script src="path-to-metronic/plugins/custom/sweetalert2/sweetalert2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
			<script>
document.getElementById('logoutBtn').addEventListener('click', function(e) {
    e.preventDefault(); // Evita que redireccione inmediatamente

    Swal.fire({
        icon: 'success',
        title: 'Sesión cerrada',
        text: 'Has cerrado sesión correctamente.',
        showConfirmButton: false,
        timer: 1000, // Duración en milisegundos antes de redirigir
        timerProgressBar: true
    }).then(() => {
        window.location.href = this.href; // Redirige al logout
    });
});
</script>
	<script>
		document.getElementById("busquedaFestival").addEventListener("keypress", function(event) {
			if (event.keyCode == 13) {
				event.preventDefault();
				document.getElementById("formulariobusqueda").submit();
			}
		});
	</script>
	<script>
document.addEventListener("DOMContentLoaded", function() {
				flatpickr(".datepicker", {
					locale: "es",
					dateFormat: "Y-m-d",     
					altInput: true,           
					altFormat: "d-m-Y"         
					
				});
			});
	</script>
	<script>
		document.getElementById('export-excel-btn').addEventListener('click', function() {
			window.location.href = "<?= base_url('export/csv/festivales') ?>";
		});
	</script>
	<script>
		function confirmToggleFestival(id, isActive) {
			Swal.fire({
				title: isActive ? '¿Dar de baja?' : '¿Dar de alta?',
				text: isActive ?
					"Este festival se marcará como dado de baja." : "Este festival volverá a estar activo.",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: isActive ? 'Sí, dar de baja' : 'Sí, dar de alta',
				cancelButtonText: 'Cancelar',
				confirmButtonColor: isActive ? '#d33' : '#198754',
				cancelButtonColor: '#6c757d'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = "<?= base_url('festivales/toggleActive/') ?>" + id;
				}
			});
		}
		<?php if (session()->getFlashdata('success')): ?>
				<
				script >
				Swal.fire({
					text: "<?= session()->getFlashdata('success') ?>",
					icon: "success",
					buttonsStyling: false,
					confirmButtonText: "Entendido",
					customClass: {
						confirmButton: "btn btn-primary"
					}
				});
	</script>



<?php endif; ?>


<script>
    Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: '<?= session()->getFlashdata('success') ?>',
        timer: 1000,
        showConfirmButton: false
    });
</script>





</body>
</html>