# Category

# Description
Our NMS detect a suspected traffic, your task is to investigate the captured traffic and find the anomaly reason</br>
File link: https://hubchallenges.s3.eu-west-1.amazonaws.com/foren/dns.pcapng
# Solution 
Download the file.</br> 
It’s a PCAP Next Generation Dump File therefore we open it with wireshark.</br>
From the name of the challenge we get a hint that we should look at the dns packets.</br> 
Apply a dns filter in wireshark to see the dns packets.</br>
After skimming through them we see some letters before the cybertalents domain name as seen below.</br>
[img1](.) 
# Flag
flag{tshArk_Is_Awes0me_Netw0rking_to0l}