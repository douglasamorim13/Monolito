FROM php:8.3-fpm

# Arguments
ARG user=aprosoja
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    cron \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    supervisor \
    tzdata \
    && docker-php-ext-install zip

# Set timezone to São Paulo
RUN ln -snf /usr/share/zoneinfo/America/Cuiaba /etc/localtime && \
    echo "America/Cuiaba" > /etc/timezone && \
    dpkg-reconfigure -f noninteractive tzdata

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis-5.3.7 \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

# Copy Supervisor configuration files
COPY supervisord.conf /etc/supervisor/supervisord.conf

# Copy cron file and apply it
COPY crontab /etc/cron.d/laravel-cron
RUN chmod 0644 /etc/cron.d/laravel-cron
RUN crontab /etc/cron.d/laravel-cron
RUN touch /var/log/cron.log

# Copy the start.sh script
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Set working directory
WORKDIR /var/www

# Ensure the user has access to the necessary directories
RUN chown -R $user:$user /var/www

# Start
CMD ["sh", "/usr/local/bin/start.sh"]
