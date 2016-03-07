#include<cstdio>
#include<iostream>
using namespace std;
int n,room[1001]= {0},guide[1001]= {0};
int p[1001]= {0};
int main()
{
	scanf("%d",&n);
	for(int i=1; i<=n; i++)
	{
		scanf("%d",&guide[i]);
	}
	p[2]=2;
    for(int i=3;i<=n+1;i++)
    {

        p[i]+=(p[i-1]+1)%1000000007;
        p[i]+=(p[i]-p[guide[i-1]])%1000000007;
        if(p[i]<0)
        {
            p[i]+=1000000007;
        }
    }
    printf("%d",p[n+1]%1000000007);
}
