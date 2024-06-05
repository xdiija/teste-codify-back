### Requisitos

- Docker
- Docker-compose

### Passo a passo

- Após clonar o Repositório, abra a pasta do projeto no Terminal

Suba os containers do projeto
```sh
docker-compose up -d
```

Acesse o container app
```sh
docker-compose exec app bash
```

Instale as dependências do projeto
```sh
composer install
```

Execute as migrations
```sh
php artisan migrate
```

Execute o seeder do usuario admin
```sh
php artisan db:seed
```
