'use strict';

const express = require('express');
const expressHandlebars = require('express-handlebars');
const compression = require('compression');

const app = express();
const isAquaOpen = require('./isAquaOpen');

// Constants
const PORT = 8081;
const HOST = '0.0.0.0';

//Enable gzip
app.use(compression());

app.engine('handlebars', expressHandlebars({defaultLayout: 'main'}));
app.set('view engine', 'handlebars');

app.use('/static', express.static('public'));

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