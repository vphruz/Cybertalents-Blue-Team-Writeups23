# Category
Web Security
# Description
Come back home Mr. Bean.
# Solution 
As we open the link, we get stared at in the face by mr bean.</br>
![mrBean](./img1.png)</br> 
Checking the page source reveals nothing.</br> 
we conduct a directoyr brutefroce using dirbuster</br>
![dirbuster](./img2.png)</br>
we get the result shown above after a while of scanning, we decide to check out the files directory. we get:</br>
![files](./img3.png)</br>
After a while we discover that the server is running nginx. And we can try a directory trasversal attack since we have the hint “home” in the question </br>
![files..](./img4.png)</br>
![/home](./img5.png)</br>
there's a txt file that contains the flag</br>
![flag](./img6.png)</br>
[writeup](https://medium.com/@ahmed-sayed/bean-challenge-cybertalents-5765747cb7ab)
# Flag
FLAG(Nginx not aLWays sEcUre bY The waY}