FROM amazonlinux:2
# FROM amazonlinux:2018.03

RUN yum -y update && \
	yum -y install vim git mysql

# EPELを追加(Remi Repository追加に必要)
RUN amazon-linux-extras install epel

# Remi Repositoryを追加
RUN yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm

#PHP8.1のインストール
RUN	yum clean metadata \
	&& yum -y install  \
	php81 \
	php81-php \
	php81-php-mbstring \
	php81-php-pdo \
	php81-php-xml \
	php81-php-fpm \
	php81-php-mysqlnd \
	php81-php-gd

#apacheのインストール
RUN yum -y install httpd

COPY httpd.conf /etc/httpd/conf/httpd.conf
COPY php.ini /etc/php.ini

RUN chkconfig httpd on

# Nodeのインストール
RUN curl -sL https://rpm.nodesource.com/setup_6.x | bash - && \
	yum install -y nodejs

EXPOSE 80
EXPOSE 443
CMD ["/usr/sbin/httpd", "-DFOREGROUND"]
