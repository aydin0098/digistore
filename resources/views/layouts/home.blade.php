<!DOCTYPE html>
<html lang="fa">

@include('livewire.home.home.layouts.head')

<body>
    <livewire:home.home.layouts.header>

    <div class="nav-categories-overlay"></div>
    <div class="overlay-search-box"></div>

  {{$slot}}

  <livewire:home.home.layouts.footer>

   @include('livewire.home.home.layouts.scripts')
</body>

</html>
