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
            previous : 'Retour',
            next : '<a href="#next" role="menuitem"><button id="premierBtnNext">Valider !</button></a>',
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
