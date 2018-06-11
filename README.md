# SistemaControle

<h2> Introdução sobre o Projeto </h2>
Um Sistema para Controle de Custos Operacionais como por exemplo:
Monitoramento de impressões de cada setor, o relatório de uso de ramais.

<h2> Preparando Ambiente de Desenvolvimento </h2>

[1] -> Observação ambiente foi prepado em Ambiente GNU/Linux

**1. Instalando PHP-5.6** <br>
1.1 Ubuntu / Mint / Elementary e Outros
```    sudo apt-get install python-software-properties
       sudo add-apt-repository ppa:ondrej/php
       sudo apt-get update
       sudo apt-get install -y php5.6 
```       
1.2 Arch Linux
```
    pacman -S php
```
1.3 Configurando OPCACHE PHP <br>
[2] -> Acesse o arquivo /etc/php/php.ini, e descomente as linhas correspondentes 
```
zend_extension=opcache.so
opcache.enable=1
opcache.validate_timestamps=0
opcache.max_accelerated_files=3000
opcache.memory_consumption=64
opcache.interned_strings_buffer=12
opcache.fast_shutdown=1
opcache.enable_file_override=1
opcache.error_log=/var/log/php-opcache-error.log
```
**OBS opcache.validade_timestramps quando for para produção, passe o valor=1, pois o value 0 limpa cache** <br>

1.3 Instalando MEMCACHED <p>
```
    //Ubuntu/ Mint/ Elementary outros
    apt-get install memcached libmemcached-tools
    //Arch Linux
    pacman -S memcached libmemcached
```
Configurando MEMCACHED 
Acesse o arquivo ``` /etc/memcached.config ```
```
    systemctl enable memcached.service
    systemctl start memcached.service
    //Para testar se memcached foi instalado corretamente
    sudo memcached -d -m 512 -l 127.0.0.1 -p 11211 -u nobody
    ps -eaf | grep memcached
```
1.4 Instalando e Configurando Xdebug PHP
```
   pacman -S xdebug
   //Edite, e descomente todas as linhas do arquivo /etc/php/conf.d/xdebug.ini    
   sudo vim /etc/php/conf.d/xdebug.ini    
```       
**2. Instalando Apache** <br>
2.1 Ubuntu / Mint / Elementary e Outros
``` 
    sudo apt-get install apache2
```
2.2 Arch Linux
```
    pacman -S apache
```
COMENTE a linha onde se encontra
```
    #LoadModule unique_id_module modules/mod_unique_id.so
```    

E DESCOMENTE a linha
```
    LoadModule mpm_prefork_module modules/mod_mpm_prefork.so
```
E ADICIONE ESSAS
```
    LoadModule php7_module modules/libphp7.so
    AddHandler php7-script php
    Include conf/extra/php7_module.conf
```
Depois disso faça
```
    sudo systemctl enable httpd.service && sudo systemctl start httpd.service
```    
**3. Instalando MySQL** <br>
3.1 Ubuntu / Mint / Elementary e Outros
```
   sudo apt-get install mysql-server
   mysql_secure_installation 
```
3.2 Arch Linux
```
    pacman -S mysql
    //Isso starta o servico do MariaDB
    mysql_install_db --user=mysql --basedir=/usr --datadir=/var/lib/mysql
```
**4. Instalando NodeJS** <br>
3.1 Ambos o sistema
```
cd /usr/local/
sudo wget https://nodejs.org/dist/v8.11.2/node-v8.11.2-linux-x64.tar.xz 
sudo tar -Jxf node-v8.11.2-linux-x64.tar.xz
sudo ln -sf node-v8.11.2-linux-x64/bin/node /usr/bin/node
sudo ln -sf node-v8.11.2-linux-x64/bin/npm /usr/bin/npm

//Depois Verifique as versões
node -v
v8.11.2
npm -v
5.6.0
```
**5. Instalando Composer** <br>
5.1 Ambos a Distruibuição Linux
 ```
    //Ubuntu
    sudo apt-get install composer
    //Arch Linux
    pacman -S composer    
 ```
**6. Criando projeto Slim Framewwork 3.10** <br>
 ```
    composer create-project slim/slim-skeleton nomedoprojeto
    composer init
    composer install
    
    //Depois starta o servidor
    php -S localhost -t public/ public/index.html
 ```
**7. Instalando Docker** <br>
7.1 Ubuntu / Mint / Elementary e Outros
```
    sudo apt install docker.io
    sudo systemctl start docker
    sudo systemctl enable docker
    docker -v
```
7.2 Arch Linux
```
    pacman -S docker
    systemctl enable docker.service
    systemctl start docker.service
    systemctl status docker.service
    docker -v
```
**8. Instalando Jenkins** <br>
8.1 Ubuntu / Mint / Elementary e Outros
```
    wget -q -O - http://pkg.jenkins.io/debian/jenkins.io.key | sudo apt-key add -
    sudo sh -c 'echo deb http://pkg.jenkins.io/debian binary/ > /etc/apt/sources.list.d/jenkins.list'
    sudo apt-get update
    sudo apt-get install jenkins
```
8.2 Arch Linux
```
    sudo pacman -S jenkins
    sudo systemctl start jenkins
    sudo systemctl enable jenkins
    sudo systemctl status jenkins
```