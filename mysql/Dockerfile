FROM mysql:8.0

# Copy over our SQL queries
COPY ./mysql/init.sql /init.sql

# Startup MySQL and run the queries
CMD ["mysqld", "--init-file=/init.sql"]