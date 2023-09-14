# Category
Network Security
# Description
Falcon language can guide your hunt, try to hunt the machine developed this challenge.</br>
Developer used the port 8888 for the system</br>
password: falcon</br>
Flag format: FLAG{host+process_Name+IP}</br>
# Solution 
we login to a jupyter enviroment </br>
I did a cmd + f search for 8888 on the process.csv file and found 2 entries and I put the corresponding values into the flag until i got an answer. bruteforcing the answer lol.</br> 
There should be a more refined method but that will do for now. 
![cmd+f](img1.png)
# Flag
flag{nice_williamson+docker-proxy+172.17.0.2}