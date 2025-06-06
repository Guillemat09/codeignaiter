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
	<head><base href="">
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
		<!-- Flatpickr CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

		<!--end::Global Stylesheets Bundle-->
		<style>
			/* Mejoras responsive específicas para Metronic */
			@media (max-width: 991.98px) {
				/* Sidebar responsive */
				.aside {
					position: fixed !important;
					z-index: 1050;
					transform: translateX(-100%);
					transition: transform 0.3s ease;
				}
				.aside.show {
					transform: translateX(0);
				}
				.wrapper {
					margin-left: 0 !important;
				}
				/* Overlay para móvil */
				.aside-overlay {
					position: fixed;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					background: rgba(0,0,0,0.5);
					z-index: 1040;
					display: none;
				}
				.aside-overlay.show {
					display: block;
				}
			}
			
			@media (max-width: 767.98px) {
				/* Ajustes para tablet */
				.page-title h1 {
					font-size: 1.75rem !important;
				}
				.breadcrumb {
					font-size: 0.75rem !important;
				}
				.card-header {
					flex-direction: column !important;
					align-items: flex-start !important;
					gap: 0.75rem;
				}
				.card-header .btn {
					align-self: flex-end;
				}
				/* Formulario responsive */
				.card {
					margin: 0 15px !important;
				}
			}
			
			@media (max-width: 575.98px) {
				/* Ajustes para móvil pequeño */
				.toolbar {
					margin-top: -45px !important;
				}
				.page-title {
					flex-direction: column !important;
					align-items: flex-start !important;
				}
				.page-title .breadcrumb {
					margin-top: 0.5rem;
				}
				.page-title .h-20px {
					display: none !important;
				}
				/* Card del formulario */
				.card {
					margin: 0 10px !important;
					border-radius: 0.75rem !important;
				}
				.card-body {
					padding: 1.5rem !important;
				}
				/* Botones responsive */
				.d-flex.justify-content-end {
					flex-direction: column !important;
					gap: 0.5rem;
				}
				.d-flex.justify-content-end .btn {
					width: 100% !important;
				}
			}

			/* Mejoras específicas para el formulario */
			@media (max-width: 991.98px) {
				.card {
					max-width: none !important;
					width: auto !important;
				}
				.card-header {
					width: auto !important;
				}
			}

			/* Grid responsive para fechas */
			@media (min-width: 768px) {
				.fecha-grid {
					display: grid;
					grid-template-columns: 1fr 1fr;
					gap: 1rem;
				}
			}
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!-- Overlay para móvil -->
				<div class="aside-overlay" id="aside_overlay"></div>
				
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="#">
							<img alt="Logo" src="../assets/media/logos/logo.png" class="h-70px logo" />
						</a>
						<!--end::Logo-->
						<!--begin::Aside toggler-->
						<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle d-none d-lg-flex" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
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
                                                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C11.7444 1.91835 11.2676 2.16899 11.1612 2.6044C11.0548 3.03981 11.3055 3.51661 11.7409 3.62299L19.6746 5.82799C19.9717 5.90219 20.1655 6.18699 20.1655 6.49379V17.5062C20.1655 17.8129 19.9717 18.0978 19.6746 18.172L11.7409 20.377C11.3055 20.4834 11.0548 20.9602 11.1612 21.3956C11.2676 21.831 11.7444 22.0817 12.1798 21.9753L20.5543 19.6218C21.4649 19.3647 22.1655 18.5062 22.1655 17.5062V6.49379C22.1655 5.49379 21.4649 4.63529 20.5543 4.37824Z" fill="black" />
                                                    <path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333C14.1943 11.1818 14.0762 11.2282 13.979 11.321L10.979 14.321C10.8818 14.4182 10.8354 14.5364 10.8354 14.6754V14.8418C10.8354 14.9808 10.8818 15.099 10.979 15.1962L13.979 18.1962C14.0762 18.2934 14.1943 18.3398 14.3333 18.3398H14.4998C14.6388 18.3398 14.7568 18.2934 14.854 18.1962C14.9512 18.099 14.9976 17.9808 14.9976 17.8418V15.5L18.8333 15.5C18.9723 15.5 19.0905 15.4536 19.1877 15.3564C19.2849 15.2592 19.3313 15.141 19.3313 15.002V14.8355C19.3313 14.6965 19.2849 14.5783 19.1877 14.4811C19.0905 14.3839 18.9723 14.3375 18.8333 14.3375L14.9976 14.3375V12.0007C14.9976 11.8617 14.9512 11.7435 14.854 11.6463V11.321Z" fill="black" />
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="menu-title">Listas</span>
                                        <span class="menu-arrow"></span>
                                    </span>

                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="#">
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
                                <div class="media align-items-center">
                                    <img alt="" src="../assets/media/avatars/150-25.jpg" class="rounded-circle me-2" style="width: 40px; height: 40px;" />
                                    <div class="media-body text-light fw-bold">
                                        Usuario Demo<br>
                                        Administrador
                                    </div>
                                </div>
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
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar" style="margin-top:-65px;">
                            
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack ">

								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Gestión de Festivales</h1>
									<!--end::Title-->
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start mx-4"></span>
									<!--end::Separator-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="#" class="text-muted text-hover-primary">Home</a>
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
										<li class="breadcrumb-item text-muted">Festivales</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">Crear Festival</li>
										<!--end::Item-->
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
								<!--begin::Actions-->
                                <div class="mt-2 mb-2">
                                    <a href="#" class="btn btn-danger">Cerrar Sesión</a>
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
                                <div class="card shadow-sm border rounded-3 mx-auto" style="max-width: 900px;">
                                    <!-- Header -->
                                    <div class="card-header d-flex justify-content-between align-items-center py-4 bg-light">
                                        <h2 class="mb-0" id="formTitle">Crear Festival</h2>
                                        <a href="#" class="btn btn-light-primary btn-sm">Cancelar</a>
                                    </div>

                                    <!-- Formulario -->
                                    <div class="card-body p-6 pt-0">
                                        <form id="festivalForm" method="post" action="#">
                                            <div class="alert alert-danger d-none">
                                                <ul></ul>
                                            </div>

                                            <input type="hidden" name="festivalId" value="">

                                            <div class="mb-4">
                                                <label for="nombre" class="form-label fw-bold">Nombre <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-solid" id="nombre" name="nombre" required
                                                    value="" placeholder="Nombre">
                                            </div>

                                            <div class="mb-4">
                                                <label for="descripcion" class="form-label fw-bold">Descripción <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-solid" id="descripcion" name="descripcion" required
                                                    value="" placeholder="Descripción">
                                            </div>

                                            <!-- Grid responsive para fechas -->
                                            <div class="fecha-grid">
                                                <div class="mb-4">
                                                    <label for="fecha_inicio" class="form-label fw-bold">Fecha de Inicio <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-solid datepicker" id="fecha_inicio" name="fecha_inicio"
                                                        placeholder="Selecciona una fecha" value="" />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="fecha_fin" class="form-label fw-bold">Fecha de Fin <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-solid datepicker" id="fecha_fin" name="fecha_fin" required
                                                        placeholder="Selecciona una fecha" value="">
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label for="lugar" class="form-label fw-bold">Lugar <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-solid" id="lugar" name="lugar" required
                                                    value="" placeholder="Lugar">
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary" id="saveBtn">
                                                    Guardar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end::Container-->
                        </div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
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
		<!--end::Scrolltop-->
		<!--end::Main-->
		<script>var hostUrl = "../assets/";</script>
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
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
		<script>
			// Mobile sidebar toggle mejorado
			document.getElementById('kt_aside_mobile_toggle').addEventListener('click', function() {
				const aside = document.getElementById('kt_aside');
				const overlay = document.getElementById('aside_overlay');
				
				aside.classList.toggle('show');
				overlay.classList.toggle('show');
			});

			// Cerrar sidebar al hacer click en overlay
			document.getElementById('aside_overlay').addEventListener('click', function() {
				const aside = document.getElementById('kt_aside');
				const overlay = document.getElementById('aside_overlay');
				
				aside.classList.remove('show');
				overlay.classList.remove('show');
			});

			// Búsqueda de festival (si existe el elemento)
			const busquedaElement = document.getElementById("busquedaFestival");
			if (busquedaElement) {
				busquedaElement.addEventListener("keypress", function(event){
					if(event.keyCode == 13){
						event.preventDefault();
						document.getElementById("formulariobusqueda").submit();
					}
				});
			}
			
			// Export Excel (si existe el elemento)
			const exportBtn = document.getElementById('export-excel-btn');
			if (exportBtn) {
				exportBtn.addEventListener('click', function() {
					window.location.href = "export/csv/festivales";
				});
			}

			// Inicializar el datepicker
			document.addEventListener("DOMContentLoaded", function() {
				flatpickr(".datepicker", {
					locale: "es",
					dateFormat: "Y-m-d",     
					altInput: true,           
					altFormat: "d-m-Y"         
				});
			});

			// Función para confirmación con SweetAlert
			function confirmToggleFestival(id, isActive) {
				Swal.fire({
					title: isActive ? '¿Dar de baja?' : '¿Dar de alta?',
					text: isActive 
						? "Este festival se marcará como dado de baja." 
						: "Este festival volverá a estar activo.",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: isActive ? 'Sí, dar de baja' : 'Sí, dar de alta',
					cancelButtonText: 'Cancelar',
					confirmButtonColor: isActive ? '#d33' : '#198754',
					cancelButtonColor: '#6c757d'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = "festivales/toggleActive/" + id;
					}
				});
			}

			// Mostrar mensaje de éxito (ejemplo)
			// Swal.fire({
			//     text: "Festival guardado correctamente",
			//     icon: "success",
			//     buttonsStyling: false,
			//     confirmButtonText: "Entendido",
			//     customClass: {
			//         confirmButton: "btn btn-primary"
			//     }
			// });
		</script>
	</body>
	<!--end::Body-->
</html>