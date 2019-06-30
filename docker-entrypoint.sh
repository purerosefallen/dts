#!/bin/bash
if [[ ! -f "./game.php" ]]; then # first run
	cp -rf /defaults/* .;
	chown -R www-data:www-data ./gamedata;
	chown -R www-data:www-data ./include;
	chown -R www-data:www-data ./templates;
fi
./acdts-daemonctl.sh &
apache2-foreground
