FROM node:boron

WORKDIR /usr/src/app

ADD . /usr/src/app

RUN npm install

EXPOSE 8081

USER daemon

CMD [ "npm", "start" ]