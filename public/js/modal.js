const detals_button = getItem('details-button');
const search_button = getItem('search');
const search_button = getItem('add');

const mask = getItem('mask')[0];
const modal_search = getItem('model-search')[0];
const modal_details = getItem('model-details')[0];
const modal_add = getItem('model-add')[0];

modal_search.addEventListener('click', ()=>{
    modal_search.classList.remove('hidden');
    mask.classList.remove('hidden');
})

const getItem = name => {
    return document.getElementsByClassName(name);
}