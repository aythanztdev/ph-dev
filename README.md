# Instalación de Infraestructura

## Docker

Copiar `dist.env` a `.env` y modificar los valores necesarios (localización del directorio mediante la variable APP_DIR)
```
cp dist.env .env
```
Realizar build
```
docker-compose build --no-cache
```

Levantar los contenedores
```
docker-compose up -d
```

Instalar vendor y configuración
```
docker exec -it planeta_huerto_php bash
composer install
exit
```

Ejecutar tests
```
docker exec -it planeta_huerto_php bash
./bin/phpunit
exit
```
