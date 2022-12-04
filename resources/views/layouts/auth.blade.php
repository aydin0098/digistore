<!DOCTYPE html>
<html lang="fa">

@include('livewire.home.home.layouts.head')

<body>


    <div class="nav-categories-overlay"></div>
    <div class="overlay-search-box"></div>

  {{$slot}}



   @include('livewire.home.home.layouts.scripts')
</body>

</html>
