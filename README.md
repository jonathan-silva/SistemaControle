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
<p>COMENTE a linha onde se encontra</p> 
``#LoadModule unique_id_module modules/mod_unique_id.so``

<p>E DESCOMENTE a linha</p> 
``#LoadModule unique_id_module modules/mod_unique_id.so``

<p>Depois disso faça</p> 
``sudo systemctl enable httpd.service && sudo systemctl start httpd.service``


