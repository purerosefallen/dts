#!/bin/bash
if [[ ! -f "./game.php" ]]; then
	cp -rf /defaults/* .
fi
./acdts-daemonctl.sh &
apache2-foreground
