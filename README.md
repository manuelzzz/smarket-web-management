# 🌐 Smarket

A full LAMP web system for small supermarkets

<img src="https://github.com/manuelzzz/smarket-web-management/assets/89389164/60ba2411-15e1-4669-b30b-a8e11c0dc1a4" alt="homepage" width="500"/> <img src="https://github.com/manuelzzz/smarket-web-management/assets/89389164/ce2cb1e4-375e-4400-ab93-65dcc47fdee7" alt="homepage" width="500"/>

> [!IMPORTANT]
> This repo correspond with ASDR (Net Service Administration) IT technician matter
>
> Me and [@thiagofarias7](https://github.com/thiagofarias7) developed this project

## Getting Started
>You need to have installed Apache2, MariaDB and PHP, with mysqli extension, on your machine with the package manager of your distro linux (in this case, we used the Fedora35):
  ```sh
  $ sudo dnf install httpd
  $ sudo yum install -y mariadb mariadb-server
  $ sudo yum install php-cli php-mysqli
  ```
>For MariaDB and Git, you can found how in these docs:
>
>[Maria DB](https://mariadb.org/download/?t=mariadb&p=mariadb&r=11.3.0&os=Linux&cpu=x86_64&pkg=tar_gz&i=systemd&m=insacom)
>[Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
  #### After that, clone this repository
  ```sh
  $ git clone https://github.com/manuelzzz/smarket-web-management.git
  ```
  #### Before you run the project, configure your MariaDB
  > First, run:
  ```sh
  $ mysql -u root -p
  ```
  > After oppened the MariaDB-server run the SQL [Script](https://github.com/manuelzzz/smarket-web-management/blob/main/script_database.sql), it should look like:
  > <img src="https://github.com/manuelzzz/smarket-web-management/assets/89389164/a2a257ca-5b16-4786-9b44-b5105996e299" alt="sqlscript" width="500"/>
 
  #### Then, go to the root of the project and run
  ```sh
  $ php -S localhost:8080 lib/index.php
  ```
  > When running with php-cli, go to http://server-ip:8080
  #### To discover the server ip, you do:
  ```sh
  $ ifconfig
  ```

> [!NOTE]
> You can use the /var/www/html/project-name instead php-cli to run the project direct in apache webserver
> 
> To access the site, go to http://server-ip/project-name

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request
