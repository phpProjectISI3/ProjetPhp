@extends('layout.app')

@section('title','email read')

@section('body')
    <!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details">UX Designer <i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-inline">
							<li class="list-inline-item"><a href="user-profile.html" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
							<li class="list-inline-item"><a href="email_inbox.html"><i class="feather icon-mail" data-toggle="tooltip" title="Messages"></i><small class="badge badge-pill badge-primary">5</small></a></li>
							<li class="list-inline-item"><a href="auth-signin.html" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
						<ul class="pcoded-submenu">
							<li><a href="index.html">Default</a></li>
							<li><a href="dashboard-sale.html">Sales</a></li>
							<li><a href="dashboard-crm.html">CRM</a></li>
							<li><a href="dashboard-analytics.html">Analytics</a></li>
							<li><a href="dashboard-project.html">Project</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Page layouts</span></a>
						<ul class="pcoded-submenu">
							<li class="pcoded-hasmenu"><a href="#!">Vertical</a>
								<ul class="pcoded-submenu">
									<li><a href="layout-static.html" target="_blank">Static</a></li>
									<li><a href="layout-fixed.html" target="_blank">Fixed</a></li>
									<li><a href="layout-menu-fixed.html" target="_blank">Navbar fixed</a></li>
									<li><a href="layout-mini-menu.html" target="_blank">Collapse menu</a></li>
									<li><a href="layout-rtl.html" target="_blank">Vertical RTL</a></li>
								</ul>
							</li>
							<li><a href="layout-horizontal.html" target="_blank">Horizontal</a></li>
							<li><a href="layout-horizontal-2.html" target="_blank">Horizontal v2</a></li>
							<li><a href="layout-horizontal-rtl.html" target="_blank">Horizontal RTL</a></li>
							<li><a href="layout-box.html" target="_blank">Box layout</a></li>
							<li><a href="layout-light.html" target="_blank">Navbar dark</a></li>
							<li><a href="layout-dark.html" target="_blank">Dark layout <span class="pcoded-badge badge badge-danger">Hot</span></a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layers"></i></span><span class="pcoded-mtext">Widget</span><span class="pcoded-badge badge badge-success">100+</span></a>
						<ul class="pcoded-submenu">
							<li><a href="widget-statistic.html">Statistic</a></li>
							<li><a href="widget-data.html">Data</a></li>
							<li><a href="widget-chart.html">Chart</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">User</span></a>
						<ul class="pcoded-submenu">
							<li><a href="user-profile.html">Profile</a></li>
							<li><a href="user-card.html">User Card</a></li>
							<li><a href="user-list.html">User List</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Admin Panel <span class="pcoded-badge badge badge-danger">NEW</span><span class="pcoded-badge badge badge-warning">HOT</span></label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-activity"></i></span><span class="pcoded-mtext">Hospital</span></a>
						<ul class="pcoded-submenu">
							<li><a href="hospital-dashboard.html">Dashboard</a></li>
							<li><a href="hospital-department.html">Department</a></li>
							<li><a href="hospital-doctor.html">Doctor</a></li>
							<li><a href="hospital-patient.html">Patient</a></li>
							<li><a href="hospital-nurse.html">Nurse</a></li>
							<li><a href="hospital-pharmacist.html">Pharmacist</a></li>
							<li><a href="hospital-laboratorie.html">Laboratorie</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-package"></i></span><span class="pcoded-mtext">Project &amp; CRM</span></a>
						<ul class="pcoded-submenu">
							<li><a href="project-dashboard.html">Dashboard</a></li>
							<li><a href="project-customers.html">Customers</a></li>
							<li><a href="project-projects.html">Projects</a></li>
							<li><a href="project-task.html">Task</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user-check"></i></span><span class="pcoded-mtext">Membership</span></a>
						<ul class="pcoded-submenu">
							<li><a href="member-dashboard.html">Dashboard</a></li>
							<li><a href="member-mail-template.html">Email templates</a></li>
							<li><a href="member-countries.html">Country</a></li>
							<li><a href="member-coupons.html">Coupons</a></li>
							<li><a href="member-newsletter.html">Newsletter</a></li>
							<li><a href="member-user.html">User</a></li>
							<li><a href="member-membership.html">Membership</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-life-buoy"></i></span><span class="pcoded-mtext">Helpdesk</span></a>
						<ul class="pcoded-submenu">
							<li><a href="help-dashboard.html">Helpdesk dashboard</a></li>
							<li><a href="help-create-ticket.html">Create ticket</a></li>
							<li><a href="help-ticket.html">ticket list</a></li>
							<li><a href="help-ticket-details.html">ticket Details</a></li>
							<li><a href="help-customer.html">Customer</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">School</span></a>
						<ul class="pcoded-submenu">
							<li><a href="school-dashboard.html">Dashboard</a></li>
							<li><a href="school-student.html">Student</a></li>
							<li><a href="school-parents.html">Parents</a></li>
							<li><a href="school-teacher.html">Teacher</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link" data-toggle="tooltip" title="Student Information System"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">SIS</span></a>
						<ul class="pcoded-submenu">
							<li><a href="sis-dashboard.html">Dashboard</a></li>
							<li><a href="sis-leave.html">Leave</a></li>
							<li><a href="sis-evaluation.html">Evaluation</a></li>
							<li><a href="sis-event.html">Event</a></li>
							<li><a href="sis-circular.html">Circular</a></li>
							<li><a href="sis-course.html">Course</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-target"></i></span><span class="pcoded-mtext">Crypto</span></a>
						<ul class="pcoded-submenu">
							<li><a href="crypto-dashboard.html">Dashboard</a></li>
							<li><a href="crypto-exchange.html">Exchange</a></li>
							<li><a href="crypto-wallet.html">Wallet</a></li>
							<li><a href="crypto-transactions.html">Transactions</a></li>
							<li><a href="crypto-history.html">History</a></li>
							<li><a href="crypto-trading.html">Trading</a></li>
							<li><a href="crypto-initial-coin.html">Initial coin</a></li>
							<li><a href="crypto-ico-listing.html">Ico listing</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span><span class="pcoded-mtext">E-Commerce</span></a>
						<ul class="pcoded-submenu">
							<li><a href="ecom-product.html">Product</a></li>
							<li><a href="ecom-product-details.html">Product details</a></li>
							<li><a href="ecom-order.html">Order</a></li>
							<li><a href="ecom-checkout.html">Checkout</a></li>
							<li><a href="ecom-cart.html">Shopping Cart</a></li>
							<li><a href="ecom-customers.html">Customers</a></li>
							<li><a href="ecom-sellers.html">Sellers</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>UI Element</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Basic</span></a>
						<ul class="pcoded-submenu">
							<li><a href="bc_alert.html">Alert</a></li>
							<li><a href="bc_button.html">Button</a></li>
							<li><a href="bc_badges.html">Badges</a></li>
							<li><a href="bc_breadcrumb-pagination.html">Breadcrumb & paggination</a></li>
							<li><a href="bc_card.html">Cards</a></li>
							<li><a href="bc_collapse.html">Collapse</a></li>
							<li><a href="bc_carousel.html">Carousel</a></li>
							<li><a href="bc_grid.html">Grid system</a></li>
							<li><a href="bc_progress.html">Progress</a></li>
							<li><a href="bc_modal.html">Modal</a></li>
							<li><a href="bc_spinner.html">Spinner</a></li>
							<li><a href="bc_tabs.html">Tabs & pills</a></li>
							<li><a href="bc_typography.html">Typography</a></li>
							<li><a href="bc_tooltip-popover.html">Tooltip & popovers</a></li>
							<li><a href="bc_toasts.html">Toasts</a></li>
							<li><a href="bc_extra.html">Other</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-gitlab"></i></span><span class="pcoded-mtext">Advance</span></a>
						<ul class="pcoded-submenu">
							<li><a href="ac_alert.html">Sweet alert</a></li>
							<li><a href="ac-datepicker-componant.html">Datepicker</a></li>
							<li><a href="ac_lightbox.html">Lightbox</a></li>
							<li><a href="ac_notification.html">Notification</a></li>
							<li><a href="ac_pnotify.html">Pnotify</a></li>
							<li><a href="ac_rating.html">Rating</a></li>
							<li><a href="ac_rangeslider.html">Rangeslider</a></li>
							<li><a href="ac_syntax_highlighter.html">Syntax highlighter</a></li>
						</ul>
					</li>
					<li class="nav-item"><a href="animation.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-aperture"></i></span><span class="pcoded-mtext">Animations</span></a></li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-feather"></i></span><span class="pcoded-mtext">Icons</span></a>
						<ul class="pcoded-submenu">
							<li><a href="icon-feather.html">Feather<span class="pcoded-badge badge badge-danger">NEW</span></a></li>
							<li><a href="icon-fontawsome.html">Font Awesome 5<span class="pcoded-badge badge badge-primary">1000+</span></a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Forms</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Forms</span></a>
						<ul class="pcoded-submenu">
							<li><a href="form_elements.html">Form elements</a></li>
							<li><a href="form-elements-advance.html">Form advance</a></li>
							<li><a href="form-validation.html">Form validation</a></li>
							<li><a href="form-masking.html">Form masking</a></li>
							<li><a href="form-wizard.html">Form wizard</a></li>
							<li><a href="form-picker.html">Form picker</a></li>
							<li><a href="form-select.html">Form select</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>table</label>
					 	</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Bootstrap table</span></a>
						<ul class="pcoded-submenu">
							<li><a href="tbl_bootstrap.html">Basic table</a></li>
							<li><a href="tbl_sizing.html">Sizing table</a></li>
							<li><a href="tbl_border.html">Border table</a></li>
							<li><a href="tbl_styling.html">Styling table</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-package"></i></span><span class="pcoded-mtext">Data table</span></a>
						<ul class="pcoded-submenu">
							<li><a href="dt_basic.html">Basic initialization</a></li>
							<li><a href="dt_advance.html">Advance initialization</a></li>
							<li><a href="dt_styling.html">Styling</a></li>
							<li><a href="dt_api.html">API</a></li>
							<li><a href="dt_plugin.html">Plug-in</a></li>
							<li><a href="dt_sources.html">Data sources</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">DT extensions</span></a>
						<ul class="pcoded-submenu">
							<li><a href="dt_ext_autofill.html">Autofill</a></li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link "><span class="pcoded-mtext">Button</span></a>
								<ul class="pcoded-submenu">
									<li><a href="dt_ext_basic_buttons.html">Basic button</a></li>
									<li><a href="dt_ext_export_buttons.html">Data export</a></li>
								</ul>
							</li>
							<li><a href="dt_ext_col_reorder.html">Col reorder</a></li>
							<li><a href="dt_ext_fixed_columns.html">Fixed columns</a></li>
							<li><a href="dt_ext_fixed_header.html">Fixed header</a></li>
							<li><a href="dt_ext_key_table.html">Key table</a></li>
							<li><a href="dt_ext_responsive.html">Responsive</a></li>
							<li><a href="dt_ext_row_reorder.html">Row reorder</a></li>
							<li><a href="dt_ext_scroller.html">Scroller</a></li>
							<li><a href="dt_ext_select.html">Select table</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Chart & Maps</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Chart</span></a>
						<ul class="pcoded-submenu">
							<li><a href="chart-apex.html">Apex Chart</a></li>
							<li><a href="chart-chartjs.html">Chart js</a></li>
							<li><a href="chart-highchart.html">Highchart</a></li>
							<li><a href="chart-knob.html">Knob</a></li>
							<li><a href="chart-peity.html">Peity</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
						<ul class="pcoded-submenu">
							<li><a href="map-google.html">Google</a></li>
							<li><a href="map-api.html">Gmap search API</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Pages</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
						<ul class="pcoded-submenu">
							<li><a href="auth-signup.html" target="_blank">Sign up</a></li>
							<li><a href="auth-signup-img-side.html" target="_blank">Sign up v2 <span class="pcoded-badge badge badge-light-danger">NEW</span></a></li>
							<li><a href="auth-signin.html" target="_blank">Sign in</a></li>
							<li><a href="auth-signin-img-side.html" target="_blank">Sign in v2 <span class="pcoded-badge badge badge-light-danger">NEW</span></a></li>
							<li><a href="auth-reset-password.html" target="_blank">Reset password</a></li>
							<li><a href="auth-reset-password-img-side.html" target="_blank">Reset password v2 <span class="pcoded-badge badge badge-light-danger">NEW</span></a></li>
							<li><a href="auth-change-password.html" target="_blank">Change password</a></li>
							<li><a href="auth-change-password-img-side.html" target="_blank">Change password v2 <span class="pcoded-badge badge badge-light-danger">NEW</span></a></li>
							<li><a href="auth-profile-settings.html" target="_blank">Profile settings</a></li>
							<li><a href="auth-tabs.html" target="_blank">Tabs Authentication</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sliders"></i></span><span class="pcoded-mtext">Maintenance</span></a>
						<ul class="pcoded-submenu">
							<li><a href="maint-error.html">Error</a></li>
							<li><a href="maint-offline-ui.html" target="_blank">Offline UI</a></li>
							<li><a href="maint-maintance.html" target="_blank">Maintenance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>App</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-mail"></i></span><span class="pcoded-mtext">Email</span></a>
						<ul class="pcoded-submenu">
							<li><a href="email_inbox.html">Inbox</a></li>
							<li><a href="email_read.html">Read mail</a></li>
							<li><a href="email_compose.html">Compose mail</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-clipboard"></i></span><span class="pcoded-mtext">Task</span></a>
						<ul class="pcoded-submenu">
							<li><a href="task-list.html">List</a></li>
							<li><a href="task-board.html">Board</a></li>
							<li><a href="task-detail.html">Detail</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="todo.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-check-square"></i></span><span class="pcoded-mtext">To-Do</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-image"></i></span><span class="pcoded-mtext">Gallery</span></a>
						<ul class="pcoded-submenu">
							<li><a href="gallery-grid.html">Grid</a></li>
							<li><a href="gallery-masonry.html">Masonry</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Extension</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-plus"></i></span><span class="pcoded-mtext">Editor</span></a>
						<ul class="pcoded-submenu">
							<li><a href="editor-classic.html">CK editor</a></li>
							<li><a href="editor-trumbowyg.html">Trumbowyg editor</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Invoice</span></a>
						<ul class="pcoded-submenu">
							<li><a href="invoice.html">Invoice</a></li>
							<li><a href="invoice-summary.html">Invoice summary</a></li>
							<li><a href="invoice-list.html">Invoice list</a></li>
						</ul>
					</li>
					<li class="nav-item"><a href="full-calendar.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Full calendar</span></a></li>
					<li class="nav-item"><a href="file-upload.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-upload-cloud"></i></span><span class="pcoded-mtext">File upload</span></a></li>
					<li class="nav-item"><a href="image_crop.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-scissors"></i></span><span class="pcoded-mtext">Image cropper</span></a></li>
					<li class="nav-item pcoded-menu-caption">
						<label>Other</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Menu levels</span></a>
						<ul class="pcoded-submenu">
							<li><a href="#">Menu Level 2.1</a></li>
							<li class="pcoded-hasmenu">
								<a href="#">Menu level 2.2</a>
								<ul class="pcoded-submenu">
									<li><a href="#">Menu level 3.1</a></li>
									<li><a href="#">Menu level 3.2</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="nav-item disabled"><a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Disabled menu</span></a></li>
					<li class="nav-item"><a href="sample-page.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li>

				</ul>
				
				<div class="card text-center">
					<div class="card-block">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="feather icon-sunset f-40"></i>
						<h6 class="mt-3">Help?</h6>
						<p>Please contact us on our email for need any support</p>
						<a href="#!" target="_blank" class="btn btn-primary btn-sm text-white m-0">Support</a>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="assets/images/logo.png" alt="" class="logo">
						<img src="assets/images/logo-icon.png" alt="" class="logo-thumb">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li>
							<div class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
								<div class="dropdown-menu dropdown-menu-right notification">
									<div class="noti-head">
										<h6 class="d-inline-block m-b-0">Notifications</h6>
										<div class="float-right">
											<a href="#!" class="m-r-10">mark as read</a>
											<a href="#!">clear all</a>
										</div>
									</div>
									<ul class="noti-body">
										<li class="n-title">
											<p class="m-b-0">NEW</p>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
													<p>New ticket Added</p>
												</div>
											</div>
										</li>
										<li class="n-title">
											<p class="m-b-0">EARLIER</p>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
													<p>Prchace New Theme and make payment</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
													<p>currently login</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
													<p>Prchace New Theme and make payment</p>
												</div>
											</div>
										</li>
									</ul>
									<div class="noti-footer">
										<a href="#!">show all</a>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
										<img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
										<span>John Doe</span>
										<a href="auth-signin.html" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
									</div>
									<ul class="pro-body">
										<li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
										<li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
										<li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">View Email</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Email</a></li>
                            <li class="breadcrumb-item"><a href="#!">View Email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card email-card">
                    <div class="card-header">
                        <div class="mail-header">
                            <div class="row align-items-center">
                                <!-- [ email-left section ] start -->
                                <div class="col-xl-2 col-md-3">
                                    <a href="index.html" class="b-brand">
                                        <div class="b-bg">
                                            A
                                        </div>
                                        <span class="b-title text-muted">Able pro</span>
                                    </a>
                                </div>
                                <!-- [ email-left section ] end -->
                                <!-- [ email-right section ] start -->
                                <div class="col-xl-10 col-md-9">
                                    <div class="input-group mb-0">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01"><i class="feather icon-search"></i></label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01">
                                            <option selected>Search ...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- [ email-right section ] end -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mail-body">
                            <div class="row">
                                <!-- [ email-left section ] start -->
                                <div class="col-xl-2 col-md-3">
                                    <div class="mb-3">
                                        <a href="email_compose.html" class="btn waves-effect waves-light btn-rounded btn-outline-primary">+ Compose</a>
                                    </div>
                                    <ul class="mb-2 nav nav-tab flex-column nav-pills">
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-left active" href="email_inbox.html">
                                                <span><i class="feather icon-inbox"></i>Index</span>
                                                <span class="float-right">6</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-left" href="email_inbox.html">
                                                <span><i class="feather icon-star-on"></i>Starred</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-left" href="email_inbox.html">
                                                <span><i class="feather icon-file-text"></i>Drafts</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-left" href="email_inbox.html">
                                                <span><i class="feather icon-navigation"></i>Sent Mail</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-left" href="email_inbox.html">
                                                <span><i class="feather icon-trash-2"></i>Trash</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="email-more-link" data-toggle="collapse" href="#email-more-cont" role="button" aria-expanded="false" aria-controls="email-more-cont"><span><i class="feather icon-chevron-down mr-2"></i>More</span><span
                                            style="display: none;"><i class="feather icon-chevron-up mr-2"></i>Less</span></a>
                                    <div class="collapse" id="email-more-cont">
                                        <ul class="nav nav-tab flex-column nav-pills">
                                            <li class="nav-item mail-section">
                                                <a class="nav-link text-left">
                                                    <span><i class="feather icon-zap"></i> Important</span>
                                                    <span class="float-right">6</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section">
                                                <a class="nav-link text-left">
                                                    <span><i class="feather icon-message-circle"></i> Chats</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section">
                                                <a class="nav-link text-left">
                                                    <span><i class="feather icon-alert-triangle"></i> Spam</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- [ email-left section ] end -->
                                <!-- [ email-right section ] start -->
                                <div class="col-xl-10 col-md-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="d-inline-block m-0">Here You Have New Opportunity...</h6>
                                            <p class="float-right m-0"><strong>08:23 AM</strong></p>
                                        </div>
                                        <div class="card-body">
                                            <div class="email-read">
                                                <div class="photo-table m-r-10">
                                                    <a href="#">
                                                        <img class="media-object img-radius" src="assets/images/user/avatar-1.jpg" alt="E-mail user" style="width:50px;">
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="#">
                                                        <p class="user-name text-dark mb-1"><strong>John Doe</strong></p>
                                                    </a>
                                                    <a class="user-mail txt-muted" href="#">
                                                        <p class="user-name text-dark mb-1"><strong>From:johndoe7869@gmail.com</strong></p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="m-b-20 m-l-50 p-l-10 email-contant">
                                                <div class="photo-contant">
                                                    <div>
                                                        <p class="user-name text-dark mb-1"><strong>Hello Dear...</strong></p>
                                                        <div class="email-content">
                                                            <p class="">
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient
                                                                montes, nascetur ridiculus mus.Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis.
                                                            </p>
                                                            <ul>
                                                                <li>Lorem ipsum dolor sit amet</li>
                                                                <li>Consectetur adipiscing elit</li>
                                                                <li>Facilisis in pretium nisl aliquet</li>
                                                                <li>Nulla volutpat aliquam velit
                                                                    <ul>
                                                                        <li>Phasellus iaculis neque</li>
                                                                        <li>Purus sodales ultricies</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Faucibus porta lacus fringilla vel</li>
                                                                <li>Eget porttitor lorem</li>
                                                            </ul>
                                                            <blockquote class="blockquote">
                                                                <p class="mb-2">
                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient
                                                                    montes, nascetur ridiculus mus.
                                                                </p>
                                                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                    <div class="m-t-15">
                                                        <i class="feather icon-paperclip f-20 m-r-10"></i>Attachments <b>(3)</b>
                                                        <div class="row mail-img m-t-20">
                                                            <div class="col-sm-4 col-md-3 col-xl-2 m-b-20">
                                                                <a href="assets/images/slider/img-slide-4.jpg" data-toggle="lightbox" data-title="Able pro Image 1" data-footer="Able pro Image 1"><img src="assets/images/slider/img-slide-4.jpg"
                                                                        class="img-fluid img-thumbnail" alt=""></a>
                                                            </div>
                                                            <div class="col-sm-4 col-md-3 col-xl-2 m-b-20">
                                                                <a href="assets/images/slider/img-slide-1.jpg" data-toggle="lightbox" data-title="Able pro Image 2" data-footer="Able pro Image 2"><img src="assets/images/slider/img-slide-1.jpg"
                                                                        class="img-fluid img-thumbnail" alt=""></a>
                                                            </div>
                                                            <div class="col-sm-4 col-md-3 col-xl-2 m-b-20">
                                                                <a href="assets/images/slider/img-slide-3.jpg" data-toggle="lightbox" data-title="Able pro Image 3" data-footer="Able pro Image 3"><img src="assets/images/slider/img-slide-3.jpg"
                                                                        class="img-fluid img-thumbnail" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <form class="form-material">
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Reply Your Thoughts" required="">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ email-right section ] start -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->
    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    
    
@endsection

@section('scripts')
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/ripple.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
	<script src="assets/js/menu-setting.min.js"></script>

<!-- ekko-lightbox Js -->
<script src="assets/plugins/ekko-lightbox/js/ekko-lightbox.min.js"></script>
<script src="assets/plugins/lightbox2-master/js/lightbox.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    });
    
</script>
<script>
    document.getElementById('footer').style.display="none";
</script>
@endsection