FROM php:8.1-cli

# Move our PHP files into the container
COPY ./src/ /usr/src/app/

# Make things easier if you shell in
WORKDIR /usr/src/app

# Our PHP will be running on port 8000
EXPOSE 80

# Install the PDO MySQL extension so we can database
RUN docker-php-ext-install pdo_mysql

# Set up a web server
CMD ["php", "-S", "0.0.0.0:80"]