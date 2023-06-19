<div>

    <div id='calendar-container' class="bg-white p-8 shadow-xl mt-8 rounded-2xl m-auto" >

        <div id='calendar'></div>
    </div>
</div>

@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>

    <script>
        document.addEventListener('livewire:load', function() {
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;
            var calendarEl = document.getElementById('calendar');
            var checkbox = document.getElementById('drop-remove');
            var data = @this.events;

            var calendarOptions = {
                headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                initialView: 'dayGridMonth', // Set the initial view to month view
                locale: '{{ App::getLocale() }}',
                events: JSON.parse(data),
                dateClick: function(info) {
                    if (!isUserAdmin()) return; // Check if user is admin
                    var title = prompt('Enter Event Title');
                    var start = new Date(info.dateStr); // Use the clicked date as the start date

                    if (title != null && title != '') {
                        var endTimeString = prompt('Enter Event End Time (HH:mm)');
                        var endTime;
                        if (endTimeString) {
                            endTime = new Date(start.toDateString() + ' ' + endTimeString); // Combine date and time to create the end time
                        } else {
                            start.setHours(0, 0, 0, 0); // Set start time to midnight (00:00:00)
                            endTime = new Date(start.getFullYear(), start.getMonth(), start.getDate(), 23, 59, 59); // Set the end time to the end of the selected date
                        }

                        if (!isNaN(endTime.getTime())) { // Check if the end time is valid
                            calendar.addEvent({
                                title: title,
                                start: start,
                                end: endTime,
                            });
                            var eventAdd = { title: title, start: start , end: endTime};
                            @this.addevent(eventAdd);
                            alert('Great. Now, update the database...');
                        } else {
                            alert('Invalid End Time');
                        }
                    } else {
                        alert('Event Title Is Required');
                    }
                },
                editable: isUserAdmin(), // Set editable property based on admin status
                selectable: isUserAdmin(), // Set selectable property based on admin status
                displayEventTime: false,
                droppable: isUserAdmin(), // Set droppable property based on admin status
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                },
                eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
                eventClick: function(info) {
                    if (!isUserAdmin()) return; // Check if user is admin

                    if (confirm("Are you sure you want to delete this event?")) {
                        var id = info.event.id;
                        var eventDelete = id;
                        @this.deleteEvent(eventDelete);
                        alert("Event Deleted!");
                    } else {
                        alert("Error!!");
                    }
                },
                loading: function(isLoading) {
                    if (!isLoading) {
                        // Reset custom events
                        this.getEvents().forEach(function(e) {
                            if (e.source === null) {
                                e.remove();
                            }
                        });
                    }
                }
            };

            var calendar = new Calendar(calendarEl, calendarOptions);
            calendar.render();

            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents();
            });

            function isUserAdmin() {
                @if(auth()->user()->isAdmin() || auth()->user()->isTeacher())
                    return true;
                @else
                    return false;
                @endif
            }

            document.getElementById('viewSelector').addEventListener('change', function() {
                var view = this.value;
                calendar.changeView(view);
            });

        });


    </script>
@endpush
