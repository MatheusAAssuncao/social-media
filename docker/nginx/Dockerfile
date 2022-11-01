FROM wyveo/nginx-php-fpm:php81

COPY ./ /usr/share/nginx/html
COPY ./nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /usr/share/nginx/html

RUN ln -s public html
RUN apt update; 
# INSTALL NODEJS AND NPM
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - 
RUN apt-get install -y nodejs
RUN apt-get install -y npm
RUN cd /usr/share/nginx/html && npm install -y

# INSTALL COMPOSER
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /usr/share/nginx/html && composer update

RUN php artisan cache:clear 
RUN php artisan key:generate

EXPOSE 80