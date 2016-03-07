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
#define INF 1000000000

using namespace std;

int n;
char str[200];

int main()
{
	//srand (time(NULL));
	scanf("%d",&n);
	for (int i = 0; i < n; ++i)
	{
		/* code */
		scanf("%s",str);
		int len = strlen(str);
		bool isgood = false;
		for(int j = 0; j < len ; j++)
		{
			if(str[j] == 'D' || str[j] == 'd')
			{
				isgood = true;
				break;
			}
		}
		if(isgood)
		{
			printf("KAMEHAMEHA!!!\n");
		}
		else
		{
			printf("FUS RO DAH!!\n");
		}
	}
	return 0;
}