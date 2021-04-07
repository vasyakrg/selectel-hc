#!/bin/bash

cd app

./version-hook VERSION

docker build -f Dockerfile-base -t vasyakrg/selectel-hc:base .

docker build -t vasyakrg/selectel-hc:latest .
docker tag vasyakrg/selectel-hc:latest vasyakrg/selectel-hc:$(cat VERSION)
