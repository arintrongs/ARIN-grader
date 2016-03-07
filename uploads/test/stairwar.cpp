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
int fib[100010];
int n;

int main()
{
fib[0] = fib[1] = 1;
	scanf("%d",&n);
	for(int i=2;i<=n;i++)
		{
		fib[i] = (fib[i-1]+fib[i-2])%1000000;
		}
	printf("%d\n",fib[n]);
	return 0;
}