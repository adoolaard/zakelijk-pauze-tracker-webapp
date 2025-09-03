# Zakelijk Pauze Tracker

Een eenvoudige Laravel 11 applicatie om pauzes van medewerkers te plannen. De applicatie gebruikt het Breeze starter kit voor authenticatie en biedt basisfunctionaliteit voor:

- Beheer van medewerkers en shifts.
- Configuratie van pauzetijden op basis van shiftduur.
- Overzichtspagina die aangeeft welke medewerker als volgende pauze heeft en mogelijkheid tot bevestigen of afwijzen.

## Installatie

```
composer install
npm install
php artisan migrate --seed
npm run build
```

Login met het standaard testaccount (`test@example.com` / password) en beheer vervolgens medewerkers, shifts en pauzes via het dashboard.

