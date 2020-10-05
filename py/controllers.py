from flask_restful import Resource, Api
import getmac

class Main(Resource):
    def get(self):
        mac = getmac.get_mac_address()
        return { 'mac': mac }