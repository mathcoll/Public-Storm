#!/bin/bash


find . -name "*.tpl" -type f -exec sed -i "s/ domain=\".*\"//g" {} \;