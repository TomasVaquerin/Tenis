<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Inicio del proyecto

Para iniciar el proyecto, ejecutamos el siguiente comando:

```
./vendor/bin/sail up
```

## Configuración de la autenticación

Para configurar la autenticación, seguimos los siguientes pasos:

1. Añadimos el campo `'role'` al modelo `User`:

    ```
    'role'
    ```

2. Añadimos el campo `'role'` a la migración de `User`:

    ```
    $table->enum('role', ['user', 'admin'])->default('user');
    ```

3. Ejecutamos la migración a la base de datos:

    ```
    ./vendor/bin/sail artisan migrate
    ```

4. Creamos el seeder de `User`:

    ```php
    <?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class UserSeeder extends Seeder
    {
        public function run(): void
        {
            DB::table('users')->insert([
                [
                    'name' => 'admin',
                    'email' => 'admin@admin.es',
                    'password' => bcrypt('Admin'),
                    'role' => 'admin',
                ],
                [
                    'name' => 'user',
                    'email' => 'user@user.es',
                    'password' => bcrypt('User'),
                    'role' => 'user',
                ],
            ]);
        }
    }
    ```

5. Insertamos los datos en la base de datos:

    ```
    ./vendor/bin/sail  artisan db:seed --class=UserSeeder
    ```

## Configuración de la plantilla

Para configurar una plantilla agradable, seguimos los siguientes pasos:

1. Instalamos los paquetes necesarios:

    ```
    ./vendor/bin/sail  require laravel/breeze --dev
    ./vendor/bin/sail  artisan breeze:install
    ./vendor/bin/sail composer require laravel/ui
    ./vendor/bin/sail artisan ui bootstrap
    ```

2. Instalamos las dependencias de npm y compilamos los assets:

    ```
    ./vendor/bin/sail npm install
    ./vendor/bin/sail npm run dev
    ```

Con estos pasos, tendremos una plantilla agradable para empezar a trabajar en nuestro proyecto.

### Una vez configurado el Auth podemos empezar a insertar las Entidades a nuestro proyecto (Tenistas, Torneos)

# Tenistas

```
./vendor/bin/sail artisan make:model Tenista -m
```

```
./vendor/bin/sail artisan migrate
```

```
./vendor/bin/sail artisan make:seeder TenistaSeeder
```

```
./vendor/bin/sail artisan db:seed --class=TenistaSeeder
```

```
./vendor/bin/sail artisan make:controller TenistaController --resource
```

```
./vendor/bin/sail artisan storage:link
```


