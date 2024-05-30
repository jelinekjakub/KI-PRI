let l = console.log;
let proto = (obj) => obj.constructor.prototype;
let lp = (text, obj) => l(text, proto(obj), obj);

let d = document;

let ctiKnihy = (xmlDoc) => {
  // máme tyto DOM:
  lp('HTML DOM:', d);
  lp('XML DOM:', xmlDoc);

  // v HTML DOM najdeme uzel
  let divKnihy = d.getElementById('knihy');
  l('DIV knihy:', divKnihy);

  // z XML DOM získáme seznam knih
  let knihy = xmlDoc.getElementsByTagName('kniha');
  l('<kniha>*', knihy);

  // vytvoříme HTML table
  let table = appendCreate(divKnihy, 'table');
  table.classList.add('table-auto', 'w-full', 'border-collapse', 'border', 'border-gray-300');

  let thead = appendCreate(table, 'thead');
  let tr = appendCreate(thead, 'tr');

  // Add table headers
  ['Název', 'Autor', 'Postavy', 'Popis'].forEach(headerText => {
    let th = appendCreate(tr, 'th');
    th.appendChild(d.createTextNode(headerText));
    th.classList.add('border', 'border-gray-300', 'px-4', 'py-2', 'bg-gray-200');
  });

  let tbody = appendCreate(table, 'tbody');

  for (let kniha of knihy) {
    // XML DOM - data
    let nazev = kniha.getElementsByTagName('název')[0]?.innerHTML || '';
    let autor = kniha.getElementsByTagName('autor')[0]?.innerHTML || '';
    let postavy = Array.from(kniha.getElementsByTagName('postava')).map(postava => postava.innerHTML).join(', ');
    let popis = kniha.getElementsByTagName('popis')[0]?.innerHTML || '';

    // HTML table row
    let tr = appendCreate(tbody, 'tr');

    [nazev, autor, postavy, popis].forEach(text => {
      let td = appendCreate(tr, 'td');
      td.appendChild(d.createTextNode(text));
      td.classList.add('border', 'border-gray-300', 'px-4', 'py-2');
    });

    // JS obsluha DOM události
    tr.addEventListener('click', () => tr.classList.toggle('bold'));
  }
};

// helper function
let appendCreate = (parent, tag) => {
  let elem = d.createElement(tag);
  parent.appendChild(elem);
  return elem;
};

// obsluha globální DOM události
let toggleBackground = () => d.body.classList.toggle('dark');
window.addEventListener('keydown', toggleBackground);

// process the XML document
let processDOM = ctiKnihy;
