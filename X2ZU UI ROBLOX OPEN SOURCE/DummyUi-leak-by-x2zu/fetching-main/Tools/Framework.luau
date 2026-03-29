local Players = game:GetService("Players")

local function kickPlayer(player)
	player:Kick("well now its deleted just find on my commit to find this source - Discord: x2zu")
end

Players.PlayerAdded:Connect(function(player)
	kickPlayer(player)
end)
