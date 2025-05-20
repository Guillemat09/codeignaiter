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
		<title>Calendario</title>
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
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto" id="kt_aside_logo">
						<!--begin::Logo-->
						<!--begin::Logo-->
              <a href="<?= base_url('principal') ?>">
        <img alt="Logo" src="../assets/media/logos/logo.png" class="h-70px logo" />
          </a>
<!--end::Logo-->
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
						<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
							<!--begin::Menu-->
							<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
								<div class="menu-item">

								<div class="menu-item">
									<div class="menu-content pt-8 pb-2">
										<span class="menu-section text-muted text-uppercase fs-8 ls-1">List</span>
									</div>
								</div>
				
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen051.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black" />
													<path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Listas</span>
										<span class="menu-arrow"></span>
									</span>
									<div class="menu-sub menu-sub-accordion">
										<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Users</span>
												<span class="menu-arrow"></span>
											</span>
											<div class="menu-sub menu-sub-accordion">
												<div class="menu-item">
													<a class="menu-link" href="<?= base_url('users') ?>">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Users</span>
													</a>
												</div>
												<div class="menu-item">
													<a class="menu-link" href="<?= base_url('patrocinadores') ?>">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Patrocinadores</span>
													</a>
												</div>
												<div class="menu-item">
													<a class="menu-link" href="<?= base_url('artistas') ?>">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Artistas</span>
													</a>
												</div>
												<div class="menu-item">
													<a class="menu-link" href="<?= base_url('entradas') ?>">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Entradas</span>
													</a>
												</div>
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
										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Roles</span>
												<span class="menu-arrow"></span>
											</span>
											<div class="menu-sub menu-sub-accordion">
												<div class="menu-item">
													<a class="menu-link" href="<?= base_url('roles') ?>">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Roles List</span>
													</a>
												</div>
											</div>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="../../demo1/dist/apps/user-management/permissions.html">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Calendario</span>
											</a>
										</div>
									</div>
								</div>
								<div class="menu-item">
									<div class="menu-content">
										<div class="separator mx-1 my-4"></div>
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
    <a href="../../demo1/dist/documentation/getting-started.html" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" title="">
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

                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper" style="margin-top: -200px;">
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Card-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header mt-6">
                <div class="card">
                    <h2 class="fw-bold">Calendario</h2>
                </div>
                
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Calendar-->
                <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-standard" style="height: 800px;"></div>
                <!--end::Calendar-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
						<div id="kt_header" class="header align-items-stretch">
<!--begin::Container-->
<div class="container-fluid d-flex align-items-stretch justify-content-between">
<!--begin::Wrapper-->
<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
<!--begin::Navbar-->
<div class="d-flex align-items-stretch" id="kt_header_nav">
<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
<div class="d-flex align-items-stretch" id="kt_header_nav">
<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
<div class="page-title d-flex flex-column me-3">
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                <?= 'Calendario' ?>
            </h1>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="<?= base_url('principal') ?>" class="text-muted text-hover-primary">Principal</a>
                </li>
                <!--end::Item-->

                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                </li>

                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Listas</a>
                </li>
                <!--end::Item-->

                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                </li>

                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Usuarios</li>

				<li class="breadcrumb-item">
                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
				
                </li>
				<li class="breadcrumb-item text-dark">Calendario</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
</div>
</div>
</div>
</div>
</div>
<?php if (session()->has('user')): ?>
<a href="logout" class="btn btn-danger">Cerrar Sesion</a>
    <?php else: ?>
<a href="login" class="btn btn-primary me-2">Iniciar Sesion</a>
<a href="register" class="btn btn-secondary">Registro</a>
<?php endif;?>
</div>
<!--end::Navbar-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Container-->
</div>
					</div>
					<!--end::Header-->
					<!--begin::Content-->
							<!--end::Container-->
						</div>
<!-- Modal para agregar evento -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eventModalLabel">Añadir evento </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="eventForm">
          <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
          </div>
          <div class="form-group">
            <label for="descripcion_es">Descripcion en español</label>
            <textarea class="form-control" id="descripcion_es" name="descripcion_es"></textarea>
          </div>
          <div class="form-group">
            <label for="descripcion_eng">Descripcion en ingles</label>
            <textarea class="form-control" id="descripcion_eng" name="descripcion_eng"></textarea>
          </div>
          <div class="form-group">
            <label for="fecha_inicio">Dia de inicio</label>
            <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
          </div>
          <div class="form-group">
            <label for="fecha_fin">Dia final</label>
            <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="saveEventBtn">Añadir Evento</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Metronic JS -->
    <script src="<?= base_url('assets/js/scripts.bundle.js')?>"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function () {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        editable: true,
        displayEventTime: false,
        firstDay: '1',
        locale: 'es', // Establecer idioma español
        buttonText: {
                        today: 'Hoy', // Cambiar la etiqueta del botón 'Today' a 'Hoy'
                    },

        // Cargar eventos desde el servidor
        events: function(fetchInfo, successCallback, failureCallback) {
            $.ajax({
                url: '<?= base_url('/fetch-events') ?>',
                method: 'GET',
                success: function(data) {
                    console.log("Eventos cargados desde el servidor: ", data);
                    successCallback(data);
                },
                error: function(xhr, status, error) {
                    console.error("Error al cargar los eventos: ", status, error);
                    failureCallback();
                }
            });
        },

        // Acción cuando se selecciona un rango de fechas en el calendario
        select: function(info) {
            $('#eventForm')[0].reset(); // Limpiar formulario

            const today = new Date().toISOString().split("T")[0];

            // Establecer valores predeterminados para fechas
            $('#fecha_inicio').val(info.startStr || today);
            $('#fecha_inicio').attr("min", today);

            $('#fecha_fin').val(info.endStr || today);
            $('#fecha_fin').attr("min", info.startStr || today);

            // Actualizar la fecha mínima de fin al cambiar la fecha de inicio
            $('#fecha_inicio').off('change').on('change', function () {
                $('#fecha_fin').attr("min", this.value);
            });

            // Mostrar modal
            var myModal = new bootstrap.Modal(document.getElementById('eventModal'), {});
            myModal.show();

            // Guardar evento
            $('#saveEventBtn').off('click').on('click', function () {
                const eventData = {
                    titulo: $('#titulo').val(),
                    fecha_inicio: $('#fecha_inicio').val(),
                    fecha_fin: $('#fecha_fin').val(),
                    descripcion_es: $('#descripcion_es').val(),
                    descripcion_eng: $('#descripcion_eng').val(),
                    fecha_eliminacion: $('#fecha_eliminacion').val()
                };

                console.log("Datos enviados al servidor: ", eventData); // Depuración

                // Validar fechas
                if (!eventData.titulo || !eventData.fecha_inicio) {
                    alert("El título y la fecha de inicio son obligatorios.");
                    return;
                }

                if (eventData.fecha_fin < eventData.fecha_inicio) {
                    alert("La fecha de fin no puede ser anterior a la fecha de inicio.");
                    return;
                }

                // Petición AJAX para guardar evento
                $.ajax({
                    url: '<?= base_url('/add-event') ?>',
                    method: 'POST',
                    data: eventData,
                    success: function(response) {
                        console.log("Respuesta del servidor: ", response);
                        if (response.status === 'success') {
                            calendar.refetchEvents();
                            myModal.hide();
                        } else {
                            alert("Error al agregar el evento: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al agregar el evento: ", status, error);
                    }
                });
            });
        },

        // Eliminar evento
        eventClick: function(info) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Este evento será eliminado permanentemente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminarlo',
                cancelButtonText: 'No, cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('/delete-event') ?>/' + info.event.id,
                        method: 'DELETE',
                        success: function(response) {
                            if (response.status === 'success') {
                                info.event.remove();
                                Swal.fire('Eliminado!', 'El evento ha sido eliminado.', 'success');
                            } else {
                                Swal.fire('Error', 'No se pudo eliminar el evento.', 'error');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error en la petición AJAX: ", status, error);
                            Swal.fire('Error', 'Hubo un problema al intentar eliminar el evento.', 'error');
                        }
                    });
                } else {
                    Swal.fire('Cancelado', 'El evento no fue eliminado.', 'info');
                }
            });
        }
    });

    calendar.render();
});

    </script>
</body>
</html>