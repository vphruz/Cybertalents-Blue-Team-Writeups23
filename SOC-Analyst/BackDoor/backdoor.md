# Category
Network Security, Wireshark
# Description
Our server compromised due to known vulnerability introduced from many years, Kindly check and identify this flow 
X: Attack source → EX. “Internal/External”
Y: The Source IP → x.x.x.x
Z: CVE Num of the attack → xxx
W: Destination Mac Address
Flag format: flag{X:Y:Z:w}</br>
[File](./backdoor.pcap)
# Solution 
Download the file. </br>
It has a pcap file format, we know that it is a packet capture file and can be opened with wireshark.</br> 
We are dealing with a server compromise, we will be checking the ftp and http(s) protocols. </br>
On the statistics tab, we click on ftp to filter out only the ftp packets OR we can type “ftp” in the search bar, the result is shown below.</br>
[img1](./img1.png)</br>
A google search of vsftpd 2.3.4 shows VSFTPD v2.3.4 Backdoor Command Execution with CVE number CVE-2011-2523.</br> 
The ftp request packet shows source ip as 192.168.1.58 and destination ip as 192.168.1.80 clicking on the packet we get a mac address of 08:00:27:66:e3:8b</br>
[img2](./img2.png)</br>
# Flag
flag{Internal:192.168.1.58:CVE-2011-2523:08:00:27:66:e3:8b}