class DW_Controller
{
    constructor()
    {
        //Ici le DOM n'est pas encore prêt
        //Pour le moment rien à faire
        console.log(document.body);
    }
    run(){
        //Ici le DOM est  prêt
        console.log(document.body);
    }
}
window.dw = new DW_Controller();
window.addEventListener('load', ()=>window.dw.run())