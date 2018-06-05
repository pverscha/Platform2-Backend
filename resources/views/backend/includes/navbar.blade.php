{{-- Defines the comman header for each view. This includes the navbar of the website. --}}
<header class="mdl-layout__header is-casting-shadow"><div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button"><i class="material-icons"></i></div>
    <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">Backend</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        @if(Auth::check())
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="/"><span class="icon icon-home"></span>Desktop</a>
            </nav>
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="/logout"><span class="icon icon-play_for_work"></span>Logout</a>
            </nav>
        @endif()
    </div>
</header>