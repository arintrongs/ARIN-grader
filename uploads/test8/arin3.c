#include <stdio.h>
char s[1][1000000000];
int a,n[10000000],i;
main(){
int max =0,j;
scanf("%d",&a);
scanf("%s",s[0]);
for(i=0;i<a;i++)
{scanf("%d",&n[i]);
}
for(i=0;i<a;i++){
        if(n[i]>max){
            max =n[i];
        }

}
printf("%s\n%d",s[0],max);


}
