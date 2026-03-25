# Slovakia Tour – semestrálny projekt (Skriptovacie jazyky)

Dynamická webová stránka cestovnej agentúry vytvorená v čistom PHP 8.2 (OOP, PDO, MariaDB).
Bez frameworku, bez CMS, bez externých knižníc.

## Funkcionalita

### Verejná časť
- Domov – karusel z najnovších článkov, naše služby, referencie zákazníkov
- O nás – misia, štatistiky, hodnoty, FAQ s accordionom
- Blog – zoznam článkov + detail + komentáre + súvisiace články
- Galéria – fotografie s popismi
- Kontakt – formulár (validácia + ukladanie do DB) + info karty + mapa OSM

### Administrácia (`/admin`)
- Prihlásenie cez používateľské meno + heslo
- CRUD nad článkami (vytvorenie, úprava, zmazanie, publikovanie)
- CSRF token v každom POST formulári

## Technológie

- PHP 8.2
- MariaDB 10.5+ (utf8mb4, InnoDB, cudzie kľúče, indexy)
- PDO – prepared statements proti SQL injection
- Apache + mod_rewrite
- Bootstrap 5 (iba šablóna – hodnotí sa PHP)

## Architektúra

- Vlastný PSR-4 autoloader (bez Composeru)
- MVC pattern: Router → Controller → Model → View
- Singleton Database (PDO)
- Abstraktný `Model` s metódami `all/find/delete`
- Šablóny renderované cez `Controller::view()` do `layout.php`

## Štruktúra

```
slovakia-tour/
├── app/                   ← backend logika
│   ├── core/              ← Database, Router, Controller, Auth
│   ├── controllers/
│   ├── models/
│   └── helpers.php
├── config/
│   └── config.php
├── public/                ← document root
│   ├── index.php          ← front controller (router)
│   ├── .htaccess          ← URL rewriting
│   ├── assets/            ← CSS, JS, obrázky
│   └── templates/         ← HTML šablóny
│       ├── partials/      ← head, nav, footer
│       ├── admin/
│       ├── blog/
│       └── errors/
├── sql/
│   ├── schema.sql         ← databázová schéma
│   └── seed.sql           ← vzorové dáta
├── autoload.php
└── README.md
```

## Databázové entity

| Tabuľka       | Účel                                       |
|---------------|--------------------------------------------|
| users         | Administrátori                             |
| articles      | Články blogu (hlavná CRUD entita)          |
| comments      | Komentáre k článkom (FK na articles)       |
| gallery       | Fotografie                                  |
| contacts      | Správy z kontaktného formulára             |
| services      | Naše služby (zobrazené na Domov / O nás)   |
| testimonials  | Referencie zákazníkov                      |
| faq           | Často kladené otázky                       |

## Autor

Hlib Hulevatyi – semestrálny projekt 2026
