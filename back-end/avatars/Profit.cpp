#include<iostream>
using namespace std;
int main()
{
	int a,b,c,d;
	long long temp=0;
	cin >> a;
	for (int b=a-1;b>=2;b--)
	{
		temp+=((b-1)*b)/2;
	}
	cout << temp << " ";
	return 0;
}
