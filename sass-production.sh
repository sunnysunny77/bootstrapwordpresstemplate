#!/bin/bash

source $INIT_CWD/.env

sass --load-path=node_modules ./scss/app.scss:./site/wp-content/themes/$THEMEDIRCSS/app.min.css --style compressed --no-source-map