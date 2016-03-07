#include <cstdio>
#include <cstdlib>
#include <algorithm>
using namespace std;
int king[200000]={0};
bool cmp(int a,int b)
{
	return a>b;
}
int main()
{
	int n,m,temp;
	scanf("%d",&n);
	for(int i=0;i<n;i++)
	{
		scanf("%d",&king[i]);
	}
	scanf("%d",&m);
	for(int i=0;i<n;i++)
	{
		for(int j=0;j<n;j++)
		{
			if(king[i]<king[i+1])
			{
				temp = king[i+1];
				king[i+1] = king[i];
				king[i]=temp;
			}
		}
	}
	for(int i=0;i<m;i++)
	{
		printf("%d\n",king[i]);
	}
}