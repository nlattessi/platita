@component('mail::message')
# No te olvides hoy de pagar

@component('mail::panel')
**{{ $gasto->nombre }}**

por un monto de **${{ $gasto->monto }}**

que vence el **{{ $gasto->vencimiento->format('d/m/Y') }}**
@endcomponent

Exitos!<br>
Platita
@endcomponent
