// Event Manager
const EventManager = function () {
    const buildCalender = function () {
        $.ajax({
            type: "get",
            url: "/event/all",
            success: function (events) {
                let my_calendar = $("#dncalendar-container").dnCalendar({
                    minDate: "2018-01-15",
                    maxDate: "2018-12-02",
                    defaultDate: "2018-05-10",
                    monthNames: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
                    monthNamesShort: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
                    dayNames: [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                    dayNamesShort: [ 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun' ],
                    dataTitles: { defaultDate: 'Default', today : 'Today' },
                    notes: events,
                    showNotes: true,
                    startWeek: 'monday',
                    dayClick: function(date, view) {
                        // Format the date
                        function formatDateToString(d){
                            let dd = (d.getDate() < 10 ? '0' : '') + d.getDate();
                            let MM = ((d.getMonth() + 1) < 10 ? '0' : '') + (d.getMonth() + 1);
                            let yyyy = d.getFullYear();
                            return (yyyy + "-" + MM + "-" + dd);
                        }

                        // Search date in array
                        function search(nameKey, myArray){
                            for (let i=0; i < myArray.length; i++) {
                                if (myArray[i].date === nameKey) {
                                    return myArray[i]['note'];
                                }
                            }
                        }

                        // Display alert with event note
                        if (typeof search(formatDateToString(date), events) !== 'undefined') {
                            $('#viewEvent').modal('show');
                            $('#view-modal-title').text('Event for ' + formatDateToString(date));
                            $('div#view-modal-content').text(search(formatDateToString(date), events));
                            // Handle edit button
                            $('a#edit-event').attr('href', '/event/'+formatDateToString(date)+'/edit');
                        }
                        else {
                            $('input#date').val(formatDateToString(date));
                            $('#addEvent').modal('show');
                        }

                    }
                });

                // init calendar
                my_calendar.build();
            }
        });
    };

    return {
        init: function () {
            buildCalender();
        }
    }
}();

$(document).ready(function() {
    EventManager.init();
});
