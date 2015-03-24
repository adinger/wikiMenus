Collaborators:
alding2 (Lin/Angela), aprilxu2 (April), dnoora2 (Danish), kghull2 (Khurram)

Github Instructions:

- Download github and git shell. https://mac.github.com/
- In git shell, type "git config --global user.name 'kghull2'"
- On Github.com, navigate to https://github.com/Danish21/wikiMenus
- In the top right corner, click "Fork". You now have your own branch/copy of the repository that you can commit to without messing up the master branch.
- In Git Shell, navigate to C:\xampp\htdocs (or whereever you downloaded xampp to).
- In Git Shell, type "git clone https://github.com/[your github username]/wikiMenus". You now have a local copy of your branch on your computer.
- To configure Git Shell to go to the C:\xampp\htdocs\wikimenus folder by default when you start the shell, go to the GitHub UI.
    1. Click on the gear symbol at the top right.
    2. Click on options in the dropdown.
    3. On the right side, under "Clone Path", change the path in that input field to C:\xampp\htdocs\wikimenus, or whereever you have the wikimenus folder.
- IMPORTANT: every time before you start working, you need to commit or "stash" (throw away) your changes, then sync your branch with the origin branch in order to get the most up-to-date changes that everyone else made. To do this, type "git pull upstream master".
- After making a change to your local copy, you can commit it to your own branch by doing: 
	1. git add .
	2. git commit -m "changed stuff"
	3. git push
	4. go to your own branch on the github website, click the green button to make a pull request so that others may review/approve/deny your changes.
    
For a more detailed explanation, watch this github tutorial for Mac OSX: https://www.youtube.com/watch?v=0fKg7e37bQE 