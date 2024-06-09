<!DOCTYPE html>

<html lang="en" class="light-style layout-compact layout-navbar-fixed layout-menu-fixed     " dir="ltr" data-theme="theme-default" data-/assets-path="/assets/" data-base-url="https://mortuary.cloud" data-framework="laravel" data-template="vertical-menu-theme-default-light">
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
  <link rel="icon" type="image/x-icon" href="/assets/img/logo.png" />

    

  <!-- Include Styles -->
  <!-- $isFront is used to append the front layout styles only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

<link rel="stylesheet" href="/assets/vendor/fonts/boxiconsc4a7.css?id=87122b3a3900320673311cebdeb618da" />
<link rel="stylesheet" href="/assets/vendor/fonts/fontawesome8a69.css?id=a2997cb6a1c98cc3c85f4c99cdea95b5" />
<link rel="stylesheet" href="/assets/vendor/fonts/flag-icons80a8.css?id=121bcc3078c6c2f608037fb9ca8bce8d" />
<!-- Core CSS -->
<link rel="stylesheet" href="/assets/vendor/css/rtl/corea8ac.css?id=55b2a9dfaa009c41df62ca8d16e913a8" class="template-customizer-core-css" />
<link rel="stylesheet" href="/assets/vendor/css/rtl/theme-default4c4b.css?id=9182924a7b965439eca5e189ba43eba1" class="template-customizer-theme-css" />
<link rel="stylesheet" href="/assets/css/demob77a.css?id=69dfc5e48fce5a4ff55ff7b593cdf93d" />
<!-- Vendors CSS -->
<link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbare482.css?id=73d641bb8db2475ecafc6c68461ed01b" />
<link rel="stylesheet" href="/assets/vendor/libs/typeahead-js/typeahead05d2.css?id=de339ead5e9c9e36f12e46cbef7aaffd" />

<!-- Vendor Styles -->
<link rel="stylesheet" href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<link rel="stylesheet" href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
<link rel="stylesheet" href="/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
<link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="/assets/vendor/libs/%40form-validation/umd/styles/index.min.css" />
<link rel="stylesheet" href="/assets/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="/assets/vendor/libs/sweetalert2/sweetalert2.css" />
<link rel="stylesheet" href="/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
 <link rel="stylesheet" href="/assets/vendor/css/pages/page-account-settings.css" />
<!-- Vendor Styles -->
<link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />
<link rel="stylesheet" href="/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
<link rel="stylesheet" href="/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
<link rel="stylesheet" href="/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
<link rel="stylesheet" href="/assets/vendor/libs/pickr/pickr-themes.css" />
 <!-- Vendor Styles -->
<link rel="stylesheet" href="/assets/vendor/libs/bs-stepper/bs-stepper.css" />

<link rel="stylesheet" href="/assets/vendor/css/pages/page-profile.css" />
<!-- Page Styles -->

  <!-- Include Scripts for customizer, helper, analytics, config -->
  <!-- $isFront is used to append the front layout scriptsIncludes only on the front layout otherwise the variable will be blank -->
  <!-- laravel style -->
<script src="/assets/vendor/js/helpers.js"></script>
<!-- beautify ignore:start -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="/assets/vendor/js/template-customizer.js"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="/assets/js/config.js"></script>



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
                      'core.css': 'https://mortuary.cloud//assets/vendor/css/rtl/core.css?id=55b2a9dfaa009c41df62ca8d16e913a8',
            'core-dark.css': 'https://mortuary.cloud//assets/vendor/css/rtl/core-dark.css?id=d98ae2a03b5b1b05651411ee58ef81a6',
          
          // Themes
                      'theme-default.css': 'https://mortuary.cloud//assets/vendor/css/rtl/theme-default.css?id=9182924a7b965439eca5e189ba43eba1',
            'theme-default-dark.css':
            'https://mortuary.cloud//assets/vendor/css/rtl/theme-default-dark.css?id=ae30991ef3f62e7c03ca6f8930843e80',
                      'theme-bordered.css': 'https://mortuary.cloud//assets/vendor/css/rtl/theme-bordered.css?id=a4f95a927b1e2bcdfd57a3bbfb2bd3d9',
            'theme-bordered-dark.css':
            'https://mortuary.cloud//assets/vendor/css/rtl/theme-bordered-dark.css?id=2a668deb480284f975db82d0a7277156',
                      'theme-semi-dark.css': 'https://mortuary.cloud//assets/vendor/css/rtl/theme-semi-dark.css?id=9c02fb39c47f91b2d198f343fa8b4df7',
            'theme-semi-dark-dark.css':
            'https://mortuary.cloud//assets/vendor/css/rtl/theme-semi-dark-dark.css?id=c4b1950a14ffd431f752917b97a0ee51',
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

    

    <!-- Layout page -->
    <div class="d-block mx-auto">

     

        @yield('content')
        @if ($errors->any())
        <div class="bs-toast toast toast-ex animate__animated my-2 fade bg-danger animate__tada show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
  <div class="toast-header">
    <i class='bx bx-bell me-2'></i>
    <div class="me-auto fw-medium">Oooops!</div>
    <small>Now</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
  </div>
</div>
@endif
         @if(session('error'))
        <div class="bs-toast toast toast-ex animate__animated my-2 fade bg-danger animate__tada show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
  <div class="toast-header">
    <i class='bx bx-bell me-2'></i>
    <div class="me-auto fw-medium">Now</div>
    <small>Now</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
                {{ session('error') }}
  </div>
</div>
@endif
         @if(session('success'))
        <div class="bs-toast toast toast-ex animate__animated my-2 fade bg-success animate__tada show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
  <div class="toast-header">
    <i class='bx bx-bell me-2'></i>
    <div class="me-auto fw-medium">Bravoo!!!</div>
    <small>Now</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
                {{ session('success') }}
  </div>
</div>
@endif

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

  
  

  <!-- Include Scripts -->
  <!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Vendor JS-->
<script src="/assets/vendor/libs/jquery/jquery1e84.js?id=0f7eb1f3a93e3e19e8505fd8c175925a"></script>
<script src="/assets/vendor/libs/popper/popper0a73.js?id=baf82d96b7771efbcc05c3b77135d24c"></script>
<script src="/assets/vendor/js/bootstrapcfc4.js?id=4648227467e3fd3f4cf976cfb0e43aea"></script>
<script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js?id=44b8e955848dc0c56597c09f6aebf89a"></script>
<script src="/assets/vendor/libs/hammer/hammer2de0.js?id=0a520e103384b609e3c9eb3b732d1be8"></script>
<script src="/assets/vendor/libs/typeahead-js/typeahead60e7.js?id=f6bda588c16867a6cc4158cb4ed37ec6"></script>
<script src="/assets/vendor/js/menu2dc9.js?id=c6ce30ded4234d0c4ca0fb5f2a2990d8"></script>
<script src="/assets/vendor/libs/moment/moment.js"></script>
<script src="/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="/assets/vendor/libs/select2/select2.js"></script>
<script src="/assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js"></script>
<script src="/assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="/assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js"></script>
<script src="/assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="/assets/js/maind63d.js?id=6bea3f2e092d5fe7327c226f3242f31b"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="js/laravel-user-management.js"></script>
<!-- END: Page JS-->
<script src="/assets/js/dashboards-analytics.js"></script>

<script src="/assets/js/pages-account-settings-account.js"></script>
<script src="/assets/js/pages-account-settings-security.js"></script>
<script src="/assets/js/modal-enable-otp.js"></script>
<script src="/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
<script src="/assets/js/form-wizard-numbered.js"></script>
<script src="/assets/js/form-wizard-validation.js"></script>
<script src="/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="/assets/js/forms-pickers.js"></script>
<script src="/assets/vendor/libs/flatpickr/flatpickr.js"></script>
<script src="/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
<script src="/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
<script src="/assets/vendor/libs/pickr/pickr.js"></script>
<script src="/assets/js/app-user-view-account.js"></script>

</body>

</html>
