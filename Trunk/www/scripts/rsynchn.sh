#!/bin/bash

rsync -navz --del --exclude 'datas*' --exclude 'cache*' --exclude '_specific.php' -e ssh /home/mathieu/Projets/current/internetcollaboratif.info/public-storm/Trunk/www/ mathieu@guru:/var/www/internetcollaboratif.info/public-storm/