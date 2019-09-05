#include<stdio.h>//6
#include<conio.h>
void main()
{
char a[100];
int count=0,cou=0,co=0;
char *e=&a[0];
printf("enter the string ");
gets(a);
while(*e!='\0')
{
if(*e==' ')
count++;
if(*e!=' '&&*(e+1)==' '||*(e+1)=='\0')
cou++;
if(*e!=' ')
co++;
e++;
}
printf("\n number of spaces are \n");
printf("%d",count);
printf("\n number of words are \n");
printf("%d",cou);
printf("\n number of characters are \n");
printf("%d",co);
getch();
clrscr();
}