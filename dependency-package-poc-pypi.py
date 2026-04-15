# requirements.txt would have: flask, requests, numpy, pandas, scikit-learn, matplotlib, unused-package, another-unused
from flask import Flask
import requests
import numpy as np
# import pandas as pd  # Commented - NOT USED
# from sklearn import datasets  # NOT USED
# import matplotlib.pyplot as plt  # NOT USED

app = Flask(__name__)

@app.route('/')
def home():
    response = requests.get('https://httpbin.org/get')
    array = np.array([1, 2, 3, 4, 5])
    return {
        'status': response.status_code,
        'array_sum': array.sum(),
        'array_mean': array.mean()
    }

if __name__ == '__main__':
    app.run(debug=True)
