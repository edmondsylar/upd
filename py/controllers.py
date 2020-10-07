from flask_restful import Resource, Api
import getmac
import socket
import flask

class Main(Resource):
    def get(self):
        mac = getmac.get_mac_address()
        hostname = socket.gethostname()
        ip_address = socket.gethostbyname(hostname)
        print(flask.request)
        return { 'mac': mac, 'Ip': hostname, 'ip':ip_address }