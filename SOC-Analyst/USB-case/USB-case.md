# Category
Digital Forensics
# Description
Your Team Lead ask you to develop splunk use case for detecting USB plugged on any device in your environment he shared with you also this [link](https://lantern.splunk.com/Security/Use_Cases)</br>
Develop the use case and answer the below questions based on botsv1 dataset</br> 
X: Date and time when the USB plugged on device  (YYYY-MM-DD:HH:MM:SS)</br>
Y: The Machine name </br>
Z: Name of the USB device</br>
Flag format: flag{X:Y:Z:A}</br>
# Solution 
clicking on the link given to us in the description and searching for 'usb' leads us to this [link](https://lantern.splunk.com/Splunk_Platform/UCE/Security/Incident_Management/Investigating_a_ransomware_attack/Removable_devices_connected_to_a_machine)</br>
![screenshot](./img1.png)</br>
using the recommended search query gets us the image below from which we can get the time the device was plugged in and we can also get the host name by clicking on the host field of the results.</br>
![screenshot](./img2.png)</br>
and checking the 'registry_value_data' field gives us the name of the usb device</br>
![screenshot](./img3.png)</br>
assembling the answers we got gives us the flag</br>
# Flag
flag{2016-08-24:10:42:17:we8105desk:MIRANDA_PRI}