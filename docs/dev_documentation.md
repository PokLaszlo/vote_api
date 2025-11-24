# Előkészületek:
-angular projekt létrehozása: composer create-project laravel/laravel projektnév
-git inicializálása, majd első commitolás után push
-adatbázis terv
-ha nem lett volna meg, akkor kell egy 
php artisan install:api parancsot futtatni

# Verzió 0.001
## ha le lenne töltve a project
- composer install
- .env fájl beszerzése


## Kontrollerek létrehozása
- php artisan make:controller api/tablanevController
- Táblanevek:
    <li>Tarsashaz</li>
    <li>Alberlet</li>
    <li>Kozgyules</li>
    <li>Tulajdonos</li>
    <li>Nepirendi_pont</li>
    <li>Szavazat</li>
    <li>Resztvevo</li>
    <li>Felszolalas</li>

## Migrációk hozzáadása
- parancs: php artisan make:migration create_tablanev_table
- a táblák ugyanazok, mint fent
- a táblák mezői a /docs táblában található "adatbazis_terv_elso.png" fájl alapján lesznek hozzáadva
- pl. 
```bash
    public function up(): void
    {
        Schema::create('tarsashaz', function (Blueprint $table) {
            $table->id();
            $table->string('nev',50);
            $table->string('alapito_dokumentum');
            $table->string('szavazasi_szabaly');
            // $table->timestamps();
        });
    }
```
