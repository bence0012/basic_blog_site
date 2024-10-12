FROM ubuntu:latest
RUN apt-get update && apt-get install -y openssh-server sudo git apache2 nodejs npm nano zip sqlite3 
RUN apt-get update && apt-get install -y php libapache2-mod-php php-mbstring php-xmlrpc php-soap php-gd php-xml php-cli php-zip php-bcmath php-tokenizer php-json php-pear php-sqlite3

RUN useradd -rm -d /home/test -s /bin/bash -g root -G sudo -u 1111 test 
RUN echo 'test:admin' | chpasswd

RUN service ssh start
EXPOSE 22


CMD ["/usr/sbin/sshd", "-D"]

WORKDIR /usr/app
RUN npm install -D tailwindcss
RUN npx tailwindcss init
WORKDIR /..

RUN wget https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer -O - -q | php -- --quiet
RUN sudo mv composer.phar /usr/local/bin/composer
RUN sudo chmod +x /usr/local/bin/composer