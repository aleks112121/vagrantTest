#!/bin/bash

yum install -y php;
yum install -y nc;
cp /vagrant/start.php /home/vagrant/start.php
cp /vagrant/server.php /home/vagrant/server.php
cp /vagrant/client.php /home/vagrant/client.php
cp /vagrant/database /home/vagrant/database
sudo chmod 666 /home/vagrant/database
