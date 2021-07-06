$(function () {

    $("#date_from").datepicker({
        inline: true,
        altField: '#date_from',
        dateFormat: "dd.mm.yy",
        onSelect: function (dataText,inst) {
            sessionStorage.setItem("selected_date_from", $(this).val());
        }
    });

    if (sessionStorage.getItem("selected_date_from") != null) {
        $('#date_from').datepicker("setDate", sessionStorage.getItem("selected_date_from"));
    }


    $("#date_to").datepicker({
        inline: true,
        altField: '#date_to',
        dateFormat: "dd.mm.yy",
        onSelect: function (dataText,inst) {
            sessionStorage.setItem("selected_date_to", $(this).val());
        }
    });

    if (sessionStorage.getItem("selected_date_to") != null) {
        $('#date_to').datepicker("setDate", sessionStorage.getItem("selected_date_to"));
    } 

    $.datepicker.regional['sr-SR'] = {
		closeText: 'Zatvori',
		prevText: '&#x3c;',
		nextText: '&#x3e;',
		currentText: 'Danas',
		monthNames: ['Januar','Februar','Mart','April','Maj','Jun',
		'Jul','Avgust','Septembar','Oktobar','Novembar','Decembar'],
		monthNamesShort: ['Jan','Feb','Mar','Apr','Maj','Jun',
		'Jul','Avg','Sep','Okt','Nov','Dec'],
		dayNames: ['Nedelja','Ponedeljak','Utorak','Sreda','Četvrtak','Petak','Subota'],
		dayNamesShort: ['Ned','Pon','Uto','Sre','Čet','Pet','Sub'],
		dayNamesMin: ['Ne','Po','Ut','Sr','Če','Pe','Su'],
		weekHeader: 'Sed',
		dateFormat: 'dd.mm.yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['sr-SR']);

});
