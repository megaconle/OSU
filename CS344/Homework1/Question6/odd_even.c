// Megan Conley
// conleyme@onid.oregonstate.edu
// CS344-400
// Homework 1

/*

  $RCSfile$
  $Revision$
  $Author$
  $Date$
  $Log$

  from:
  http://www.programmingsimplified.com/c/source-code/c-program-check-odd-even

 */


#include<stdio.h>
 
int main()
{
   int n;
 
   printf("Enter an integer\n");
   scanf("%d", &n);
 
   if ( n % 2 == 1 )
   {
      printf("Odd\n");
   } else {
      printf("Even\n");
   }
 
   return 0;
}
