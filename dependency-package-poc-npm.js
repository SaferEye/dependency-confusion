// Package.json would have: express, lodash, moment, axios, chalk, unused-package-1, unused-package-2
const express = require('express');
const _ = require('lodash');
// const moment = require('moment'); // Commented - NOT USED
// const axios = require('axios'); // NOT USED
// const chalk = require('chalk'); // NOT USED

const app = express();

app.get('/', (req, res) => {
  const data = [1, 2, 3, 4, 5];
  const processed = _.map(data, n => n * 2);
  res.json({ result: processed });
});

app.listen(3000, () => {
  console.log('Server running on port 3000');
});
