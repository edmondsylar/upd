from flask import Flask
from flask_restful import Resource, Api
from controllers import Main


app = Flask(__name__)
api = Api(app)

api.add_resource(Main, '/')

if __name__ == '__main__':
    app.run(debug=True, port=5000)