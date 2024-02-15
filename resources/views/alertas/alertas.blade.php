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
<<<<<<< HEAD
=======
@if ( $errors->any() )
@foreach ( $errors->all() as $error )
@component( 'alertas.alert' )
@slot( 'class', 'danger' )
@slot( 'name', 'Atención' )
@slot( 'message', $error )
@endcomponent
@endforeach
@endif
>>>>>>> 1db8b5d0c0ee68dd69cc3953ae3e17df68007473
