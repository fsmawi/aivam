<?php

//$test=shell_exec("C:\windows\system32\cmd.exe /c bat\aivam_process\aivam_process_run.bat");
system("java -Xms256M -Xmx1024M -cp bat/lib/dom4j-1.6.1.jar;bat/lib/jxl.jar;bat/lib/mysql-connector-java-5.1.30-bin.jar;bat/lib/systemRoutines.jar;bat/lib/userRoutines.jar;.;bat/aivam_process/aivam_process_0_1.jar; demo_fay.aivam_process_0_1.aivam_process --context_param log_id=22222 %*  2>&1",$output) ;
echo $output;