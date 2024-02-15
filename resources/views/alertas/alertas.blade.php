

  @if ( session('message') )        
    @component( 'alertas.alert' )
        @slot( 'class', 'success' )
        @slot( 'name', 'Éxito' )
        @slot( 'message', session('message') )
    @endcomponent
@endif
@if (session('info'))
    @component( 'alertas.alert' )
        @slot( 'class', 'info' )
        @slot( 'name', 'Información' )
        @slot( 'message', session('info') )
    @endcomponent
@endif
@if (session('warning'))
    @component( 'alertas.alert' )
        @slot( 'class', 'warning' )
        @slot( 'name', 'Advertencia' )
        @slot( 'message', session('warning') )
    @endcomponent
@endif
@if (session('danger'))
    @component( 'alertas.alert' )
        @slot( 'class', 'danger' )
        @slot( 'name', 'Advertencia' )
        @slot( 'message', session('danger') )
    @endcomponent
@endif
