/* http://keith-wood.name/countdown.html
 * Bulgarian initialisation for the jQuery countdown extension
 * Written by Manol Trendafilov manol@rastermania.com (2010) */
(function ($) {
    $.countdown.regionalOptions['it'] = {
        labels: ['Anni', 'Mesi', 'Settimane', 'Giorni', 'ore', 'minuti', 'secondi'],
        labels1: ['Anno', 'Mese', 'Settimana', 'Giorno', 'ora', 'minuto', 'secondo'],
        compactLabels: ['l', 'm', 'n', 'd'], compactLabels1: ['g', 'm', 'n', 'd'],
        whichLabels: null,
        digits: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
        timeSeparator: ':', isRTL: false
    };

    $.countdown.regionalOptions['en'] = {
        labels: ['Year', 'Months', 'Weeks', 'Days', 'hours', 'minutes', 'seconds'],
        labels1: ['Year', 'Months', 'Week', 'Day', 'hour', 'minute', 'second'],
        compactLabels: ['l', 'm', 'n', 'd'], compactLabels1: ['g', 'm', 'n', 'd'],
        whichLabels: null,
        digits: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
        timeSeparator: ':', isRTL: false
    };

	$.countdown.regionalOptions['bg'] = {
		labels: ['Y', 'M', 'W', 'D', 'h', 'm', 's'],
		labels1: ['Y', 'M', 'W', 'D', 'h', 'm', 's'],
		compactLabels: ['l', 'm', 'n', 'd'], compactLabels1: ['g', 'm', 'n', 'd'],
		whichLabels: null,
		digits: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
		timeSeparator: ':', isRTL: false
	};

	//$.countdown.setDefaults($.countdown.regionalOptions['it']);
})(jQuery);
