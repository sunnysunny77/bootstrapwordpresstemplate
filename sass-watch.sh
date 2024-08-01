#!/bin/bash

source $INIT_CWD/.env

sass --embed-sources ./scss/app.scss:./site/wp-content/themes/$THEMEDIR/app.min.css --style compressed -w