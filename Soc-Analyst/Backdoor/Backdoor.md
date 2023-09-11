# Category
Network Security, Wireshark
# Description
Our server compromised due to known vulnerability introduced from many years, Kindly check and identify this flow 
X: Attack source → EX. “Internal/External”
Y: The Source IP → x.x.x.x
Z: CVE Num of the attack → xxx
W: Destination Mac Address
Flag format: flag{X:Y:Z:w}</br>
File Link:https://hubchallenges.s3.eu-west-1.amazonaws.com/foren/backdoor.pcap
# Solution 
Download the file. Since it has a pcap file format, we know that it is a packet capture file and can be opened with wireshark. Since we are dealing with a server compromise, we will be checking the ftp and http(s) protocols. On the statistics tab, we click on ftp to filter out only the ftp packets OR we can type “ftp” in the search bar, the result is shown below.
[img1](./Picture%201.png)
A google search of vsftpd 2.3.4 shows VSFTPD v2.3.4 Backdoor Command Execution with CVE number CVE-2011-2523. The ftp request packet shows source ip as a192.168.1.58 and destination ip as 192.168.1.80 clicking on the packet we get a mac address of 08:00:27:66:e3:8b
[img2](./Picture%202.png)
# Flag
flag{Internal:192.168.1.58:CVE-2011-2523:08:00:27:66:e3:8b}