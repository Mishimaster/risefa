RegisterNetEvent('rise-web:open', function(url)
    SendNUIMessage({
        action = 'openUrl',
        url = url,
    })

    TriggerEvent('chat:addMessage', {
        color = { 51, 153, 255 },
        multiline = true,
        args = { 'Rise', 'Connexion au site — le navigateur devrait s\'ouvrir automatiquement.' },
    })
end)
