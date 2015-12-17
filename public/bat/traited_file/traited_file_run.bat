%~d0
 cd %~dp0
 java -Xms256M -Xmx1024M -cp ../lib/dom4j-1.6.1.jar;../lib/jxl.jar;../lib/mysql-connector-java-5.1.30-bin.jar;../lib/systemRoutines.jar;../lib/userRoutines.jar;.;traited_file_0_1.jar; aivam.traited_file_0_1.traited_file --context=Default %* 