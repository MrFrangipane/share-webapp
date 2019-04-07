import requests
from requests.auth import HTTPBasicAuth


result = requests.post(
    url='http://share.frangitron.com/upload',
    json={'song_name': 'ma chanson favorite'},
    auth=HTTPBasicAuth('admin', '******')
)

print(result.text)
