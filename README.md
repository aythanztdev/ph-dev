# Instalación de Infraestructura

## Docker

Copiar `dist.env` a `.env` y modificar los valores necesarios.
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

Agregar entrada al /etc/hosts
```
127.0.0.1 planeta-huerto.local
```


Configurar base de datos
```
docker exec -it planeta_huerto_db mysql -e "CREATE DATABASE planeta_huerto"
docker exec -it planeta_huerto_db mysql -e "GRANT ALL ON planeta_huerto.* TO 'planeta_huerto'@'%' IDENTIFIED BY 'planeta_huerto'"
```

Instalar vendor y configuración
```
docker exec -it planeta_huerto_php bash
cd /app
composer install
exit
```

Probar: http://planeta-huerto.local
