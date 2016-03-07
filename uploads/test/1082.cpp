#include<cstdio>
#include<iostream>
#include<queue>
using namespace std;
int c=0,p[100010]= {0},check[100010]= {0},sth=0;
struct data
{
    int w,f,t;
    data(int a,int b,int c)
    {
        f=a;
        t=b;
        w=c;
    }
    bool operator < (const data &T) const
    {
        return w > T.w;
    }
};
priority_queue<data> h;
int kodpor(int a)
{
    if(p[a]!=a)
    {
        return kodpor(p[a]);
    }
    else return p[a];

}
int main()
{
    int n,w,m;
    int f,t;
    scanf("%d%d",&n,&m);
    for(int i=1; i<=n; i++)
    {
        p[i]=i;
    }
    for(int i=0; i<m; i++)
    {
        scanf("%d%d%d",&f,&t,&w);
        h.push(data(f,t,w));
    }
    while(not h.empty()&&sth<n-1)
    {
        c=0;
        if(kodpor(h.top().t)!=kodpor(h.top().f))
        {
            p[kodpor(h.top().t)]=kodpor(h.top().f);
            printf("%d %d\n",h.top().f,h.top().t);
            sth++;
        }
        /*printf("---------------\n");
        for(int i=1;i<=n;i++)
        {
            printf("p[%d] = %d\n",i,p[i]);
        }*/
        h.pop();
    }



}
