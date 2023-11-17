function showTimeSchedule() {
    var ticketType = document.getElementById("ticketType");
    var timeScheduleDiv = document.getElementById("timeScheduleDiv");

    if (ticketType.value === "day") {
        timeScheduleDiv.style.display = "block";
    } else {
        timeScheduleDiv.style.display = "none";
    }
}
