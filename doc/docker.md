# Docker

## Background:
### [¿Qué es Docker y para qué sirve?](https://www.youtube.com/watch?v=pn0eeYr_8U8)

### [¿Que es Docker Compose?](https://www.youtube.com/watch?v=RvrzSqZxk_M)

## Comandos:
### Docker:

```shel
docker ps
```
Lista los contenedores en ejecucion

```shel
docker exec -it {nombre del contenedor} comando

Ej:
docker exec -it proyecto_www comando bash
```
Ejecuta un comando dentro del contenedor, se puede ejecutar bash o sh para tomar control del contenedor


```shel
docker system prune
```
Elimina todos los contenedores que no estan en uso

```shel
docker rmi $(docker images -a -q)
```
Elimina todas las images

```shel
docker volume prune
```
Elimina todos los volumenes que no esten en uso 

```shel
sudo usermod -aG docker ${USER}
```
Agrega el usuario actual a docker para no necesitar el sudo al usar docker


### Docker Compose:
```shel
docker-compose up
```
Levanta los contenedores del proyecto con log en pantalla


```shel
docker-compose up -d
```
Levanta los contenedores del proyecto sin log en pantalla

```shel
docker-compose up --build
```
Levanta y recostruye las imagenes que provienen de un DockerFile, se puede convinar con -d 


```shel
docker-compose down
```
Detiene los contenedores del proyecto

