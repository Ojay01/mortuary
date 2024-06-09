
<!DOCTYPE html>

<html lang="en" class="light-style   layout-menu-fixed     customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-base-url="-1" data-framework="laravel" data-template="blank-menu-theme-default-light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Track Corpse | {{ config('app.name', 'MutaWare') }}</title>
  <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
  <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="H295tBRb3w8VHeHNRosqQEyxbOvkFaqvADMNsWSt">
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-laravel-admin-template/">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/assets/img/logo.png" />


    

  <!-- Include Styles -->
  <!-- $isFront is used to append the front layout styles only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css?id=87122b3a3900320673311cebdeb618da" />
<link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css?id=a2997cb6a1c98cc3c85f4c99cdea95b5" />
<link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css?id=121bcc3078c6c2f608037fb9ca8bce8d" />
<!-- Core CSS -->
<link rel="stylesheet" href="/assets/vendor/css/rtl/core.css?id=55b2a9dfaa009c41df62ca8d16e913a8" class="template-customizer-core-css" />
<link rel="stylesheet" href="/assets/vendor/css/rtl/theme-default.css?id=9182924a7b965439eca5e189ba43eba1" class="template-customizer-theme-css" />
<link rel="stylesheet" href="/assets/css/demo.css?id=69dfc5e48fce5a4ff55ff7b593cdf93d" />
<!-- Vendors CSS -->
<link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css?id=73d641bb8db2475ecafc6c68461ed01b" />
<link rel="stylesheet" href="/assets/vendor/libs/typeahead-js/typeahead.css?id=de339ead5e9c9e36f12e46cbef7aaffd" />

<!-- Vendor Styles -->
<!-- Vendor -->
<link rel="stylesheet" href="/assets/vendor/libs/@form-validation/umd/styles/index.min.css" />


<!-- Page Styles -->
<!-- Page -->
<link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css">

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
                      'core.css': '/assets/vendor/css/rtl/core.css?id=55b2a9dfaa009c41df62ca8d16e913a8',
            'core-dark.css': '/assets/vendor/css/rtl/core-dark.css?id=d98ae2a03b5b1b05651411ee58ef81a6',
          
          // Themes
                      'theme-default.css': '/assets/vendor/css/rtl/theme-default.css?id=9182924a7b965439eca5e189ba43eba1',
            'theme-default-dark.css':
            '/assets/vendor/css/rtl/theme-default-dark.css?id=ae30991ef3f62e7c03ca6f8930843e80',
                      'theme-bordered.css': '/assets/vendor/css/rtl/theme-bordered.css?id=a4f95a927b1e2bcdfd57a3bbfb2bd3d9',
            'theme-bordered-dark.css':
            '/assets/vendor/css/rtl/theme-bordered-dark.css?id=2a668deb480284f975db82d0a7277156',
                      'theme-semi-dark.css': '/assets/vendor/css/rtl/theme-semi-dark.css?id=9c02fb39c47f91b2d198f343fa8b4df7',
            'theme-semi-dark-dark.css':
            '/assets/vendor/css/rtl/theme-semi-dark-dark.css?id=c4b1950a14ffd431f752917b97a0ee51',
                  }
        return resolvedPaths[path] || path;
      },
      'controls': ["rtl","style","headerType","contentLayout","layoutCollapsed","layoutNavbarOptions","themes"],
    });
  </script>
</head>

<body>
  
      <!-- Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
    

  <!-- Layout Content -->
  
<!-- Content -->
<div class="authentication-wrapper authentication-basic px-4">
  <div class="authentication-inner">
    <!--  Two Steps Verification -->
    <div class="card">
      <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
          <a href="/" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">
           <img src="/assets/img/logo.png" class="img-fluid" alt="Logo" width="50"> 
            
</span>
            <span class="app-brand-text demo text-body fw-bold fs-1">{{ config('app.name', 'MotaWare') }}</span>
          </a>
        </div>
        <h4 class="mb-2">Track Your Corpse 💬</h4>
        <p class="text-start mb-4">
          Enter the QR code give to you to track and get your corpse status any time
          <span class="fw-medium d-block mt-2">********</span>
        </p>
        <p class="mb-0 fw-medium">Type your 8 characters QR code</p>
      <form id="twoStepsForm" action="{{ route('myCorpseProfile') }}" method="GET">
    <div class="mb-3">
        <input type="text" required class="form-control" id="qr_code" name="qr_code" placeholder="Enter your QR code" autofocus value="{{ old('qr_code') }}">
        <small>Case-Sensitive <strong>AbCd</strong> not same as <strong><i><s>aBcD</s></i></strong></small>
    </div>
    <button type="submit" class="btn btn-primary d-grid w-100 mb-3">Track Corpse</button>
    <div class="text-center">Didn't get the code?
        <a href="{{ route('scanQrCode') }}">Scan QR Instead</a>
    </div>
</form>

      </div>
    </div>
    <!-- / Two Steps Verification -->
  </div>
</div>
<!--/ Content -->

  <!--/ Layout Content -->

  
  <div class="buy-now">
    <a href="{{route('scanQrCode')}} " class="btn btn-danger btn-buy-now">Scan Code</a>
  </div>

  <!-- Include Scripts -->
  <!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Vendor JS-->
<script src="/assets/vendor/libs/jquery/jquery.js?id=0f7eb1f3a93e3e19e8505fd8c175925a"></script>
<script src="/assets/vendor/libs/popper/popper.js?id=baf82d96b7771efbcc05c3b77135d24c"></script>
<script src="/assets/vendor/js/bootstrap.js?id=4648227467e3fd3f4cf976cfb0e43aea"></script>
<script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=44b8e955848dc0c56597c09f6aebf89a"></script>
<script src="/assets/vendor/libs/hammer/hammer.js?id=0a520e103384b609e3c9eb3b732d1be8"></script>
<script src="/assets/vendor/libs/typeahead-js/typeahead.js?id=f6bda588c16867a6cc4158cb4ed37ec6"></script>
<script src="/assets/vendor/js/menu.js?id=c6ce30ded4234d0c4ca0fb5f2a2990d8"></script>
<script src="/assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
<script src="/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="/assets/js/main.js?id=6bea3f2e092d5fe7327c226f3242f31b"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="/assets/js/pages-auth.js"></script>
<script src="/assets/js/pages-auth-two-steps.js"></script>
<!-- END: Page JS-->
</body>

</html>
