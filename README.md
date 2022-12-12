# About the project
Blog-poo-php is a project to discover the world of container with Docker, and some reminder of POO. It is mainly a project to learn how to use the different aspect of Docker such as images and containers. For the purpose i have made a web app php with mysql and phpmyadmin
# Getting Started
## Prerequisites
You must have Docker and docker-composer installed if you want to run the application locally.
```bash
Docker version 20.10.21
docker-compose version 1.29.2
```

## Installation
1. Clone the project:
```bash
git clone https://github.com/GauthierLory/blog-poo-php
```

2. Configure environment:

The configurations files is in the env folder. Fill with the value you wanted.
If you want to change the port for running the application (8089) or phpmyadmin (8111) edit directly the **docker-composer**.

3. Build and run container
```bash
cd ./blog-poo-php
docker-compose up
```
Now you can access it through the web at typically: http://localhost:3000/