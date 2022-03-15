FROM php:8-apache

RUN DEBIAN_FRONTEND=noninteractive apt-get update \
	&& apt-get install -y --no-install-recommends \
    zip \
    unzip \
    nano \
    && phpModules=" \
    mysqli \
    pdo_pgsql \
    pdo_mysql \
    "

# Install composer and update path
ENV COMPOSER_HOME /composer
ENV PATH /composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

# Install code quality tools
RUN composer global require "squizlabs/php_codesniffer=*"
RUN composer global require "phpunit/phpunit=*"
RUN composer global require laravel/installer

# Enable mod_rewrite
RUN a2enmod rewrite ssl headers proxy proxy_http

# Install and config mhsendmail
RUN apt-get update &&\
    apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git &&\
    rm -rf /var/lib/apt/lists/*
RUN curl -Lsf 'https://storage.googleapis.com/golang/go1.8.3.linux-amd64.tar.gz' | tar -C '/usr/local' -xvzf -
ENV PATH /usr/local/go/bin:$PATH
RUN go get github.com/mailhog/mhsendmail
RUN cp /root/go/bin/mhsendmail /usr/bin/mhsendmail

RUN docker-php-ext-install pdo pdo_mysql


RUN mkdir /root/.nvm
ENV NVM_DIR /root/.nvm
ENV NODE_VERSION v12.22.10


RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.9/install.sh | bash
RUN chmod +x $HOME/.nvm/nvm.sh
RUN . $HOME/.nvm/nvm.sh && nvm install $NODE_VERSION && nvm alias default $NODE_VERSION && nvm use default && npm install -g npm

RUN ln -sf /root/.nvm/versions/node/v$NODE_VERSION/bin/node /usr/bin/nodejs
RUN ln -sf /root/.nvm/versions/node/v$NODE_VERSION/bin/node /usr/bin/node
RUN ln -sf /root/.nvm/versions/node/v$NODE_VERSION/bin/npm /usr/bin/npm

WORKDIR "/var/www"

EXPOSE 80
ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]