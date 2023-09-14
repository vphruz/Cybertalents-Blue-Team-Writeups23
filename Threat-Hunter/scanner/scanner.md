# Category
Digital Forensics
# Description
Our web server at 192.168.250.20 is being scanned by a famous vulnerability scanner, can you investigate the logs and tell us: <br>
X: the vulnerability scanner name<br>
Y: The Source IP → x.x.x.x<br>
Flag format: flag{X:Y}<br>
Link: http://54.215.227.222/en-GB/app/launcher/home<br>
Credentials: cybertalents/cybertalents <br>
# Solution
 Open the website<br>
 We search for activity that has to do with the ip address and because we are looking for scanning activity, it's most likely going to be scanning our webserver so we will search for http logs.<br> 
 so we type in the following the search box.<br>
 >index= 192.168.250.20 sourcetype="stream:http" <br>

 ![first search](./img1.png)
 We check the src_ip field and we find out that 100% of the traffic is from 192.168.2.50. Therefore our Y is 192.168.2.50<br>
 ![second search](./img2.png)
 we probe deeper into the http logs between the two ip addresses above using the search query below
 >index= 192.168.250.20 sourcetype="stream:http" src_ip=192.168.2.50<br>

 we get the following when we check for the user agent. 
 ![nessus is the culprit](./img3.png)
 From there we can determine that the scanner being used is nessus. Therefore X = Nessus
# Flag
flag{Nessus:192.168.2.50}