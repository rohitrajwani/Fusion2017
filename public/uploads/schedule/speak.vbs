Dim message,sapi
message = InputBox("Hey Beauty,What do you want me to say now?","Speak to Me")
Set sapi = CreateObject("sapi.spvoice")
sapi.Speak message