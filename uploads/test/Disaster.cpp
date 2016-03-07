#include<cstdio>
#include<iostream>
#include<vector>
using namespace std;
int countt[1000]={0},check[400]={0},c=0,n,sth=0,vc[400][400]={0};
char path[400][2],ans[400],bf;
vector<int>v[1000];
void walk(int p)
{
    if(c==n+1)
    {
        if(sth==0)
        {
        for(int i=0;i<c;i++)
        {
            printf("%c ",ans[i]);
        }
        printf("\n");
        sth=1;
        }
    }
    else
    {
    for(int i=0;i<countt[p];i++)
    {
        if(v[p][i]!=bf and vc[p][v[p][i]]==0)
        {
            bf=p;
            ans[c]=v[p][i];
            c++;
            vc[p][v[p][i]]=1;
            walk(v[p][i]);
            c--;
        }
    }
}
}
int main()
{
    char st;
    scanf("%d",&n);
    for(int i=0;i<n;i++)
    {
        char a,b;
        scanf(" %c%c",&a,&b);
        countt[a]++;
        countt[b]++;
        if(i==0)
        {
            st=a;
        }
        v[a].push_back(b);
        v[b].push_back(a);

    }
    for(int i=0;i<1000;i++)
    {
        c=0;
        if(countt[i]%2>0)
        {
            for(int j=0;j<400;j++)
            {
                for(int k=0;k<400;k++)
                {
                    vc[j][k]=0;
                }
            }
            ans[c]=i;
            c++;
            bf=i;
            walk(i);
        }
        if(sth==1)
        {
            break;
        }


    }
    if(sth==0)
    {
        c=0;
        ans[c]=st;
        bf=st;
        c++;
        walk(st);
    }
    return 0;

}
