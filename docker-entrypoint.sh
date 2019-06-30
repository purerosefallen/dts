#!/bin/bash
if [[ ! -f "./game.php" ]]; then # first run
	cp -rf /defaults/* .;
	chmod -R 777 ./gamedata;
	chmod -R 777 ./include;
	chmod -R 777 ./templates;
fi
./acdts-daemonctl.sh &
apache2-foreground
