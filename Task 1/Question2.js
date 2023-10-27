const splitArray = (array) => {
  const tagsFound = array.split('<');
  console.log(tagsFound);
  const next = tagsFound.filter(x=> x.includes('sc-'));
  console.log(next)
  next.map(x => {
      const pp = x.split('=');
      console.log(pp);
  })
}

splitArray('<div><div sc-rootbear title="Oh My">Hello <i sc-org>World</i></div></div>');