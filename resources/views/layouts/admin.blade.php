<!doctype html>
<html lang="en">

@include('livewire.admin.layouts.head')

<body>
    <!-- Preloader -->
  <div id="preloader">
        <div id="ctn-preloader" class="ont-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="دیجی استور" class="letters-loading" style="color:#ff2d20;">
                        دیجی استور
                     </span>
                </div>
            </div>

            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader -->

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="ecaps-page-wrapper">
        <!-- Sidemenu Area -->
     @include('livewire.admin.layouts.sidebar')

        <!-- Page Content -->
        <div class="ecaps-page-content">
            <!-- Top Header Area -->
         <livewire:admin.layouts.header>

            <!-- Main Content Area -->
            <div class="main-content">

            @include('livewire.admin.layouts.breadcrumb')

                <div class="dashboard-area">
                    <div class="container-fluid">
                        <div class="row">
                           {{$slot}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    @include('livewire.admin.layouts.scripts')

</body>
</html>
