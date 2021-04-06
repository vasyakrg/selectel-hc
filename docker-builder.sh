#!/bin/bash

cd app

docker build -f Dockerfile-base -t vasyakrg/selectel-hc:base .


docker build -t vasyakrg/selectel-hc:latest .
docker tag vasyakrg/selectel-hc:latest vasyakrg/selectel-hc:$(cat VERSION)
