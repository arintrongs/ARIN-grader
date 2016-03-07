#include<cstdio>
#include<iostream>
using namespace std;
int honey[1100][1100]= {0},sth[1100][1100]= {0},check[1100][1100]= {0};
int sum=0,maxx=0,countt=0;
int n,m;
int main()
{

    scanf("%d%d",&n,&m);
    for(int i=0; i<=m+1; i++)
    {
        check[0][i]=1;
    }
    for(int i=1; i<=n; i++)
    {
        if(i%2==0)
        {
            for(int j=2; j<=m+1; j++)
            {
                scanf("%d",&honey[i][j]);

            }

        }
        else
        {
            for(int j=1; j<=m; j++)
            {
                scanf("%d",&honey[i][j]);
            }
        }

    }
    for(int i=1; i<=n; i++)
    {
        if(i%2==0)
        {
            for(int j=2; j<=m+1; j++)
            {

                if(sth[i-1][j-1]+honey[i][j]>sth[i-1][j]+honey[i][j])
                {
                    sth[i][j]=sth[i-1][j-1]+honey[i][j];
                    check[i][j]=check[i-1][j-1];
                }
                else
                {
                    if(sth[i-1][j-1]==sth[i-1][j]&&i-1>0)
                    {
                       // printf("=====%d %d\n",sth[i-1][j-1],sth[i-1][j]);
                        check[i][j]=check[i-1][j-1]+check[i-1][j];
                    }
                    else
                    {
                        check[i][j]=check[i-1][j];
                    }
                    sth[i][j]=sth[i-1][j]+honey[i][j];
                }

                if(sth[i][j]>maxx)
                {
                    maxx=sth[i][j];
                }
            }
        }
        else
        {
            for(int j=1; j<=m; j++)
            {
                if(sth[i-1][j]+honey[i][j]>sth[i-1][j+1]+honey[i][j])
                {
                    sth[i][j]=sth[i-1][j]+honey[i][j];
                    check[i][j]=check[i-1][j];
                }
                else
                {

                    if(sth[i-1][j+1]==sth[i-1][j]&&i-1>0)
                    {
                        //printf("=====%d %d\n",sth[i-1][j+1],sth[i-1][j]);
                        check[i][j]=check[i-1][j+1]+check[i-1][j];
                    }
                    else
                    {
                        check[i][j]=check[i-1][j+1];
                    }
                    sth[i][j]=sth[i-1][j+1]+honey[i][j];
                }
                if(sth[i][j]>maxx)
                {
                    maxx=sth[i][j];
                }
            }
        }
    }

    for(int i=1; i<=m+1; i++)
    {
       if(sth[n][i]==maxx)
       {
           countt+=check[n][i];
       }
    }
    printf("%d %d",maxx,countt);
}

