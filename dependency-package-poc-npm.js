// These packages should NOT exist in public npm registry
// If attacker publishes them, npm will pull from public instead of private

// VULNERABLE: Internal-only packages (not on public npm)
const internalAuth = require('@mycompany/internal-auth');
const sharedUtils = require('@myorg/shared-utils');
const paymentGateway = require('payment-gateway-internal');
const dbConnector = require('db-connector-private');
const loggingLib = require('logging-lib-internal');

// Legitimate packages (exist on public npm)
const express = require('express');
const _ = require('lodash');

const app = express();

app.get('/user/:id', (req, res) => {
  const userId = req.params.id;
  const auth = internalAuth.validate(userId);
  const userData = sharedUtils.formatUser(auth);
  res.json(userData);
});

app.listen(3000);
