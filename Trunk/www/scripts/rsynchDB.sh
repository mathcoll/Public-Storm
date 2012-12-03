#!/bin/bash

rsync -avz --del -e ssh mathieu@guru:/var/www/internetcollaboratif.info/public-storm/datas/ /home/mathieu/Projets/current/internetcollaboratif.info/public-storm/Trunk/www/datas/