#include <stdio.h>
#include <string.h>
main()
{
    int a,c[120],i,j,mem=0;
    char b[110][1000];
    scanf("%d",&a);
    for(i=0;i<a;i++){
    scanf("%s",b[i]);
      c[i] = strlen(b[i]);
    }
    for(i=0;i<a;i++)
    {
        printf("\n");
        for(j=0;j<c[i];j++)
        {
           if(b[i][j] == 'd' || b[i][j]=='D'){
           mem = 1;
        }
        }

        if(mem == 1){
        printf("KAMEHAMEHA!!!");
        }
        else if(mem == 0 ){
        printf("FUS RO DAH!!");
        }
        mem =0 ;
    }

}
