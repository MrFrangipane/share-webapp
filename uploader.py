import json
import pymysql


class Database(object):

    def __init__(self, config_file):
        with open(config_file, 'r') as f_config:
            self.infos = json.load(f_config)

    def _request(self, request):
        connexion = pymysql.connect(
            self.infos['host'],
            self.infos['username'],
            self.infos['dbname'],
            self.infos['password']
        )
        cursor = connexion.cursor()
        cursor.execute(request)
        return cursor

    def authors(self):
        cursor = self._request("SELECT * from author ORDER BY name DESC")
        return cursor.fetchall()


print(Database("config.json").authors())
