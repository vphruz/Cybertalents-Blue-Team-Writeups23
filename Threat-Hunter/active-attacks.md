# Category
Digital Forensics
# Description
Our network got compromised two days ago by an unknown attacker, and we need to get an answer for the following questions:</br>

1. What is the domain's SID?</br>
2. The attacker failed to login to some accounts, What is the attacker's machine IP address?</br>
3. What is the workstation's name that the attacker was using to authenticate with the administrator account?</br>

Flag format: Flag{ANS1_ANS2_ANS3}</br>
# Solution 
download the file</br>
downlad chainsaw, a tool for rapidly searching windows forensic artifacts from [here](https://github.com/WithSecureLabs/chainsaw) 
i learned about this tool from this awesome [blog](https://f0rk3b0mb.github.io/p/windows-events-and-log-analysis/)
domian credentials verification has an event id of 4776. click [here](https://www.ultimatewindowssecurity.com/securitylog/encyclopedia/event.aspx?eventid=4776) for more info
after running 
```./chainsaw hunt -r ../../rules/ ../../../logs.evtx```</br>

command breakdown:
./chainsaw launches chainsaw
hunt option tells chainsaw to go through the logs acccording to a set of rules
-r the file path for the rules(in my case it was 2 folders up hence "../../")
selected the log file to scan - "../../../logs.evtx"
after running that we get:
![](./img1.png)


# Flag