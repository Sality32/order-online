const depth = (array, items) => {
  let depth = 1;
  let tempResult = 0;
  let result = 0;
  let temp = [];
  let tempArr = array;
  let i = 0;
  let arrItems = items.split('');
  for(let j = 0; j < arrItems.length; j++) {
   
    depth = 1;
    tempResult = 0;
    i = 0;
    tempArr = array;
    while(tempArr.length > 0) {
      if (Array.isArray(tempArr[i]) )
      {
        temp.push(...tempArr[i])
      }
  
      if (i === tempArr.length) {
        i=0;
        depth +=1;
        tempArr = temp;
        temp = [];
      }
      
      if(!Array.isArray(tempArr[i]) && String(tempArr[i]).indexOf(arrItems[j]) !== -1) {
        tempResult += depth;
      }
      i++;
    }
    result += (tempResult * (j+1));
  }

  return result;
}

console.log(depth(['ABAH',['CIRCA'],['CRUMP', ['IRA']], ['ALI']], 'ACI'))