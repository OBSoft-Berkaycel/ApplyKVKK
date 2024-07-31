<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>KVKK Yönetim Sistemi | AresBPO Yazılım</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
    <style>
        #signature-pad {
            border: 1px solid #dedede;
            width: 100%;
            height: 200px;
        }
        
        .top {
            display: flex;
            justify-content: space-between;
        }
        
        table.dataTable thead th, table.dataTable thead td {
            padding: 10px 18px;
            border-bottom: 1px solid #dee2e6;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
            @include('layouts.menubar')
            <div class="layout-page">
              @include('layouts.nav')
              <div class="content-wrapper">
                @yield('content')

                @include('layouts.footer')

                <div class="content-backdrop fade"></div>
                </div>
              </div>
            </div>
        <div class="layout-overlay layout-menu-toggle"></div>
      </div>
    </div>
    @include('assets.scripts')
    @yield('scripts')

  </body>
</html>