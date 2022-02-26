@component('mail::message')
# Récupération de votre mot de passe

Cliquez sur le lien ci-dessous pour récupérer votre mot de passe :

@component('mail::button', ['url' => 'emt.univ-lorraine.fr'])
Récupérer mon mot de passe
@endcomponent

Cordialement,<br>
L'équipe de l'EMT.
@endcomponent
