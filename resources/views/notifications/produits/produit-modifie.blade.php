@component('mail::message')
Nouveau Produit

Un nouveau produit a été ajouté......

@component('mail::button', ['url' => url("produits")])
Voir nos produits
@endcomponent

Mercci,<br>
{{ config('app.name') }}
@endcomponent
