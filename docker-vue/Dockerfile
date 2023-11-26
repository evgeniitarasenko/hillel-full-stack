# Используем официальный образ Node.js
FROM node:20.10.0

RUN npm install -g @vue/cli


# Устанавливаем рабочую директорию
WORKDIR /app

# Копируем остальные файлы проекта
COPY . .

RUN chown -R `stat -c "%u:%g" Dockerfile` .

USER node

EXPOSE 5173

ENTRYPOINT ["tail"]
CMD ["-f","/dev/null"]