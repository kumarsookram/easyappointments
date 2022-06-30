# AgendaFacil

Imatge Docker per l'ús de [Easy!Appointments](https://easyappointments.org/), un sistema de gestió de clients i reserves online. A més, s'inclou una pàgina web funcional per a 
qualsevol tipus d'establiment.

## Característiques

* Pàgina web senzilla pel teu negoci sense gaire configuració.
* Gestió de cites i clients.
* Reserva de cites segons proveïdor i servei.
* Sistema de notificacions per correu.
* Diferents horaris per cada proveïdor.

## Instal·lació

```sh
docker-compose up
```

## Ús

| Variables d'entorn         | Valor per defecte       |
| -------------------------- | ----------------------- |
| BASE_URL                   | "http://localhost:8888" |
| LANGUAGE                   | "catalan"               |
| CSRF_PROTECTION            | TRUE                    |
| EMAIL_IGNORE_SSL           | FALSE                   |
| DEBUG                      | FALSE                   |
| DB_HOST                    | "db"                    |
| DB_NAME                    | "easyappointments"      |
| DB_USERNAME                | "root"                  |
| DB_PASSWORD                | "hellodocker"           |
| GOOGLE_SYNC_FEATURE        | FALSE                   |
| GOOGLE_PRODUCT_NAME        |                         |
| GOOGLE_CLIENT_ID           |                         |
| GOOGLE_CLIENT_SECRET       |                         |
| GOOGLE_API_KEY             |                         |
| TZ                         | "Europe/Madrid"         |
| EMAIL_HOST                 |                         |
| EMAIL_USER                 |                         |
| EMAIL_PASSWORD             |                         |
| EMAIL_CRYPTO               |                         |
| EMAIL_PORT                 | 587                     |
| EASYAPPOINTMENTS_VERSION   | "1.4.3"                 |


## Dependències

* [Docker](https://www.docker.com/)

## Suport

Envieu un correu a [info@elkaribu.com](mailto:info@elkaribu.com) o publiqueu un [issue](https://github.com/elkaribu/easyappointments/issues/new).

## Llicència

Codi sota la llicència [GPL v3.0](https://www.gnu.org/licenses/gpl-3.0.en.html).


## Crèdits

* [Alex Tselegidis](https://alextselegidis.com/) - Autor de [Easy!Appointments](https://easyappointments.org/).
* [Albert Sallés](https://github.com/albertsalles4) - Autor dels canvis i adaptacions.
