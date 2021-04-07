#!/bin/bash

[[ -z $1 ]] && {
  echo "0.0.0" > VERSION
  FILE=VERSION
  echo "Usage: ./version-hook.sh VERSION"
} || FILE=$1

VER=$(cat $FILE)

if egrep '^[0-9]+\.[0-9]+\.[0-9]+' <<<"$VER" >/dev/null 2>&1 ; then
    n=${VER//[!0-9]/ }
    a=(${n//\./ })

    X=${a[0]}
    Y=${a[1]}
    Z=${a[2]}
fi

((Z=Z+1))
[[ $Z -eq 10 ]] && {
  Z=0
  ((Y=Y+1))
   [[ $Y -eq 10 ]] && {
     Y=0
     ((X=X+1))
   }
}

echo "$X.$Y.$Z" > $FILE
cat $FILE
