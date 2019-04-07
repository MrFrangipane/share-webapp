try:
    import json
    import MySQLdb


    class Database(object):

        def __init__(self, config_file):
            with open(config_file, 'r') as f_config:
                self.infos = json.load(f_config)

        def _request(self, request):
            connexion = MySQLdb.connect(
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

except Exception as e:
    import traceback
    traceback.print_exc()
