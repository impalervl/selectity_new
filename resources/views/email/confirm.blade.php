@component('mail::message')
<h2>Спасибо за регистрацию, для подтверждения нажмите кнопку "Подтвердить регистрацию"</h2>.

@component('mail::button', ['url' => $url])
Подтвердить регистрацию
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent

