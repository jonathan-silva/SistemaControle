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
    LoadModule unique_id_module modules/mod_unique_id.so
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
sudo ln -sf /node-v8.11.2-linux-x64/bin/node /usr/bin/node
sudo ln -sf /node-v8.11.2-linux-x64/bin/npm /usr/bin/npm

//Depois Verifique as versões
node -v
v8.11.2
npm -v
5.6.0
```
    
