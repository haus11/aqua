'use strict';

const path = require('path');
const express = require('express');
const exphbs = require('express-handlebars');
const compression = require('compression');

const app = express();
const isAquaOpen = require('./isAquaOpen');

// Constants
const PORT = 1025;
const HOST = '0.0.0.0';

//Enable gzip
app.use(compression());

app.engine('.hbs', exphbs({
    extname: '.hbs',
    defaultLayout: 'main',
    partialsDir: path.join(__dirname, 'views/partials'),
    layoutsDir: path.join(__dirname, 'views/layouts')
  }));
app.set('view engine', '.hbs');
app.set('views',path.join(__dirname,'views'))

app.use('/static', express.static(`${__dirname}/public`));

app.get('/', (req, res) => {
    isAquaOpen()
        .then((open) => {
            res.render('home', {
                class: open ? 'open' : 'closed',
                label: open ? 'GEÖFFNET' : 'GESCHLOSSEN'
            });
        })
        .catch((error) => {
            console.error("Error::isAquaOpen:", error.message);

            // Unknown status on error
            res.render('home', {
                class: 'unknown',
                label: 'UNGEWISS'
            });
        });
});

app.listen(PORT, HOST);
console.log(`Running on ${HOST}:${PORT}`);
