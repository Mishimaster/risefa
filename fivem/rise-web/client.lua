--- Appelé par un bouton menu, une touche, etc.
function OpenRiseSite()
    TriggerServerEvent('rise-web:openSite')
end

exports('openSite', OpenRiseSite)

RegisterNetEvent('rise-web:open', function(url)
    SendNUIMessage({
        action = 'openUrl',
        url = url,
    })

    TriggerEvent('chat:addMessage', {
        color = { 51, 153, 255 },
        multiline = true,
        args = { 'Rise', 'Ouverture de la boutique Rise dans votre navigateur.' },
    })
end)

-- Touche optionnelle : F10 (désactivable via convar rise_web_key "")
local key = GetConvar('rise_web_key', 'F10')
if key ~= '' then
    RegisterCommand('+rise_web_open', function()
        OpenRiseSite()
    end, false)
    RegisterCommand('-rise_web_open', function() end, false)
    RegisterKeyMapping('+rise_web_open', 'Ouvrir la boutique Rise (site web)', 'keyboard', key)
end
