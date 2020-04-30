$(function(){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: false,
        autoFocus: true,
        transitionEffectSpeed: 700,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : '<a href="#previous" role="menuitem" style="padding: 0px;"><button id="BtnRetour">Retour</button></a>',
            next : '<a href="#next" role="menuitem" style="padding: 0px;"><button id="premierBtnNext">Suivant</button></a>',
            finish : '',
            current : ''
        },
    });
    $("#date").datepicker({
        dateFormat: "MM - DD - yy",
        showOn: "both",
        buttonText : '<i class="zmdi zmdi-chevron-down"></i>',
    });
});
