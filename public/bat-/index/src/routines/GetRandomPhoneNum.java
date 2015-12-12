package routines;

public class GetRandomPhoneNum {


    /**
     * GetPhone: generates randomly a french phone number
     * 
     * 
     * {talendTypes} String
     * 
     * {Category} User Defined
     * 
     * {example} GetPhone() # 0123456789.
     */
    public static String GetPhone() {
    	String Tel="";    	
    	int[] anArray;
    	int tmp;
    	Boolean flag;
    	anArray = new int[10];
    	anArray[0] = 0;
    	anArray[1] = 0;
    	anArray[2] = 0;
    	anArray[3] = 0;
    	anArray[4] = 0;
    	anArray[5] = 0;
    	anArray[6] = 0;
    	anArray[7] = 0;
    	anArray[8] = 0;
    	anArray[9] = 0;
    	
    	for(int i=0;i<8;i++){
   		
    		do {
    			flag = false;
	    		tmp = Math.round(routines.Numeric.random(0,9));
	    		if(anArray[tmp] < 1) {
	    			anArray[tmp]++;
	    			Tel = Tel.concat(String.valueOf(tmp));
	    		}else{
	    			flag = true;
	    		}
    		}while(flag);
    		    		
    	}
    	return Tel;    	

    }
    public static void main(String args[]){
    	System.out.println(GetPhone());
    }
}
