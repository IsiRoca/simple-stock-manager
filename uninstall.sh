#!/bin/bash

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
ORANGE='\033[0;33m'
NC='\033[0m'

echo -e "${RED}Action: Clean all Laravel storage info${NC}" &&
docker-compose run --rm --no-deps ssm-server php artisan config:clear &&
docker-compose run --rm --no-deps ssm-server php artisan config:cache &&
docker-compose run --rm --no-deps ssm-server php artisan cache:clear &&
docker-compose run --rm --no-deps ssm-server php artisan view:clear &&
docker-compose run --rm --no-deps ssm-server php artisan route:clear &&

echo -e "${RED}Action: Remove Database folders${NC}" &&
sudo rm -R storage/tmp/ &&

echo -e "${RED}Action: Remove .env File${NC}" &&
sudo rm .env &&

echo -e "${RED}Action: Remove vendors Folder${NC}" &&
sudo rm -r vendor &&

echo -e "${RED}Action: Remove node_modules Folder${NC}" &&
sudo rm -r node_modules &&

echo -e "${GREEN}Action: Stop and Remove All Docker Containers${NC}" &&
docker stop $(docker ps -a -q) &&
docker rm simple_stock_manager_nginx_1 &&
docker rm simple_stock_manager_echo-server_1 &&
docker rm simple_stock_manager_ssm-server_1 &&
docker rm simple_stock_manager_queue-server_1 &&
docker rm simple_stock_manager_redis_1 &&
docker rm simple_stock_manager_mysql-test_1 &&
docker rm simple_stock_manager_mysql_1 &&

echo -e "${GREEN}Action: Remove All Docker Images ${NC}" &&
docker rmi $(docker images -q)

echo -e "${YELLOW}That's all folks! ${NC}"
