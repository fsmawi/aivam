#!/bin/sh
cd `dirname $0`
 ROOT_PATH=`pwd`
 java -Xms256M -Xmx1024M -cp $ROOT_PATH/../lib/dom4j-1.6.1.jar:$ROOT_PATH/../lib/jxl.jar:$ROOT_PATH/../lib/mysql-connector-java-5.1.30-bin.jar:$ROOT_PATH:$ROOT_PATH/../lib/systemRoutines.jar:$ROOT_PATH/../lib/userRoutines.jar::.:$ROOT_PATH/traited_file_0_1.jar: aivam.traited_file_0_1.traited_file --context=Default "$@" 