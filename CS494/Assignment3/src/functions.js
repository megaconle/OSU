/**
* the \@param notation indicates an input paramater for a function. For example
* @param {string} foobar - indicates the function should accept a string
* and it should be called foobar, for example function(foobar){}
* \@return is the value that should be returned
*/

/**
* Write a function called `uselessFunction`.
* It should accept no arguments.
* It should return the string primitive 'useless'.
* @return {string} - 'useless'.
*/

//your code here
function uselessFunction() {
  return 'useless'
}
//end your code

var bar = 'not a function';
var barType = typeof bar;

/**
* Assign the above variable 'bar' to an anonymous function.
* @param {doubleArray|number} doubleArray - an aray of numbers.
* The function should multiply every number in the array by 2 (this should
* change the content of the array).
* @return {boolean} - true if the operation was sucessful, false otherwise.
* This should return false if a value in the array cannot be doubled.
*/

//your code here
bar = function(doubleArray) {
  for (var i = 0; i < doubleArray.length; i++) {
    if(isNaN(doubleArray[i])) {
      return false;
    }
    doubleArray[i] *= 2;
  }
  return true;
};
//end your code

/**
* Create a function to parse email addresses called emailParse
* @param {array.<string>} emailArray - an array of email address strings of the
* format [local]@[domain].[gTLD]
* a gTLD is a generic top-level domain (ex. com, edu, gov). The original arrray
* should remain unchanged.
* @return {array.<array.<string>>} - return an array of 3 arrays. The arrays
* should
* contain the local, domin and gTLD's respectivley. return[0] should be an
* array of local parts. return[0][5] + '@' + return[1][5] + '.' + return[2][5]
* should reconstruct the 5th email address.
*/

//your code here
function emailParse(emailArray) {
  var local = [];
  var domain = [];
  var gtld = [];
	
  for (var i = 0; i < emailArray.length; i++) {
    var cur = emailArray[i];
    var temp_local = cur.substring(0, cur.indexOf("@"));
    local[i] = temp_local;
    var temp_domain = cur.substring(cur.indexOf("@")+1, cur.lastIndexOf("."));
    domain[i] = temp_domain;
    var temp_gtld = cur.substring(cur.indexOf(".")+1, cur.length);
    gtld[i] = temp_gtld;
  }
    var parsed = [local, domain, gtld];
    return parsed;
};
//end your code
