fx_version 'cerulean'
game 'gta5'

name 'rise-web'
description 'Lien in-game vers risefa.fr avec token signé'
author 'Rise FA'
version '1.2.0'

server_exports {
    'openSite',
}

client_exports {
    'openSite',
}

ui_page 'html/open.html'

files {
    'html/open.html',
}

server_scripts {
    'server.lua'
}

client_scripts {
    'client.lua'
}
