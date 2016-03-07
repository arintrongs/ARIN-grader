#include <cstdio>
#include <cstdlib>
#include <cstring>
#include <cmath>
#include <iostream>
#include <algorithm>
#include <set>
#include <map>
#include <vector>
#include <queue>
#include <stack>
#include <list>
#include <string>
#include <time.h>

#define SQR(_x) ((_x)*(_x))
#define NL printf("\n")
#define LL long long
#define DB double
#define PB push_back
#define INF 1<<30
#define LB lower_bound
#define UB upper_bound
#define F front
#define PQ priority_queue

using namespace std;
long long ff(int a)
{
	if(a==1) return 1;
	if(a==0) return 0;
	return (2*ff(a-1))+(3*ff(a-2));
}
int main()
{
	int n;
	long long ans;
	scanf("%d",&n);
	printf("%lld",ff(n+1));
	return 0;
}