# These packages should NOT exist on public PyPI
# Attacker can register them and pip will fetch from public

# VULNERABLE: Internal packages (not on PyPI)
from internal_company_auth import AuthService
from private_analytics import AnalyticsClient
from mycorp_database_connector import DatabasePool
from secret_config_manager import ConfigLoader
from internal_encryption import decrypt_data

# Legitimate packages (exist on PyPI)
import requests
from flask import Flask

app = Flask(__name__)

@app.route('/data')
def get_data():
    auth = AuthService.verify()
    analytics = AnalyticsClient.track('page_view')
    db = DatabasePool.get_connection()
    config = ConfigLoader.load('production')
    
    return {'status': 'success'}

if __name__ == '__main__':
    app.run()
