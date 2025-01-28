#!/bin/bash

source $INIT_CWD/.env

sass --load-path=node_modules --embed-sources ./scss/app.scss:./site/wp-content/themes/$THEMEDIRCSS/app.min.css --style compressed -w