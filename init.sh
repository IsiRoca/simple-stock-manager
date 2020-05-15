#!/bin/bash

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
ORANGE='\033[0;33m'
NC='\033[0m'

cp .env.example .env &&
docker-compose run --rm --no-deps ssm-server composer install &&
docker-compose run --rm --no-deps ssm-server php artisan key:generate &&
docker-compose run --rm --no-deps ssm-server php artisan horizon:install &&
docker-compose run --rm --no-deps ssm-server php artisan telescope:install &&
docker-compose run --rm --no-deps ssm-server php artisan storage:link &&
docker run --rm -it -v $(pwd):/app -w /app node npm install &&
docker-compose up -d &&
echo -e "\n ${GREEN}Starting Docker containers, wait...${NC} \n" &&
sleep 30 &&
#docker-compose run --rm ssm-server mysql -u root -p < /docker-entrypoint-initdb.d/createdb.sql &&
docker-compose run --rm ssm-server php artisan migrate &&
docker-compose run --rm ssm-server php artisan db:seed &&
docker run --rm -it -v $(pwd):/app -w /app node npm run dev &&
docker-compose run --rm ssm-server php artisan db:seed --class=DevDatabaseSeeder &&

echo -e "${GREEN}" &&
echo -e " -- API Routes List --" &&
echo -e "${NC}" &&
docker-compose run --rm --no-deps ssm-server php artisan route:list --path=api &&

echo -e "${RED}" &&
echo -e "*************************" &&
echo -e "*****  ACCESS INFO  *****" &&
echo -e "*************************${GREEN}" &&
echo -e " - Access: ${ORANGE}localhost \n ${GREEN}- Login: ${ORANGE}superadmin@email.com \n ${GREEN}- Password: ${ORANGE}1234 \n${GREEN}" &&
echo -e " -- Default Token --" &&
echo -e "${ORANGE}3in9X94Rmz7NLzsQpjhub7KFRhheplhVFDzQWGx9dAjGszopil9SGMZZollQ${RED}" &&
echo -e "*************************" &&
echo -e "*************************" &&
echo -e "${NC}" &&

echo -e "${RED}" &&
echo -e "*************************" &&
echo -e "${GREEN}Installation completed!!! ${RED}"
echo -e "*************************" &&
echo -e "${NC}" &&

echo -e "${YELLOW} That's all folks! ${NC}"
