<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('layouts.partials.styles')
    <title>Inventory | @yield('title')</title>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')


        <div class="content-wrapper">
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">@yield('page-title')</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <!-- Main content -->
          <section class="content">
            @yield('content')
          </section>
        </div>

        @include('layouts.partials.footer')
      </div>


      @include('layouts.partials.scripts')
      @stack('custom-script')

  </body>
</html>
