# Lucrare de laborator nr. 2. Cereri HTTP și șablonizare în Laravel

### Instrucțiunile utilizate pentru rularea proiectului
1. Crearea unui nou proiect Laravel 
   ```bash
   composer create-project laravel/laravel:^10 todo-app
   ```
2. Navigarea în directorul proiectului:
   ```bash
   cd todo-app
   ```
3. Pornirea serverul Laravel:
   ```bash
   php artisan serve
   ```

4. Compilarea fișierelor frontend
    ```bash
   npm run dev
   ```

### Descrierea lucrării de laborator
În cadrul acestei lucrări de laborator, a fost necesar să se creeze o mini-aplicație web „To-Do App pentru echipe” cu scopul de a pune în practică cunoștințele dobândite în cadrul temelor "Principiile de bază ale lucrului cu cererile HTTP în Laravel" și "Șablonizarea folosind Blade". De asemenea, s-au respectat principiile MVC (Model-View-Controller).


### Documentația proiectului
#### 1. Descrierea aplicației
Aplicația este construită folosind Laravel și utilizează Tailwind CSS pentru a stiliza paginile.
Aplicația este destinată unei echipe care dorește să își gestioneze sarcinile, să le atribuie membrilor și să monitorizeze starea și prioritatea sarcinilor (similar cu Github Issues). 
Aplicația are următoarele funcționlități:
- Vizualizarea listei de sarcini
- Adăugarea unei sarcini noi
- Navigarea folosind un meniu
- Vizualizarea detaliilor despre o anumită sarcină

#### 2. Descrierea funcționalităților
- __Vizualizarea listei de sarcini__: Membrii echipei pot vizualiza lista de sarcini, făcând click pe butonul "Vezi lista de sarcini" sau pe link-ul din meniu "Lista Sarcini din meniu".
- __Adăugarea unei sarcini noi__: Membrii echipei pot accesa pagina pentru a crea o sarcină nouă.
- __Editare și ștergere recenză__: Membrii echipei pot modifica sau elimina recenziile proprii.
- __Navigarea folosind un meniu__: Membrii echipei pot folosi meniul pentru a naviga pe paginile dorite.
- __Vizualizarea detaliilor despre o anumită sarcină__: Membrii echipei pot vizualiza detaliile unei sarcini accesând-o după un id.

#### 3. Descrierea interfeței
Interfața utilizatorului este simplă și intuitivă. Pagina principală constă dintr-o prezentarea scurtă a aplicației și două butoane ce îi permit utilizatorului să vadă și să adauge sarcini. Aceste pagini pot fi accesate și din meniul de navigare. De asemenea, pe pagina principală pot fi vizualizate detaliile unei sarcini.

#### 4. Structura directoarelor și fișierelor
- __HTTP/Providers/AppServiceProvider.php__: Declararea View Composer-ului
- __Controllers__: Controlerele folosite
- __resources/css__: Fișierul principal de stiluri "app.css" care importă Tailwind CSS.
- __resources/views/components__: Componentele anonime folosite
- __resources/views/layout__: Fișierul șablon ce conține structura paginii care va fi folosită într-un mod dinamic
- __resources/views/tasks__: Pagina pentru afișarea listei de sarcini și pentru afișarea unei anumite sarcini
- __resources/views__: Pagina "Home" și "About"
- __routes__: Rutele aplicației.
- __tailwind.config.js__: Fișierul de configurare pentru Tailwind.

### Exemple de utilizare a proiectului

__Exemplul 1: Pagina de start__
![Pagina de start](screenshots/Screenshot%202024-10-19%20212414.png)
Aceasta este interfața pentru pagina Home. Utilizatorul poate să vadă o prezentarea scurtă a aplicației și două butoane ce îi permit să vizualizeze și să adauge sarcini. Aceste pagini pot fi accesate și din meniul de navigare, după cum se observă. De asemenea, pot fi vizualizate detaliile unei sarcini. 

__Exemplul 2: Pagina Despre noi__
![Pagina Despre noi](screenshots/Screenshot%202024-10-19%20212423.png)
Aceasta este interfața pentru pagina Despre noi. Ea conține o scurtă descriere a aplicației.

__Exemplul 3: Pagina Lista Sarcini__
![Pagina cu lista de sarcini](screenshots/Screenshot%202024-10-19%20212435.png)
Aceasta este interfața pentru pagina Lista Sarcini. Ea conține lista tuturor sarcinilor.

__Exemplul 4: Pagina tasks/id__
![Afișarea unei anumite sarcini](screenshots/Screenshot%202024-10-19%20212445.png)
Aceasta este interfața pentru pagina de afișare a unei sarcini anumite. Utilizatorul poate vedea detaliile sarcinii cu un anumit id și informați detaliate despre altă sarcină care poate fi vizualizată și pe pagina Home. 
_Numărul sarcinii apare conform id-ului introdus de utilizator._
_Codul sursă_
**Fișier:** `resources/views/tasks/show.blade.php`
```html
<h1 class="text-center text-cyan-600 text-4xl">Sarcina {{ $task['id'] }}</h1>
```
__Exemplul 5: Pagina Adaugă Sarcină__
![Pagina de creare a unei sarcini](screenshots/Screenshot%202024-10-19%20214612.png)
Această pagină este destinată adăugării undei noi sarcini.

### Răspunsuri la întrebările de control
_Ce s-ar întâmpla dacă cheia aplicației ar ajunge pe mâna unui răufăcător?_
Dacă cheia aplicației Laravel ar ajunge pe mâna unui răufăcător, acesta ar putea:
- Decripta date sensibile
- Falsifica sesiuni
- Exploata aplicația

_Ce este un controller de resurse în Laravel și ce rute creează?_
Un controller de resurse în Laravel generează automat toate operațiunile CRUD. Laravel creează implicit rutele necesare pentru aceste operațiuni.

_Explicați diferența între crearea manuală a rutelor și utilizarea unui controller de resurse._
Crearea manuală a rutelor implică definirea fiecărei rute și metode individual. Controllerul de resurse automatizează această sarcină, generând toate rutele necesare pentru operațiunile CRUD cu o singură comandă. De asemenea, în cazul creării manuale a rutelor, sunt utilizate aceleași metode pentru fiecare controller, ceea ce face codul voluminos și dificil de întreținut. 

_Ce avantaje oferă utilizarea componentelor anonime Blade?_
Utilizarea componentelor anonime Blade oferă următoarele avantaje:
-Reutilizarea codului într-un mod simplu
-Simplifică structura de template
-Nu necesită crearea explicită a clasei componente

_Ce metode de cereri HTTP sunt folosite pentru a executa operațiunile CRUD?_
Pentru a executa operațiunile CRUD sunt necesare următoarele operațiuni:
Create: POST
Read: GET
Update: PUT/PATCH
Delete: DELETE


### Lista surselor utilizate
How to create view composer in Laravel?
https://bagisto.com/en/how-to-create-view-composer-in-laravel/

Suportul de curs de pe git
https://github.com/MSU-Courses/frameworks-for-web-development/tree/main/ro

Installation - Tailwind CSS
https://tailwindcss.com/docs/installation

