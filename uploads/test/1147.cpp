#include<cstdio>
#include<iostream>
using namespace std;
int tree[600000]={0};
int change(int a)
{
    if(a<=0)
    {
        return 0;
    }
    if(tree[a/2]<tree[a])
    {
        tree[a/2]=tree[a];
        change(a/2);
    }
    else
    {
        return 0;
    }
}
int main()
{
    int n,q;
    scanf("%d%d",&n,&q);
    for(int i=0;i<q;i++)
    {
        char x;
        int a,b;
        scanf(" %c",&x);
        if(x=='U')
        {

            scanf("%d%d",&a,&b);
            tree[a+n-1]=b;
            //printf("======%d\n",a+n-1);
            change(a+n-1);
        }
        if(x=='P')
        {
            scanf("%d%d",&a,&b);

        }
    }
    for(int i=1;i<2*n;i++)
    {
        printf("%d ",tree[i]);
    }
}
