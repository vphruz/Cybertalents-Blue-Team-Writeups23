# Category
Digital Forensics
# Description
an attacker after compromising the machine added a new account as admin. can you find the name of the new account? <br>
flag format : flag{md5 of string} <br>
[file](./Security436509324654726509.evtx)
# Solution
For this challenge we need to have an idea of windows event ids.<br>
A quick [google search](https://www.google.com/search?q=windows+event+id+for+creating+a+new+account) reveals that the event id 4720 is logged everytime a new account is created.<br>
We open the log file and sort according to event ids since the number of logs are few, then we see a singular event with the aforementioned id. The account created is "Sam".<br>
![screenshot of windows event viewer showng the new account creation](https://github.com/vphruz/Cybertalents-Blue-Team-Writeups23/blob/main/Threat%20hunter/img1.png)<br>
Since the flag requires the md5 of the string, we go to a [md5 hash generator](https://www.md5hashgenerator.com/) to get the md5 hash of Sam and the hash is "ba0e0cde1bf72c28d435c89a66afc61a"<br>
![screenshot of md5 hash generator](https://github.com/vphruz/Cybertalents-Blue-Team-Writeups23/blob/main/Threat%20hunter/img2.png)<br>
# Flag
flag{ba0e0cde1bf72c28d435c89a66afc61a}
