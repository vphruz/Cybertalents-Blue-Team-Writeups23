# Category
Network Security
# Description
My computer was compromised and my files were stolen and then deleted from my computer, I've captured some of the traffic, can you analyse the PCAP and try to restore any of my files?
[file](./eXodus.pcapng)
# Solution 
open the file with wireshark</br>
there are refragmented imcp packets with a size 1516 bytes to an ip of 45.33.32.156
![wireshark](./img1.png)
a virustotal search of this ipaddress shows that it's malicioius
we get data from it using this tshark command ```tshark -r eXodus.pcapng -Y icmp -T fields -e data.data > output.txt```
the data is xor encoded and needs to be convreted to binary 
# Flag