FROM node:boron

WORKDIR /usr/src/app

ADD . /usr/src/app

RUN npm install

# Bundle app source
COPY . .

EXPOSE 8081

CMD [ "npm", "start" ]

USER daemon