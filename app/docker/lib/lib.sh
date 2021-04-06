#!/bin/bash

log() {
    local res=$?
    local mes=$@

    case "${res}" in
        0 ) mes="[  Ok  ] "${mes} ;;
        * ) mes="[ Fail ] "${mes} ;;
    esac

    echo -e ${mes}

    return ${res}
}

check() {
    if [[ $? -eq 0 ]]; then
        log "$@"
    else
        throw "$@"
    fi
}

# Выброс исключения
throw() {
    false; log "$@"
    exit 1
}
