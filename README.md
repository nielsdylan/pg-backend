## ejecutar primero la creacionde los esquemas en la base de datos
    CREATE SCHEMA configuraciones;
    CREATE SCHEMA hotel;

    
# ahora migra el esquema de cofiguraciones
    php artisan migrate:refresh --path=database/migrations/configuraciones
# Procede a ejecutar el seeder de configuraciones
    php artisan db:seed --class='Database\Seeders\configuraciones\RunSeeder'


# migrar en caso quierar el sistema de hotel
    php artisan migrate:refresh --path=database/migrations/hotel
# Procede a ejecutar el seeder de hotel
    php artisan db:seed --class='Database\Seeders\hotel\IndexSeeder'
