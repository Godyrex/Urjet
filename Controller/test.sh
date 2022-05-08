#!/bin/bash
#source functions.sh
menu() {
    while :; do
        FILE="menu.txt"
        cat $FILE
        #zenity --text-info --filename menu.txt
        clear
        read -n1 -s
        case "$REPLY" in
        "1") search_big_files ;;
        "2") line ;;
        "3") delete ;;
        "4") compress ;;
        "5") supp_dans_journal ;;
        "7") add_to_list ;;
        "8") supp_from_list ;;
        "9") compress_from_list ;;
        "10") help ;;
        "Q") exit ;;
        "q") echo "case sensitive!!" ;;
        *) echo "invalid option" ;;
        esac
        sleep 1
    done
}
compress() {
    if [ -f "$current" ]; then
        zip "$current".zip "$current"
    else
        echo "error :file not found"
    fi

}
supp_dans_journal() {
    destdir="journal.txt"

    if [ -f "$destdir" ]; then
        echo "$filesd" >"$destdir"
    else
        echo "file not found"
    fi
}
show_usage() {
    echo "disque.sh: [-h] [-j] [-s] [-p] [-l] [-v] [-m] [-g] chemin.."
}
line() {
    if [ -z "$line1" ]; then
        export line1=1

    fi
    export lines=$(echo "$list" | wc -l)
    echo "Number of lines = $lines"
    echo " Line number = $line1"
    export current=$(echo "$list" | sed -n "$line1"p)
    echo "$current"
    if [ $line1 -eq $lines ]; then
        export line1=1
    else
        export line1=$((line1 + 1))

    fi

}
search_big_files() {
    echo "*** Search ***"
    export list=$(find /home/oussema -type f -size +100k)
    echo "$list"
    echo "*** Search ***"
}
add_to_list() {
    export nlist+=$(echo -e "$current \n  ")
    echo "$nlist"

}
supp_from_list() {
    export lineslist=$(echo "$nlist" | wc -l)
    for ((i = 1; i = $lineslist; i++)); do
        export currentsupp=$(echo "$nlist" sed -n "$i"p)
        timestamp=$(date +%T)
        export filesd+=$(echo -e "$currentsupp $timestamp \n  ")
        rm "$currentsupp"
        echo "$currentsupp file deleted"
    done

}
compress_from_list() {
    export lineslist=$(echo "$nlist" | wc -l)
    for ((i = 1; i = $lineslist; i++)); do
        export currentcomp=$(echo "$nlist" sed -n "$i"p)
        zip "$currentcomp".zip "$currentcomp"
        echo "$currentcomp file deleted"
    done

}
delete() {
    if [ -f "$current" ]; then
        echo "*** Delete ***"
        timestamp=$(date +%T)
        export filesd+=$(echo -e "$current $timestamp \n  ")
        echo "$filesd"
        rm "$current"
        echo "$current file deleted"
        echo "*** Delete ***"
    else
        echo "*** Delete ***"
        echo "error :file not found"
        echo "*** Delete ***"
    fi

}

help() {
    FILE="help.txt"
    cat $FILE
}

if [[ $# = 0 ]]; then
    echo "error :(write disque.sh for help)"
    show_usage

else

    case $1 in
    "-h")
        help
        ;;
    "-g")
        menu
        ;;
    "-l")
        search_big_files
        ;;
    "-s")
        delete
        ;;
    "-p")
        line
        ;;
    "-c")
        compress
        ;;
    "-j")
        supp_dans_journal
        ;;
    "-m")
        menu
        ;;
    "-r")
        add_to_list
        ;;
    "-rs")
        supp_from_list
        ;;
    "-rc")
        compress_from_list
        ;;
    "-v")
        echo "Version 0.1 By Oussema Ouakad And Rania Heni"
        ;;

    *) echo "error :(write disque.sh for help)" ;;
    esac

fi
