(function(namespace, $) {
	"use strict";

	var DemoDashboard = function() {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function() {
			o.initialize();
		});

	};
	var p = DemoDashboard.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function() {
		this._enableEvents();

		this._initCalendarlist();
		this._initCalendar();
		this._displayDate();
	};

	// =========================================================================
	// EVENTS
	// =========================================================================

	// events
	p._enableEvents = function() {
		var o = this;

		$('#calender-prev').on('click', function(e) { o._handleCalendarPrevClick(e); });
		$('#calender-next').on('click', function(e) { o._handleCalendarNextClick(e); });
		$('input[name="calendarMode"]').on('change', function(e) { o._handleCalendarMode(e); });
	};

	// handlers
	p._handleCalendarPrevClick = function(e) {
		$('#calendar').fullCalendar('prev');
		this._displayDate();
	};
	p._handleCalendarNextClick = function(e) {
		$('#calendar').fullCalendar('next');
		this._displayDate();
	};
	p._handleCalendarMode = function(e) {
		$('#calendar').fullCalendar('changeView', $(e.currentTarget).val());
	};

	// =========================================================================
	// CALENDARLIST
	// =========================================================================

	p._initCalendarlist = function() {
		if (!$.isFunction($.fn.draggable)) {
			return;
		}
		var o = this;

		$('.list-events .list-group-item').each(function() {
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true, // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
		});
	};
	
	// =========================================================================
	// CALENDAR
	// =========================================================================

	p._initCalendar = function(e) {
		if (!$.isFunction($.fn.fullCalendar)) {
			return;
		}

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		$('#calendar').fullCalendar({
			height: 500,
			header: false,
			editable: true,
			droppable: true,
			drop: function(date, allDay) { // this function is called when something is dropped
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');

				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);

				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				copiedEventObject.className = 'event-danger';

				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}

			},
			events: [
				{
					title: 'Freedom',
					start: new Date(y, m, d + 1, 19, 0),
					end: new Date(y, m, d + 1, 22, 30),
					allDay: false
				}
			],
			eventRender: function(event, element) {
				element.find('#date-title').html(element.find('span.fc-event-title').text());
			}
		});
	};
	
	// =========================================================================
	// UTILS
	// =========================================================================
	
	p._displayDate = function() {
		var selectedDate = $('#calendar').fullCalendar('getDate');
		$('.selected-day').html($.fullCalendar.formatDate(selectedDate, "dddd"));
		$('.selected-date').html($.fullCalendar.formatDate(selectedDate, "dd MMMM yyyy"));
		$('.selected-year').html($.fullCalendar.formatDate(selectedDate, "yyyy"));
	};
	
	// =========================================================================
	namespace.DemoDashboard = new DemoDashboard;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):
