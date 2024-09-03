<!DOCTYPE html>
<html lang="en">


@include('frontend.header')

<body>

    @include('frontend.top-header')

    @if ($heroHome)
        @include('frontend.components.hero')
    @endif

    <main id="main">

        @if ($about)
            @include('frontend.components.about')
        @endif

        @if ($fact)
            @include('frontend.components.facts')
        @endif

        @if ($service)
            @include('frontend.components.services')
        @endif

        @if ($actionSection)
            @include('frontend.components.calltoaction')
        @endif

        @if ($portfolios)
            @include('frontend.components.portfolio')
        @endif

        @if ($TeamData)
            @include('frontend.components.team')
        @endif

        @if ($ContactData)
            @include('frontend.components.contact')
        @endif

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('frontend.footer')

</body>

</html>
