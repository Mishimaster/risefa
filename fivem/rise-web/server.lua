local SITE_URL = GetConvar('rise_web_url', 'https://risefa.fr')
local AUTH_SECRET = GetConvar('rise_web_secret', '')

local function getLicense(source)
    for _, id in ipairs(GetPlayerIdentifiers(source)) do
        if string.sub(id, 1, 8) == 'license:' then
            return string.sub(id, 9)
        end
    end
    return nil
end

--- Ouvre le site avec un lien signé (shop, compte, etc.)
local function openSiteForPlayer(source)
    if source == 0 then
        return false
    end

    if AUTH_SECRET == '' then
        print('[rise-web] Configure rise_web_secret dans server.cfg')
        TriggerClientEvent('chat:addMessage', source, { args = { '^1Rise', 'Site web non configuré.' } })
        return false
    end

    local license = getLicense(source)
    if not license then
        TriggerClientEvent('chat:addMessage', source, { args = { '^1Rise', 'License introuvable.' } })
        return false
    end

    local body = json.encode({
        license = license,
        username = GetPlayerName(source),
    })

    PerformHttpRequest(SITE_URL .. '/api/game/session', function(statusCode, responseBody)
        if statusCode ~= 200 then
            TriggerClientEvent('chat:addMessage', source, { args = { '^1Rise', 'Impossible de contacter le site (' .. tostring(statusCode) .. ').' } })
            return
        end

        local data = json.decode(responseBody)
        if not data or not data.url then
            TriggerClientEvent('chat:addMessage', source, { args = { '^1Rise', 'Réponse site invalide.' } })
            return
        end

        TriggerClientEvent('rise-web:open', source, data.url)
    end, 'POST', body, {
        ['Content-Type'] = 'application/json',
        ['X-Rise-Secret'] = AUTH_SECRET,
    })

    return true
end

RegisterCommand('site', function(source)
    openSiteForPlayer(source)
end, false)

-- Bouton menu / touche / autre ressource → même logique que /site
RegisterNetEvent('rise-web:openSite', function()
    openSiteForPlayer(source)
end)

exports('openSite', openSiteForPlayer)
