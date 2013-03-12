#!/bin/bash
if [ $1 == "up" ];then 
	echo u > /tmp/volume.pipe
elif [ $1 == "down" ];then
	echo d > /tmp/volume.pipe
elif [ $1 == "mute" ];then
	echo m > /tmp/volume.pipe
fi
