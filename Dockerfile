# rodar a aplicação com Docker...

FROM php:latest

WORKDIR /var/www/html

COPY . .

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80"]

# Build the docker image
# docker build -t my-php-anexo2 .

# Run the Docker Containter
# docker run -d -p 8080:80 my-php-anexo2

# Access the application
# http://localhost:8080/

# para parar, primeiro listar os containers com
# docker ps

# e depois rodar stop com o ID do container
# docker stop ID