# Category
Digital Forensics
# Description
Our SoC L1 reported that she received alert of suspicious login detected by company user “Kvasir” on 13/06/2022. 
Please do check and return by your analysis: 
X: Session Duration spent by the attacker on the system (HH:MM:SS) 
Y: The application used by the user after login (xxxx.exe) 
Z: Identify the SHA256 of this application 
W: Attacker IP address 
A: Attacker Machine host name 
Flag format: flag{X:Y:Z:W:A}
[File](./remotehacker.tar)
# Solution 
Download the file.
Uncompress the file. It contains 2 log files. Open the first file. 
For this challenge, an idea of windows login codes will be needed. 
A network logon is a logon type 3 and  an event id of 4624 is generated every time there is a successful logon. learn more [here] (https://www.manageengine.com/products/active-directory-audit/learn/what-are-logon-types.html) and [here](https://learn.microsoft.com/en-us/windows-server/identity/securing-privileged-access/reference-tools-logon-types) 
So we can sort by event id then by logon type on 13/06/22 for the user kvasir according to the question

# Flag