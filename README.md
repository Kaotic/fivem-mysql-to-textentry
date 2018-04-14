#MySQL to natives.lua
### Example of output :

```lua
function AddTextEntry(key, value)
		Citizen.InvokeNative(GetHashKey("ADD_TEXT_ENTRY"), key, value)
end

Citizen.CreateThread(function()
		AddTextEntry('id1', 'STD Spoiler')
		AddTextEntry('id2', 'Rebla')
		AddTextEntry('id3', 'Carbon Wing Type II')
		AddTextEntry('id3', 'DF8-90')
end)
```
