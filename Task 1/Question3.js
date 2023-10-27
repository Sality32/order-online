const sumPalindrom = (string, item) => {
  let result = 0;
  const lengthItem = item.split('').length;
  const arrString = string.split('');
  if (lengthItem === 0 || arrString.length < lengthItem) return result;
  for(let i = 0; i< arrString.length; i ++){
    const checkArr = arrString.slice(i, i+lengthItem).join('');
    if (checkArr === item){
      result ++;
    }
  }
  return result;
}

console.log(sumPalindrom('hell', 'hello'));
