FROM php:8.3-apache

# Cài đặt các extension cần thiết cho MySQL, cURL và Composer
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    && docker-php-ext-install mysqli pdo_mysql curl \
    && apt-get clean

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Kiểm tra phiên bản Composer
RUN composer --version

# Đặt Document Root cho Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
    

# Kích hoạt mod_rewrite của Apache để hỗ trợ URL thân thiện
RUN a2enmod rewrite

# Copy mã nguồn Laravel vào container
# COPY ./tlunews /var/www/html

# Cấp quyền truy cập cho thư mục ứng dụng
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Cài đặt các phụ thuộc Laravel
# RUN cd /var/www/html && composer install --no-dev --optimize-autoloader

# Chạy Apache
CMD ["apache2-foreground"]
