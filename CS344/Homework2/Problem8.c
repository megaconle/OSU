//Megan Conley
//conleyme@onid.oregonstate.edu
//CS344-400
//Homework 2

#include <stdio.h> 
#include <stdlib.h> 
#define NUM_INTS 100 
void func(int *ptr) 
{ 
	int i = 0; 
	for (i = 0; i <= NUM_INTS; i++) { 
		ptr[i] = i; 
 	}
} 

int main (int argc, char *argv[]) 
{ 
	int *intArray = NULL; 
	func(intArray); 
	return 0; 
} 
