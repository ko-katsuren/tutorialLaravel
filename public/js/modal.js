function search_modal_show(){
    modal_show('search-modal');
}

function search_modal_hidden(){
    modal_hidden('search-modal');
}

function details_modal_show(id){
    modal_show(id + '-modal');
}

function details_modal_hidden(id){
    modal_hidden('details' + id);
}

function details_edit_modal_show(id){
    const details_modal_id = id.replace('edit', 'modal');
    modal_hidden(details_modal_id);
    modal_show(id + '-modal');
}

function add_modal_show(){
    modal_show('add-modal');
}

function add_modal_hidden(){
    modal_hidden('add-modal');
}

function modal_show(id){
    const mask = document.getElementById('mask');
    const target = document.getElementById(id);
    mask.classList.remove('hidden');
    target.classList.remove('hidden');
}

function modal_hidden(id){
    const mask = document.getElementById('mask');
    const target = document.getElementById(id);
    mask.classList.add('hidden');
    target.classList.add('hidden');
}