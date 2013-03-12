volume-server.php
 1. Download joystick.appleRemote.xml to: ~/Library/Application\ Support/Plex/userdata/keymaps/
 2. Put volume.sh and volume-server.php somewhere and make them executable. (chmod +x)
 3. Edit the joystick.appleRemote.xml so it has the absolute path to volume.sh
 4. edit volume-server.php and give it the hostname and port it can telnet to your AVR, modify the commands if needed for your AVR.. thats up to you to figure out.
 5. Run volume-server.php from terminal (./volume-server.php), you'll want this to autostart eventually.. thats up to you to figure out.
 6. Test it by running 'echo m > /tmp/volume.pipe' or './volume.sh mute' from another terminal window and it should mute your AVR
