FROM node:lts-alpine

VOLUME ./vuejs/node_modules /var/www/node_modules
# делаем каталог 'app' текущим рабочим каталогом
WORKDIR /var/www
# копируем оба 'package.json' и 'package-lock.json' (если есть)
COPY ./vuejs/package*.json ./

# устанавливаем зависимости проекта
RUN npm install

# копируем  файлы и каталоги проекта в текущий рабочий каталог (т.е. в каталог 'app')
COPY ./vuejs .

CMD ["npm", "run", "serve"]
