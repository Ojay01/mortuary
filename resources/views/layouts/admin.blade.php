<!DOCTYPE html>

<html lang="en" class="light-style layout-compact layout-navbar-fixed layout-menu-fixed     " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-base-url="https://mortuary.cloud" data-framework="laravel" data-template="vertical-menu-theme-default-light">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />


<title>@yield('title', 'Dashboard') | {{ config('app.name', 'MutaWare') }}</title>
  <meta name="description" content="Compassionate and dignified funeral services. Our mortuary provides professional care and support during difficult times, ensuring a respectful farewell for your loved ones." />
  <meta name="keywords" content="Mutaware, UB End of Year Project, Mortuary management system">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://mortuary.cloud">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />

    

  <!-- Include Styles -->
  <!-- $isFront is used to append the front layout styles only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/vendor/fonts/boxiconsc4a7.css?id=87122b3a3900320673311cebdeb618da" />
<link rel="stylesheet" href="assets/vendor/fonts/fontawesome8a69.css?id=a2997cb6a1c98cc3c85f4c99cdea95b5" />
<link rel="stylesheet" href="assets/vendor/fonts/flag-icons80a8.css?id=121bcc3078c6c2f608037fb9ca8bce8d" />
<!-- Core CSS -->
<link rel="stylesheet" href="assets/vendor/css/rtl/corea8ac.css?id=55b2a9dfaa009c41df62ca8d16e913a8" class="template-customizer-core-css" />
<link rel="stylesheet" href="assets/vendor/css/rtl/theme-default4c4b.css?id=9182924a7b965439eca5e189ba43eba1" class="template-customizer-theme-css" />
<link rel="stylesheet" href="assets/css/demob77a.css?id=69dfc5e48fce5a4ff55ff7b593cdf93d" />
<!-- Vendors CSS -->
<link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbare482.css?id=73d641bb8db2475ecafc6c68461ed01b" />
<link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead05d2.css?id=de339ead5e9c9e36f12e46cbef7aaffd" />

<!-- Vendor Styles -->
<link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
<link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
<link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/libs/%40form-validation/umd/styles/index.min.css" />
<link rel="stylesheet" href="assets/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="assets/vendor/libs/sweetalert2/sweetalert2.css" />


<!-- Page Styles -->

  <!-- Include Scripts for customizer, helper, analytics, config -->
  <!-- $isFront is used to append the front layout scriptsIncludes only on the front layout otherwise the variable will be blank -->
  <!-- laravel style -->
<script src="assets/vendor/js/helpers.js"></script>
<!-- beautify ignore:start -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="assets/vendor/js/template-customizer.js"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="assets/js/config.js"></script>

  <script>
    window.templateCustomizer = new TemplateCustomizer({
      cssPath: '',
      themesPath: '',
      defaultStyle: "light",
      defaultShowDropdownOnHover: "true", // true/false (for horizontal layout only)
      displayCustomizer: "true",
      lang: 'en',
      pathResolver: function(path) {
        var resolvedPaths = {
          // Core stylesheets
                      'core.css': 'https://mortuary.cloud/assets/vendor/css/rtl/core.css?id=55b2a9dfaa009c41df62ca8d16e913a8',
            'core-dark.css': 'https://mortuary.cloud/assets/vendor/css/rtl/core-dark.css?id=d98ae2a03b5b1b05651411ee58ef81a6',
          
          // Themes
                      'theme-default.css': 'https://mortuary.cloud/assets/vendor/css/rtl/theme-default.css?id=9182924a7b965439eca5e189ba43eba1',
            'theme-default-dark.css':
            'https://mortuary.cloud/assets/vendor/css/rtl/theme-default-dark.css?id=ae30991ef3f62e7c03ca6f8930843e80',
                      'theme-bordered.css': 'https://mortuary.cloud/assets/vendor/css/rtl/theme-bordered.css?id=a4f95a927b1e2bcdfd57a3bbfb2bd3d9',
            'theme-bordered-dark.css':
            'https://mortuary.cloud/assets/vendor/css/rtl/theme-bordered-dark.css?id=2a668deb480284f975db82d0a7277156',
                      'theme-semi-dark.css': 'https://mortuary.cloud/assets/vendor/css/rtl/theme-semi-dark.css?id=9c02fb39c47f91b2d198f343fa8b4df7',
            'theme-semi-dark-dark.css':
            'https://mortuary.cloud/assets/vendor/css/rtl/theme-semi-dark-dark.css?id=c4b1950a14ffd431f752917b97a0ee51',
                  }
        return resolvedPaths[path] || path;
      },
      'controls': ["rtl","style","headerType","contentLayout","layoutCollapsed","layoutNavbarOptions","themes"],
    });
  </script>
</head>

<body>
    

  <!-- Layout Content -->
  <div class="layout-wrapper layout-content-navbar ">
  <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
    <a href="/" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="assets/img/logo.png" class="img-fluid" alt="Logo" width="50"> 
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">{{ config('app.name', 'MotaWare') }}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  
  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    

    <li class="menu-item ">
      <a href="#" class="menu-link" >
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div class="text-truncate">Dashboard</div>
                  <!--div class="badge bg-danger rounded-pill ms-auto">5</div-->
              </a>
    </li>
            
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link" >
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div class="text-truncate">Alert</div>
              </a>
          </li>

    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div class="text-truncate">Corpse </div>
              </a>
            <ul class="menu-sub">
      <li class="menu-item ">
        <a href="#" class="menu-link" >
                    <div>Generate QR Code</div>
        </a>
              </li>
      <li class="menu-item ">
        <a href="#" class="menu-link"  >
                    <div>Enrol Corpse</div>
        </a>  
              </li>
      <li class="menu-item ">
        <a href="#" class="menu-link" >
                    <div>All Corpse</div>
        </a>  
              </li>

      <li class="menu-item ">
        <a href="#" class="menu-link" >
                    <div>Present Corpses </div>
        </a>
              </li>
      <li class="menu-item ">
        <a href="#" class="menu-link" >
                    <div>Removed Corpses</div>
        </a>
        </li>
      </ul>
          </li>

<li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div class="text-truncate">Staff</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="#" class="menu-link" >
                    <div>All Staff</div>
        </a>

        
              </li>
      <li class="menu-item ">
        <a href="#" class="menu-link" >
                    <div>Add Staff</div>
        </a>

        
             
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>View</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/user/view/account.html" class="menu-link" >
                    <div>Account</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/user/view/security.html" class="menu-link" >
                    <div>Security</div>
        </a>

        
              </li>
  
      <li class="menu-item ">
        <a href="../app/user/view/billing.html" class="menu-link" >
                    <div>Billing &amp; Plans</div>
        </a>

        
              </li>
   
      <li class="menu-item ">
        <a href="../app/user/view/notifications.html" class="menu-link" >
                    <div>Notifications</div>
        </a>

        
              </li>
    
      <li class="menu-item ">
        <a href="../app/user/view/connections.html" class="menu-link" >
                    <div>Connections</div>
        </a>

              </li>
      </ul>
              </li>
      </ul>
          </li>

          <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div class="text-truncate">Embalm't &amp; Freezer</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="#" class="menu-link" >
                    <div>Embalment Rooms</div>
        </a>

              </li>
    
      <li class="menu-item ">
        <a href="#" class="menu-link" >
                    <div>Freezers</div>
        </a>

        
              </li>  

      </ul>
          </li>
  
        
    <li class="menu-item ">
      <a href="#" class="menu-link" >
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div class="text-truncate">Notification</div>
              </a>
          </li>
   
    <li class="menu-item ">
      <a href="#" class="menu-link" >
                <i class="menu-icon tf-icons bx bx-check-shield"></i>
                <div class="text-truncate">Profile</div>
              </a>

          </li>

    <li class="menu-item ">
      <a href="#" class="menu-link" >
                <i class="menu-icon bx bx-cog fs-4"></i>
                <div class="text-truncate">Settings</div>
              </a>

      
          </li>

          </ul>

</aside>
    

    <!-- Layout page -->
    <div class="layout-page">

      <!-- BEGIN: Navbar-->
            <!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    
      <!--  Brand demo (display only for navbar-full and hide on below xl) -->
      
      <!-- ! Not required for layout-without-menu -->
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>
      
      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        
      <ul class="navbar-nav flex-row align-items-center ms-auto">
        

        <!-- Quick links  -->
        <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
            <i class='bx bx-grid-alt bx-sm'></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end py-0">
            <div class="dropdown-menu-header border-bottom">
              <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="bx bx-sm bx-plus-circle"></i></a>
              </div>
            </div>
            <div class="dropdown-shortcuts-list scrollable-container">
              
              <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="bx bx-user fs-4"></i>
                  </span>
                  <a href="#" class="stretched-link">Staffs</a>
                  <small class="text-muted mb-0">Manage Staff</small>
                </div>
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="bx bx-check-shield fs-4"></i>
                  </span>
                  <a href="#" class="stretched-link">User Profile</a>
                  <small class="text-muted mb-0">Profile Settings</small>
                </div>
              </div>
              <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="bx bx-pie-chart-alt-2 fs-4"></i>
                  </span>
                  <a href="#" class="stretched-link">Dashboard</a>
                  <small class="text-muted mb-0">My Dashboard</small>
                </div>
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="bx bx-cog fs-4"></i>
                  </span>
                  <a href="#" class="stretched-link">Setting</a>
                  <small class="text-muted mb-0">Site Settings</small>
                </div>
              </div>
              
            </div>
          </div>
        </li>
        <!-- Quick links -->

                <!-- Style Switcher -->
        <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <i class='bx bx-sm'></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                <span class="align-middle"><i class='bx bx-sun me-2'></i>Light</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                <span class="align-middle"><i class="bx bx-moon me-2"></i>Dark</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                <span class="align-middle"><i class="bx bx-desktop me-2"></i>System</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ Style Switcher -->
        
        <!-- Notification -->
        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
            <i class="bx bx-bell bx-sm"></i>
            <span class="badge bg-danger rounded-pill badge-notifications">5</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end py-0">
            <li class="dropdown-menu-header border-bottom">
              <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">Notification</h5>
                <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
              </div>
            </li>
            <li class="dropdown-notifications-list scrollable-container">
              <ul class="list-group list-group-flush">
                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                      <p class="mb-0">Won the monthly best seller gold badge</p>
                      <small class="text-muted">1h ago</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                      <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">Charles Franklin</h6>
                      <p class="mb-0">Accepted your connection</p>
                      <small class="text-muted">12hr ago</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                      <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <img src="assets/img/avatars/2.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">New Message ✉️</h6>
                      <p class="mb-0">You have new message from Natalie</p>
                      <small class="text-muted">1h ago</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                      <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-cart"></i></span>
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">Whoo! You have new order 🛒 </h6>
                      <p class="mb-0">ACME Inc. made new order $1,154</p>
                      <small class="text-muted">1 day ago</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                      <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <img src="assets/img/avatars/9.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">Application has been approved 🚀 </h6>
                      <p class="mb-0">Your ABC project application has been approved.</p>
                      <small class="text-muted">2 days ago</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                      <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-pie-chart-alt"></i></span>
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">Monthly report is generated</h6>
                      <p class="mb-0">July monthly financial report is generated </p>
                      <small class="text-muted">3 days ago</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                      <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <img src="assets/img/avatars/5.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">Send connection request</h6>
                      <p class="mb-0">Peter sent you connection request</p>
                      <small class="text-muted">4 days ago</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                      <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <img src="assets/img/avatars/6.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">New message from Jane</h6>
                      <p class="mb-0">Your have new message from Jane</p>
                      <small class="text-muted">5 days ago</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                      <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <span class="avatar-initial rounded-circle bg-label-warning"><i class="bx bx-error"></i></span>
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">CPU is running high</h6>
                      <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>
                      <small class="text-muted">5 days ago</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                      <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown-menu-footer border-top p-3">
              <button class="btn btn-primary text-uppercase w-100">view all notifications</button>
            </li>
          </ul>
        </li>
        <!--/ Notification -->

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-medium d-block">
                                            {{Auth::user()->name}}
                                          </span>
                    <small class="text-muted">Admin</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
              </a>
            </li>
                        <li>
              <a class="dropdown-item" href="#">
                <span class="d-flex align-items-center align-middle">
                  <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                  <span class="flex-grow-1 align-middle">Billing</span>
                </span>
              </a>
            </li>
                          <li>
                <div class="dropdown-divider"></div>
              </li>
                            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class='bx bx-log-out me-2'></i>
                  <span class="align-middle">Logout</span>
                </a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                          </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>

      <!-- Search Small Screens -->
      <div class="navbar-search-wrapper search-input-wrapper  d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
      </div>

        </nav>
  <!-- / Navbar -->
            <!-- END: Navbar-->

        @yield('content')


</div>
      <!-- / Layout page -->
    </div>

        <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
    <!--/ Layout Content -->

  
  <div class="buy-now">
    <a href="/" target="_blank" class="btn btn-info btn-buy-now">Enrol Corpse</a>
  </div>
  

  <!-- Include Scripts -->
  <!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Vendor JS-->
<script src="assets/vendor/libs/jquery/jquery1e84.js?id=0f7eb1f3a93e3e19e8505fd8c175925a"></script>
<script src="assets/vendor/libs/popper/popper0a73.js?id=baf82d96b7771efbcc05c3b77135d24c"></script>
<script src="assets/vendor/js/bootstrapcfc4.js?id=4648227467e3fd3f4cf976cfb0e43aea"></script>
<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js?id=44b8e955848dc0c56597c09f6aebf89a"></script>
<script src="assets/vendor/libs/hammer/hammer2de0.js?id=0a520e103384b609e3c9eb3b732d1be8"></script>
<script src="assets/vendor/libs/typeahead-js/typeahead60e7.js?id=f6bda588c16867a6cc4158cb4ed37ec6"></script>
<script src="assets/vendor/js/menu2dc9.js?id=c6ce30ded4234d0c4ca0fb5f2a2990d8"></script>
<script src="assets/vendor/libs/moment/moment.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/select2/select2.js"></script>
<script src="assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js"></script>
<script src="assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js"></script>
<script src="assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="assets/js/maind63d.js?id=6bea3f2e092d5fe7327c226f3242f31b"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="js/laravel-user-management.js"></script>
<!-- END: Page JS-->
<script src="assets/js/dashboards-analytics.js"></script>
</body>

</html>
